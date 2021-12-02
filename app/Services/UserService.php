<?php

namespace App\Services;

use App\Models\OPD;
use App\Models\Settings;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserService {
    public function updateProfile($id, $data)
    {
        $user = User::find($id);

        if(isset($data['avatar'])){
            if ($data['avatar'] != null && $user->avatar != null && Storage::exists($user->avatar)) {
                Storage::delete($user->avatar);
            }
            $user->avatar = Storage::putFile('public/images', $data['avatar']);
        }

        if(isset($data['name']))
            $user->name = $data['name'];
        if(isset($data['username']))
            $user->username = $data['username'];
        if(isset($data['email']))
            $user->email = $data['email'];
        if(isset($data['no_hp']))
            $user->no_hp = $data['no_hp'];
        if(isset($data['password']))
            $user->password = Hash::make($data['password']);
        if(isset($data['active']))
            $user->active = $data['active'];
        if(isset($data['level']))
            $user->level = $data['level'];

        if(isset($data['opd']) && $data['opd'] != null) {
            $opd = OPD::find($data['opd']);
            $opd->id_user = $user->id;
            $opd->save();
        }

        $save = $user->save();
        if($save)
            return true;
        else
            return false;
    }

    public function create($data) {
        if(isset($data['avatar'])){
            $data['avatar'] = Storage::putFile('public/images', $data['avatar']);
        }

        $data['password'] = Hash::make($data['password']);

        $insert = User::create($data);
        if ($insert) {
            if (isset($data['opd'])) {
                $opd = OPD::find($data['opd']);
                $opd->id_user = $insert->id;
                $opd->save();
            }
        }
    }

    public function changePassword($data)
    {
        $user = User::find(auth()->id());

        if(isset($data['password']))
            $user->password = Hash::make($data['password']);

        $save = $user->save();
        if($save)
            return true;
        else
            return false;
    }

    public function delete($id) {
        $user = User::find($id);
        if ($user->avatar != null && Storage::exists($user->avatar)) {
            Storage::delete($user->avatar);
        }
        $destroy = $user->delete();
        return $destroy;
    }

    public function deleteBulk($ids) {
        $users = User::whereIn('id', $ids)->get(['avatar']);
        foreach ($users as $us) {
            if ($us->avatar != null && Storage::exists($us->avatar)) {
                Storage::delete($us->avatar);
            }
        }
        $destroy = User::destroy($ids);
        return $destroy;
    }

    public function statusBulk($status, $ids) {
        if($status == 'aktif') {
            $status = 1;
        } else {
            $status = 0;
        }

        $update = User::whereIn('id', $ids)->update([
            'active' => $status
        ]);

        return $update;
    }
}
