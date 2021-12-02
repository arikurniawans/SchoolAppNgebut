<?php

namespace App\Http\Controllers;

use App\Models\OPD;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check.role:superadmin,admin');
        $this->userService = new UserService();
    }

    public function getIndex() {
        if(\request()->ajax()) {
            $page = request()->get('paginate', 10);
            $data = [
            ];

            $user = User::where('level','!=', 'superadmin')->where('level','!=', 'admin');
            $fields = ['name', 'username', 'email', 'no_hp', 'level'];

            if(request()->search != '') {
                foreach ($fields as $key => $value) {
                    if($key == 0)
                        $user->where($value, 'like', '%'. request()->search . '%');
                    else
                        $user->orWhere($value, 'like', '%'. request()->search . '%');

                }
            }
            if(request()->status != '' && \request()->status != 'all') {
                $user->where('active', \request()->status);
            }

            $data['table'] = $user->latest()->paginate($page);
            return view('user._table_data', $data);
        }
        $data = [
            'title' => 'List Pengguna',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/users' , 'name' => 'Pengguna', 'active' => true],
            ],
        ];

        return view('user.index', $data);
    }

    public function getCreate() {
        $data = [
            'title' => 'Tambah Pengguna',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/users' , 'name' => 'Pengguna'],
                ['url' => '/users/create' , 'name' => 'Tambah Pengguna', 'active' => true],
            ],
            'opd' => OPD::doesnthave('user')->get(['id_opd', 'nama_opd'])
        ];
        return view('user.create', $data);
    }

    public function postIndex(Request $request) {
        $userRules = User::$rules;
        $userRules['password'] = 'required|confirmed|min:8|max:50';
        $userVariables = User::$attributeRule;
        $this->validate($request, $userRules, [], $userVariables);

        DB::beginTransaction();

        try {
            $this->userService->create($request->except(['_token']));
        } catch (QueryException $e) {
            DB::rollBack();
//            throw $th;
            $msg['success'] = false;
            $msg['message'] = 'Maaf, akun pengguna gagal dibuat!';
            Session::flash('feedback', $msg);
            return redirect()->back();
        }

        DB::commit();

        $msg['success'] = true;
        $msg['message'] = 'Akun Pengguna berhasil dibuat!';
        Session::flash('feedback', $msg);
        return redirect()->back();
    }

    public function deleteIndex($id) {
        DB::beginTransaction();
        try {
            $this->userService->delete($id);
        } catch (QueryException $e) {
            DB::rollBack();
            $msg['success'] = false;
            $msg['message'] = 'Gagal menghapus data!';
            return response()->json($msg, 500);
        }

        DB::commit();
        $msg['success'] = true;
        $msg['message'] = 'Berhasil menghapus data!';
        return response()->json($msg, 200);
    }

    public function getEdit($id) {
        $data = [
            'title' => 'Edit Pengguna',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/users' , 'name' => 'Pengguna'],
                ['url' => '#' , 'name' => 'Edit Pengguna', 'active' => true],
            ],
            'opd' => OPD::doesnthave('user')->get(['id_opd', 'nama_opd']),
            'edit' => User::find($id)
        ];
        return view('user.edit', $data);
    }

    public function putIndex($id, Request $request) {
        $userRules = User::$rules;
        $userVariables = User::$attributeRule;
        $userRules['email'] = 'required|email|unique:tbl_user,email,'.$id;
        $userRules['opd'] = 'required';
        $userRules['username'] = 'required|max:20|unique:tbl_user,username,'.$id;

        if($request->has('password') && $request->input('password') != null) {
            $userRules['password'] = 'required|confirmed|min:8|max:50';
        }

        $this->validate($request, $userRules, [], $userVariables);

        DB::beginTransaction();

        try {
            $this->userService->updateProfile($id, $request->except(['_token', '_method']));
        } catch (QueryException $e) {
            DB::rollBack();
//            throw $th;
            $msg['success'] = false;
            $msg['message'] = 'Maaf, akun pengguna gagal diubah!';
            Session::flash('feedback', $msg);
            return redirect()->back();
        }

        DB::commit();

        $msg['success'] = true;
        $msg['message'] = 'Akun Pengguna berhasil diubah!';
        Session::flash('feedback', $msg);
        return redirect()->back();
    }

    public function postBulkDelete() {
        DB::beginTransaction();
        try {
            $this->userService->deleteBulk(\request()->ids);
        } catch (QueryException $e) {
            DB::rollBack();
            $msg['success'] = false;
            $msg['message'] = 'Maaf, terjadi kegagalan dalam menghapus data!';
            return response()->json($msg, 200);
        }

        DB::commit();
        $msg['success'] = true;
        $msg['message'] = 'Berhasil menghapus data!';
        return response()->json($msg, 200);
    }

    public function postBulkStatus() {
        DB::beginTransaction();
        try {
            $this->userService->statusBulk(request()->status, \request()->ids);
        } catch (QueryException $e) {
            DB::rollBack();
            $msg['success'] = false;
            $msg['message'] = 'Maaf, terjadi kegagalan dalam mengganti status data!';
            return response()->json($msg, 200);
        }

        DB::commit();
        $msg['success'] = true;
        $msg['message'] = 'Berhasil mengganti status data!';
        return response()->json($msg, 200);
    }
}
