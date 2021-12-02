<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Alert;
use DataTables;
use Validator;

class DatajurusanController extends Controller
{
    //
    public function getIndex(Request $request) {
        
        $data = [
            'title' => 'Data Jurusan',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Jurusan'
        ];

        if ($request->ajax()) {
            $data = DB::table('v_tbljurusan')->orderBy('idjurusan', 'DESC')->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('tahunakademik', function ($data) {
                        $tahun = $data->tahunakademik." / ".$data->semester;
                        return $tahun;
                    })
                    ->editColumn('status_jurusan', function ($data) {
                        if($data->status_jurusan == 'Y'){
                            $status = "Aktif";
                        }else{
                            $status = "Tidak Aktif";
                        }
                        return $status;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href="/datajurusan/edit/'.$row->idjurusan.'"><i class="fas fa-edit" style="font-size:15px;color:#009ef7;"></i></a>
                        &nbsp;&nbsp;
                        <a href="/datajurusan/hapus/'.$row->idjurusan.'"><i class="fas fa-trash" style="font-size:15px;color:red;"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('datajurusan.index', $data);
    }
    
    public function getCreate() {
        $guru = DB::table('tabelguru')->get();
        $tahun = DB::table('tabeltahunajaran')->get();

        $data = [
            'title' => 'Tambah Data Jurusan',
            'dataguru' => $guru,
            'datatahun' => $tahun,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Jurusan'
        ];
        
        return view('datajurusan.create', $data);
    }

    public function getEdit($id) {
        $guru = DB::table('tabelguru')->get();
        $tahun = DB::table('tabeltahunajaran')->get();
        $jurusan = DB::table('v_tbljurusan')->where('idjurusan', $id)->get();

        $data = [
            'title' => 'Ubah Data Jurusan',
            'dataguru' => $guru,
            'datatahun' => $tahun,
            'datajurusan' => $jurusan,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Jurusan'
        ];
        
        return view('datajurusan.edit', $data);
    }

    public function store(Request $request)
    {
        $jurusan = DB::table('tbljurusan')->insert([
            'kode_jurusan' => $request->input('kode'),
            'nama_jurusan' => $request->input('jurusan'),
            'singkatan' => $request->input('singkatan'),
            'idguru' => $request->input('guru'),
            'idtahunakademik' => $request->input('tahun'),
            'status_jurusan' => $request->input('status'),
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
        $jurusan = DB::table('tbljurusan')->where('idjurusan', $request->post('id'))->update([
            'kode_jurusan' => $request->input('kode'),
            'nama_jurusan' => $request->input('jurusan'),
            'singkatan' => $request->input('singkatan'),
            'idguru' => $request->input('guru'),
            'idtahunakademik' => $request->input('tahun'),
            'status_jurusan' => $request->input('status'),
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
        $kelas =  DB::table('tbljurusan')->where('idjurusan',$id);
        $kelas->delete();

        if($kelas) {
                Alert::success('Berhasil', 'Data berhasil dihapus');
                return redirect('/datajurusan');
            }else{
                //DB::rollback();
                Alert::error('Gagal', 'Gagal menghapus data !');
                return redirect('/datajurusan');
            }
    }

}
