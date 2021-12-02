<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Alert;
use DataTables;

class DatahakaksesController extends Controller
{

    public function getIndex(Request $request) {
        
        $data = [
            'title' => 'Data Hak Akses',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Hak Akses'
        ];

        if ($request->ajax()) {
            $data = DB::table('tblhakakses')
                    ->orderBy('idhakakses', 'desc')
                    ->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="/datahakakses/edit/'.$row->idhakakses.'"><i class="fas fa-edit" style="font-size:15px;color:#009ef7;"></i></a>
                        <a href="/datahakakses/hapus/'.$row->idhakakses.'"><i class="fas fa-trash" style="font-size:15px;color:red;"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('datahakakses.index', $data);
    }

    
    public function getCreate() {
        
        $data = [
            'title' => 'Tambah Data Hak Akses',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Hak Akses'
        ];
        
        return view('datahakakses.create', $data);
    }

    public function getEdit($id) {
        $hakakses = DB::table('tblhakakses')->where('idhakakses', $id)
                    ->get();
        
        $data = [
            'title' => 'Edit Data Hak Akses',
            'datahak' => $hakakses,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Hak Akses'
        ];
        
        return view('datahakakses.edit', $data);
    }

    public function store(Request $request)
    {

        $data = DB::table('tblhakakses')->insert([
            'nama_akses' => $request->input('nama'),
            'keterangan_akses' => $request->input('keterangan'),
            'reg_date' => Carbon::now()->toDateTimeString()
        ]);

        if($data) {
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
            $data = DB::table('tblhakakses')->where('idhakakses',$request->input('id'))->update([
                'nama_akses' => $request->input('nama'),
                'keterangan_akses' => $request->input('keterangan'),
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
        $data = DB::table('tblhakakses')->where('idhakakses',$id);
        $data->delete();

        if($data) {
            Alert::success('Berhasil', 'Data berhasil dihapus');
            //return response()->json(['message'=>'Berhasil']);
            return redirect('/datahakakses');
        }else{
                //DB::rollback();
            Alert::error('Gagal', 'Gagal menghapus data !');
            return redirect('/datahakakses');
        }
    }

}
