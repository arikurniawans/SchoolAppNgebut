<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Alert;
use DataTables;
use Validator;

class DataruangkelasController extends Controller
{
    
    public function getIndex(Request $request) {
        
        $data = [
            'title' => 'Data Ruang Kelas',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Ruang Kelas'
        ];

        if ($request->ajax()) {
            $data = DB::table('tblruangkelas')->orderBy('idruang', 'DESC')->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('kapasitas', function ($data) {
                        $kapasitas = $data->kapasitas." Orang";
                        return $kapasitas;
                    })
                    ->editColumn('jenis_ruangan', function ($data) {
                        if($data->jenis_ruangan == 'ruang_kelas'){
                            $jenis = "Ruang Kelas";
                        }else if($data->jenis_ruangan == 'lab'){
                            $jenis = "Laboratorium";
                        }
                        return $jenis;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href="/dataruangkelas/edit/'.$row->idruang.'"><i class="fas fa-edit" style="font-size:15px;color:#009ef7;"></i></a>
                        &nbsp;&nbsp;
                        <a href="/dataruangkelas/hapus/'.$row->idruang.'"><i class="fas fa-trash" style="font-size:15px;color:red;"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('dataruangkelas.index', $data);
    }

    
    public function getCreate() {
        
        $data = [
            'title' => 'Tambah Data Ruang Kelas',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Ruang Kelas'
        ];
        
        return view('dataruangkelas.create', $data);
    }

    public function getEdit($id) {        
        $ruang = DB::table('tblruangkelas')->where('idruang', $id)->get();

        $data = [
            'title' => 'Ubah Data Ruang Kelas',
            'ruang' => $ruang,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Ruang Kelas'
        ];
        
        return view('dataruangkelas.edit', $data);
    }

    public function store(Request $request)
    {
        $jurusan = DB::table('tblruangkelas')->insert([
            'kode_ruang' => $request->input('kode_ruang'),
            'nama_ruang' => $request->input('nama_ruang'),
            'kapasitas' => $request->input('kapasitas'),
            'jenis_ruangan' => $request->input('jenis'),
            'reg_date' => Carbon::now()->toDateTimeString()
        ]);

        if($jurusan) {
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
        $jurusan = DB::table('tblruangkelas')->where('idruang', $request->input('id'))->update([
            'kode_ruang' => $request->input('kode_ruang'),
            'nama_ruang' => $request->input('nama_ruang'),
            'kapasitas' => $request->input('kapasitas'),
            'jenis_ruangan' => $request->input('jenis'),
            'reg_date' => Carbon::now()->toDateTimeString()
        ]);

        if($jurusan) {
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
        $ruang =  DB::table('tblruangkelas')->where('idruang',$id);
        $ruang->delete();

        if($ruang) {
                Alert::success('Berhasil', 'Data berhasil dihapus');
                return redirect('/dataruangkelas');
            }else{
                //DB::rollback();
                Alert::error('Gagal', 'Gagal menghapus data !');
                return redirect('/dataruangkelas');
            }
    }

}
