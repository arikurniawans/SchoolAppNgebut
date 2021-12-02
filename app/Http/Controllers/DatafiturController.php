<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Alert;
use DataTables;

class DatafiturController extends Controller
{
  
    public function getIndex(Request $request) {
        
        $data = [
            'title' => 'Data Fitur',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Fitur'
        ];

        if ($request->ajax()) {
            $data = DB::table('tblfitur')
                    ->orderBy('idfitur', 'desc')
                    ->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="/datafitur/edit/'.$row->idfitur.'"><i class="fas fa-edit" style="font-size:15px;color:#009ef7;"></i></a>
                        <a href="/datafitur/hapus/'.$row->idfitur.'"><i class="fas fa-trash" style="font-size:15px;color:red;"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
       
        return view('datafitur.index', $data);
    }

    
    public function getCreate() {
        
        $data = [
            'title' => 'Tambah Data Fitur',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Fitur'
        ];
        
        return view('datafitur.create', $data);
    }

    public function getEdit($id) {
        $fitur = DB::table('tblfitur')->where('idfitur', $id)
                    ->get();
        
        $data = [
            'title' => 'Edit Data Fitur',
            'datafitur' => $fitur,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Fitur'
        ];
        
        return view('datafitur.edit', $data);
    }

    public function store(Request $request)
    {

        $data = DB::table('tblfitur')->insert([
            'nama_fitur' => $request->input('nama'),
            'endpoint_fitur' => $request->input('endpoint'),
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
            $data = DB::table('tblfitur')->where('idfitur',$request->input('id'))->update([
                'nama_fitur' => $request->input('nama'),
            'endpoint_fitur' => $request->input('endpoint'),
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
        $data = DB::table('tblfitur')->where('idfitur',$id);
        $data->delete();

        if($data) {
            Alert::success('Berhasil', 'Data berhasil dihapus');
            //return response()->json(['message'=>'Berhasil']);
            return redirect('/datafitur');
        }else{
                //DB::rollback();
            Alert::error('Gagal', 'Gagal menghapus data !');
            return redirect('/datafitur');
        }
    }

}
