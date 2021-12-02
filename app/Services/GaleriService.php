<?php

namespace App\Services;

use App\Models\Galeri;
use App\Models\OPD;
use App\Models\Settings;
use App\Models\TandaTangan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class GaleriService {
    public function update($id, $data)
    {
        $galeri = Galeri::find($id);

        if(isset($data['title']))
            $galeri->title = $data['title'];
        if(isset($data['active']))
            $galeri->active = $data['active'];
        if(isset($data['tanggal']))
            $galeri->tanggal = $data['tanggal'];
        if(isset($data['seotitle']))
            $galeri->seotitle = $data['seotitle'];
        if(isset($data['content']))
            $galeri->content = $data['content'];

        if(isset($data['picture'])){
            if ($data['picture'] != null && $galeri->picture != null && Storage::exists($galeri->picture)) {
                Storage::delete($galeri->picture);
            }
            $galeri->picture = Storage::putFile('public/albums', $data['picture']);
        }

        $save = $galeri->save();
        $galeri->kategori()->sync($data['kategori']);
        if($save)
            return true;
        else
            return false;
    }

    public function create($data) {
        if(isset($data['picture'])){
            $data['picture'] = Storage::putFile('public/albums', $data['picture']);
        }

        $insert = Galeri::create($data);

        $insert->kategori()->sync($data['kategori']);
        return $insert;
    }

    public function delete($id) {
        $tanda = Galeri::find($id);
        $destroy = $tanda->delete();
        return $destroy;
    }

    public function deleteBulk($ids) {
        $galeri = Galeri::whereIn('id', $ids)->get(['picture']);
        foreach ($galeri as $us) {
            if ($us->picture != null && Storage::exists($us->picture)) {
                Storage::delete($us->picture);
            }
        }
        $destroy = Galeri::destroy($ids);
        return $destroy;
    }

    public function statusBulk($status, $ids) {
        if($status == 'aktif') {
            $status = '1';
        } else {
            $status = '0';
        }

        $update = Galeri::whereIn('id', $ids)->update([
            'active' => $status
        ]);

        return $update;
    }
}
