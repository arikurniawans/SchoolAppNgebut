<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Alert;
use DataTables;

class DatakelompokkelasController extends Controller
{
  
    public function getIndex(Request $request) {
       
        $data = [
            'title' => 'Data Kelompok Kelas',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
           
            'testVariable' => 'Kelompok Kelas'
        ];

        if ($request->ajax()) {
            $data = DB::table('tblkelompokkelas')->orderBy('idkelompokkls', 'desc')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="/datakelompokkelas/edit/'.$row->idkelompokkls.'"><i class="fas fa-edit" style="font-size:15px;color:#009ef7;"></i></a>
                        &nbsp;&nbsp;
                        <a href="/datakelompokkelas/hapus/'.$row->idkelompokkls.'"><i class="fas fa-trash" style="font-size:15px;color:red;"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('datakelompokkelas.index', $data);
    }

    
    public function getCreate() {
        $jurusan = DB::table('tbljurusan')->orderBy('idjurusan', 'desc')->get();

        $data = [
            'title' => 'Tambah Data Kelompok Kelas',
            'jurusan' => $jurusan,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Kelompok Kelas'
        ];
        
        return view('datakelompokkelas.create', $data);
    }

    public function getEdit($id) {

        $kelompok = DB::table('tblkelompokkelas')->where('idkelompokkls', $id)->get();

        $data = [
            'title' => 'Edit Kelompok Kelas',
            'kelompok' =>$kelompok,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => 'Kelompok Kelas'
        ];

        return view('datakelompokkelas.edit', $data);
    }

    public function store(Request $request)
    {
        //DB::beginTransaction();
        $jurus = DB::table('tbljurusan')->where('idjurusan',$request->input('jurusan'))->get();
        $kode = $request->input('tingkat')."".$jurus[0]->singkatan."".$request->input('nama');
        $setting = DB::table('tblkelompokkelas')->insert([
            // 'kode_kelompok' => $request->input('kode'),
            'kode_kelompok' => $kode,
            'nama_kelompok' => $request->input('nama'),
            'jurusan_kelompok' => $request->input('jurusan'),
            'tingkat_kelas' => $request->input('tingkat'),
            'reg_date' => Carbon::now()->toDateTimeString()
        ]);

        if($setting) {
            Alert::success('Berhasil', 'Data berhasil ditambahkan');
            return response()->json(['message'=>'Berhasil']);
        }else{
            //DB::rollback();
            Alert::error('Gagal', 'Gagal menambahkan data !');
            return response()->json(['message'=>'Gagal !']);
        }
    }

    public function update(Request $request)
    {
            $data = DB::table('tblkelompokkelas')->where('idkelompokkls',$request->input('id_kelompok'))->update([
                'kode_kelompok' => $request->input('kode'),
                'nama_kelompok' => $request->input('nama'),
                'jurusan_kelompok' => $request->input('jurusan'),
                'tingkat_kelas' => $request->input('tingkat'),
                'reg_date' => Carbon::now()->toDateTimeString()
            ]);

            if($data) {
                Alert::success('Berhasil', 'Data berhasil diubah');
                return response()->json(['message'=>'Berhasil']);
            }else{
                //DB::rollback();
                Alert::error('Gagal', 'Gagal mengubah data !');
                return response()->json(['message'=>'Gagal !']);
            }
    }

    public function destroy($id)
    {
        $data = DB::table('tblkelompokkelas')->where('idkelompokkls',$id);
        $data->delete();

        if($data) {
            Alert::success('Berhasil', 'Data berhasil dihapus');
            //return response()->json(['message'=>'Berhasil']);
            return redirect('/datakelompokkelas');
        }else{
                //DB::rollback();
            Alert::error('Gagal', 'Gagal menghapus data !');
            return redirect('/datakelompokkelas');
        }
    }

}
