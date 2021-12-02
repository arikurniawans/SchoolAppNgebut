<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\KategoriGaleri;
use App\Models\OPD;
use App\Models\TandaTangan;
use App\Models\User;
use App\Services\GaleriService;
use App\Services\KategoriGaleriService;
use App\Services\OPDService;
use App\Services\TandaTanganService;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class GaleriController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check.role:dokumentasi');
        $this->galeriService = new GaleriService();
        $this->kategoriGaleriService = new KategoriGaleriService();
    }

    public function getIndex() {
        if(\request()->ajax()) {
            $page = request()->get('paginate', 10);
            $data = [
            ];

            $user = Galeri::query();
            $fields = ['title', 'seotitle'];

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
            return view('galeri._table_data', $data);
        }
        $data = [
            'title' => 'Galeri',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '#' , 'name' => 'Galeri', 'active' => true],
            ],
        ];

        return view('galeri.index', $data);
    }

    public function getCreate() {
        $data = [
            'title' => 'Tambah Foto Galeri',
            'kategori' => KategoriGaleri::active()->get(),
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/galeri' , 'name' => 'Galeri'],
                ['url' => '#' , 'name' => 'Tambah Foto Galeri', 'active' => true],
            ],
        ];
        return view('galeri.create', $data);
    }

    public function postIndex(Request $request) {
        $galeriRule = Galeri::$rules;
        $galeriRule['picture'] = 'required|max:1024|mimes:png,jpg';
        $galeriRule['kategori'] = 'required';
        $this->validate($request, $galeriRule);

        DB::beginTransaction();

        try {
            $this->galeriService->create($request->except(['_token']));
        } catch (QueryException $e) {
            DB::rollBack();
//            throw $th;
            $msg['success'] = false;
            $msg['message'] = 'Maaf, Galeri gagal dibuat!';
            Session::flash('feedback', $msg);
            return redirect()->back();
        }

        DB::commit();

        $msg['success'] = true;
        $msg['message'] = 'Galeri berhasil dibuat!';
        Session::flash('feedback', $msg);
        return redirect()->back();
    }

    public function deleteIndex($id) {
        DB::beginTransaction();
        try {
            $this->galeriService->delete($id);
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
            'title' => 'Edit Foto Galeri',
            'kategori' => KategoriGaleri::active()->get(),
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/galeri' , 'name' => 'Galeri'],
                ['url' => '#' , 'name' => 'Edit Foto Galeri', 'active' => true],
            ],
            'edit' => Galeri::find($id)
        ];

        return view('galeri.edit', $data);
    }

    public function putIndex($id, Request $request) {
        $galeriRule = Galeri::$rules;
        $galeriRule['seotitle'] = 'required|unique:tbl_albums,seotitle,'.$id;
        $galeriRule['kategori'] = 'required';

        if($request->has('picture') && $request->picture != null) {
            $galeriRule['picture'] = 'required|max:1024|mimes:png,jpg';
        }

        $this->validate($request, $galeriRule);

        DB::beginTransaction();

        try {
            $this->galeriService->update($id, $request->except(['_token', '_method']));
        } catch (QueryException $e) {
            DB::rollBack();
//            throw $e;
            $msg['success'] = false;
            $msg['message'] = 'Maaf, galeri gagal diubah!';
            Session::flash('feedback', $msg);
            return redirect()->back();
        }

        DB::commit();

        $msg['success'] = true;
        $msg['message'] = 'Galeri berhasil diubah!';
        Session::flash('feedback', $msg);
        return redirect()->back();
    }

    public function postBulkDelete() {
        DB::beginTransaction();
        try {
            $this->galeriService->deleteBulk(\request()->ids);
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
            $this->galeriService->statusBulk(request()->status, \request()->ids);
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

    public function getKategori() {
        if(\request()->ajax()) {
            $page = request()->get('paginate', 10);
            $data = [
            ];

            $user = KategoriGaleri::withCount('galeri');
            $fields = ['label'];

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
            return view('galeri.kategori._table_data', $data);
        }

        $data = [
            'title' => 'Kategori Galeri',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '#' , 'name' => 'Kategori Galeri', 'active' => true],
            ],
        ];
        return view('galeri.kategori.index', $data);
    }

    public function createCategori() {
        $data = [
            'title' => 'Tambah Kategori Galeri',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/galeri' , 'name' => 'Galeri'],
                ['url' => '#' , 'name' => 'Tambah Kategori Galeri', 'active' => true],
            ],
        ];
        return view('galeri.kategori.create', $data);
    }

    public function editCategori($id)
    {
        $data = [
            'title' => 'Edit Kategori Galeri',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/galeri/kategori' , 'name' => 'Kategori Galeri'],
                ['url' => '#' , 'name' => 'Edit Kategori Galeri', 'active' => true],
            ],
            'edit' => KategoriGaleri::find($id)
        ];
        return view('galeri.kategori.edit', $data);
    }

    public function insertCategori(Request $request)
    {
        $galeriRule = KategoriGaleri::$rules;
        $this->validate($request, $galeriRule);

        DB::beginTransaction();

        try {
            $this->kategoriGaleriService->create($request->except(['_token']));
        } catch (QueryException $e) {
            DB::rollBack();
//            throw $th;
            $msg['success'] = false;
            $msg['message'] = 'Maaf, Kategori Galeri gagal dibuat!';
            Session::flash('feedback', $msg);
            return redirect()->back();
        }

        DB::commit();

        $msg['success'] = true;
        $msg['message'] = 'Kategori Galeri berhasil dibuat!';
        Session::flash('feedback', $msg);
        return redirect()->back();
    }

    public function putCategori(Request $request, $id)
    {
        $galeriRule = KategoriGaleri::$rules;
        $this->validate($request, $galeriRule);

        DB::beginTransaction();

        try {
            $this->kategoriGaleriService->update($id, $request->except(['_token', '_method']));
        } catch (QueryException $e) {
            DB::rollBack();
//            throw $e;
            $msg['success'] = false;
            $msg['message'] = 'Maaf, kategori galeri gagal diubah!';
            Session::flash('feedback', $msg);
            return redirect()->back();
        }

        DB::commit();

        $msg['success'] = true;
        $msg['message'] = 'Kategori galeri berhasil diubah!';
        Session::flash('feedback', $msg);
        return redirect()->back();
    }

    public function deleteCategori($id)
    {
        DB::beginTransaction();
        try {
            $this->kategoriGaleriService->delete($id);
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

    public function bulkDeleteCategori() {
        DB::beginTransaction();
        try {
            $this->kategoriGaleriService->deleteBulk(\request()->ids);
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

    public function bulkStatusCategori() {
        DB::beginTransaction();
        try {
            $this->kategoriGaleriService->statusBulk(request()->status, \request()->ids);
        } catch (QueryException $e) {
            DB::rollBack();
            $msg['success'] = false;
            $msg['message'] = 'Maaf, terjadi kegagalan dalam mengubah status data!';
            return response()->json($msg, 200);
        }

        DB::commit();
        $msg['success'] = true;
        $msg['message'] = 'Berhasil mengubah status data!';
        return response()->json($msg, 200);
    }
}
