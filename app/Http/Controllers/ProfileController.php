<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Logs;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    //
    private $userService;
    public function __construct()
    {
        $this->middleware('auth');
        $this->userService = new UserService();
    }


    public function getIndex() {
        $data = [
            'profile' => User::find(auth()->id()),
            'logs' => Logs::where('id_user', auth()->id())->latest()->paginate(10),
            'title' => 'Profil',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/profile' , 'name' => 'Profil', 'active' => true],
            ],
        ];

        return view('user.profile', $data);
    }

    public function postInformasi(ProfileRequest $request) {
        DB::beginTransaction();
        try {
            $this->userService->updateProfile(auth()->id(), $request->all());
        } catch (QueryException $e) {
            $msg['success'] = false;
            $msg['message'] = 'Informasi Profil gagal disimpan';
            Session::flash('feedback', $msg);

            DB::rollBack();
            saveLogs('gagal mengubah informasi profile', 'event');
            return redirect('/profile');
        }
        $msg['success'] = true;
        $msg['message'] = 'Informasi Profil berhasil disimpan';
        Session::flash('feedback', $msg);

        DB::commit();
        saveLogs('berhasil mengubah informasi profile', 'event');

        return redirect('/profile');
    }

    public function postPassword(Request $request) {
        if (!Hash::check($request->input('old_password'), auth()->user()->password)) {
            $error['old_password'] = 'Password lama anda salah';
            saveLogs('salah memasukkan password lama pada saat ingin mengubah password', 'event');
            return redirect('/profile')->withInput()->withErrors($error);
        }

        $this->validate($request, [
            'password' => 'required|confirmed'
        ]);
        DB::beginTransaction();
        try {
            $this->userService->changePassword($request->all());
        } catch (QueryException $e) {
            $msg['success'] = false;
            $msg['message'] = 'Ganti password gagal disimpan';
            Session::flash('feedback', $msg);

            DB::rollBack();
            saveLogs('gagal mengubah password profile', 'event');
            return redirect('/profile');
        }
        $msg['success'] = true;
        $msg['message'] = 'Password berhasil diubah!';
        Session::flash('feedback', $msg);

        DB::commit();
        saveLogs('berhasil mengubah password profile', 'event');

        return redirect('/profile');
    }
}
