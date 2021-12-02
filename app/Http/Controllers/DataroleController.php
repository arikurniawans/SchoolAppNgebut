<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Alert;
use DataTables;
use Validator;

class DataroleController extends Controller
{
    public function getIndex(Request $request) {        
        
        $data = [
            'title' => 'Data Role',            
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Role'
        ];

        if ($request->ajax()) {
            $data = DB::table('tabelguru')
                    ->select(DB::raw('DISTINCT(tblrole.iduser), tabelguru."Nama", tblhakakses.nama_akses'))
                    ->join('tblrole','tblrole.iduser','=','tabelguru.id')
                    ->join('tblhakakses','tblhakakses.idhakakses','=','tblrole.role_deskripsi')
                    ->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="/datarole/edit/'.$row->iduser.'"><i class="fas fa-edit" style="font-size:15px;color:#009ef7;"></i></a>
                        &nbsp;&nbsp;
                        <a href="/datarole/hapus/'.$row->iduser.'"><i class="fas fa-trash" style="font-size:15px;color:red;"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('datarole.index', $data);
    }

    public function getCreate() {
        $pengguna = DB::table('tabelguru')->get();
        $fitur = DB::table('tblfitur')->get();
        $akses = DB::table('tblhakakses')->get();

        $data = [
            'title' => 'Tambah Data Role',
            'pengguna' => $pengguna,
            'datafitur' => $fitur,
            'dataakses' => $akses,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Manajemen Role',
            'testVariable2' => 'Tabel Fitur Aplikasi',
            'testVariable3' => 'Setting Manajemen Role'
        ];
        
        return view('datarole.create', $data);
    }

    public function store(Request $request)
    {
        // $role = DB::table('tblrole')->insert([
        //     'iduser' => $request->input('pengguna'),
        //     'role_deskripsi' => $request->input('akses'),
        //     'idfitur' => $arr['cek'],
        //     'publish' => $arr['pub'],
        //     'reg_date' => Carbon::now()->toDateTimeString()
        // ]);

        // if($role) {
        //     Alert::success('Berhasil', 'Data berhasil ditambahkan');
        //     return redirect('/datarole');
        // }else{
        //     //DB::rollback();
        //     Alert::error('Gagal', 'Gagal menambahkan data !');
        //     return redirect('/datarole/store');
        // }
        $fitur = $request->input('id');
        $arr = array();
        for($a=0; $a<count($fitur); $a++){
            array_push($arr, array('cek' => $fitur[$a], 'pub' => 'Y'));
        }

        foreach ($arr as $key => $value) {
            $data = array(
                'iduser' => $request->input('pengguna'),
                'role_deskripsi' => $request->input('akses'),
                'idfitur' => $value['cek'],
                'publish' => $value['pub'],
                'reg_date' => Carbon::now()->toDateTimeString()
            );
            $role = DB::table('tblrole')->insert($data);
            if($role) {
                Route::get('/datarole/index');
            }else{
                //DB::rollback();
                redirect('/datarole/store')->with('status', 'An error occurred.');
            }
        }
    }

}
