<?php

namespace App\Http\Controllers;

// use App\Models\Settings;
use App\Services\SettingService;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
    //
    private $settingService;

    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->settingService = new SettingService();
    // }

    // public function getIndex() {
    //     $data = [
    //         'title' => 'Pengaturan Aplikasi',
    //         'breadcrumb' => [
    //             ['url' => '/' , 'name' => 'Home'],
    //             ['url' => '/setting' , 'name' => 'Setting', 'active' => true],
    //         ],
    //         'data' => Settings::all(['setting_var', 'setting_val', 'setting_name','setting_type', 'setting_description'])
    //     ];

    //     return view('setting.index', $data);
    // }

    // public function postIndex() {
    //     $settings = Settings::all();

    //     DB::beginTransaction();
    //     try {
    //         $this->settingService->update($settings, \request()->all());
    //     } catch (QueryException $th) {
    //         $msg['success'] = false;
    //         $msg['message'] = 'Pengaturan gagal untuk disimpan';
    //         Session::flash('feedback', $msg);

    //         DB::rollBack();
    //         saveLogs('gagal mengubah pengaturan aplikasi', 'event');

    //         return redirect()->back();
    //     }
    //     $msg['success'] = true;
    //     $msg['message'] = 'Pengaturan aplikasi berhasil disimpan';
    //     Session::flash('feedback', $msg);

    //     DB::commit();
    //     saveLogs('berhasil mengubah pengaturan aplikasi', 'event');

    //     return redirect()->back();
    // }
}
