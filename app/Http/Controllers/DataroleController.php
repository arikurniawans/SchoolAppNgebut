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
                        $btn = '<a href="/datarole/show/'.$row->iduser.'"><i class="fas fa-eye" style="font-size:15px;color:#009ef7;"></i></a>
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


    public function getEdit($id) {
        $pengguna = DB::table('tabelguru')->get();
        $fitur = DB::table('tblfitur')->get();
        $akses = DB::table('tblhakakses')->get();
        $role = DB::table('v_tblrole')->where('iduser', $id)->get();

        $data = [
            'title' => 'Ubah Data Role',
            'pengguna' => $pengguna,
            'datafitur' => $fitur,
            'dataakses' => $akses,
            'datarole' => $role,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Manajemen Role',
            'testVariable2' => 'Tabel Fitur Aplikasi',
            'testVariable3' => 'Setting Manajemen Role'
        ];
        
        return view('datarole.edit', $data);
    }

    public function getShow($id) {
        $pengguna = DB::table('tabelguru')->get();
        $fitur = DB::table('tblfitur')->get();
        $akses = DB::table('tblhakakses')->get();
        $role = DB::table('v_tblrole')->where('iduser', $id)->get();

        $data = [
            'title' => 'Detail Data Role',
            'pengguna' => $pengguna,
            'datafitur' => $fitur,
            'dataakses' => $akses,
            'datarole' => $role,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Manajemen Role',
            'testVariable2' => 'Tabel Fitur Aplikasi',
            'testVariable3' => 'Setting Manajemen Role'
        ];
        
        return view('datarole.show', $data);
    }

    public function store(Request $request)
    {
        $fitur = $request->input('id');
        $arr = array();
        for($a=0; $a<count($fitur); $a++){
            array_push($arr, array('cek' => $fitur[$a], 'pub' => 'Y'));
        }

        $role;
        foreach ($arr as $key => $value) {
            $data = array(
                'iduser' => $request->input('pengguna'),
                'role_deskripsi' => $request->input('akses'),
                'idfitur' => $value['cek'],
                'publish' => $value['pub'],
                'reg_date' => Carbon::now()->toDateTimeString()
            );
            $role = DB::table('tblrole')->insert($data);            
        }

        if($role) {
            Alert::success('Berhasil', 'Data berhasil ditambahkan');
            return redirect('/datarole');
        }else{
            //DB::rollback();
            Alert::error('Berhasil', 'Gagal menambahkan data');
            return redirect('/datarole/store');
        }
    }

    public function update(Request $request)
    {
        $fitur = $request->input('id');
        $arr = array();
        for($a=0; $a<count($fitur); $a++){
            array_push($arr, array('cek' => $fitur[$a], 'pub' => 'Y'));
        }

        $role;
        foreach ($arr as $key => $value) {
            $data = array(
                'iduser' => $request->input('pengguna'),
                'role_deskripsi' => $request->input('akses'),
                'idfitur' => $value['cek'],
                'publish' => $value['pub'],
                'reg_date' => Carbon::now()->toDateTimeString()
            );
            // $role = DB::table('tblrole')->where('iduser', $request->input('id'))->update($data);
            $role = DB::table('tblrole')->DB::RAW('UPDATE tblrole SET role_deskripsi='.$request->input('akses').', idfitur='.$value['cek'].',publish='.$value['pub'].', reg_date='.Carbon::now()->toDateTimeString().' WHERE iduser='.$request->input('pengguna').'');            
        }

        // if($role) {
        //     Alert::success('Berhasil', 'Data berhasil diubah');
        //     return redirect('/datarole');
        // }else{
        //     //DB::rollback();
        //     Alert::error('Berhasil', 'Gagal mengubah data');
        //     return redirect('/datarole/edit/'.$request->input('id'));
        // }
    }

    public function destroy($id)
    {
        $role =  DB::table('tblrole')->where('iduser',$id);
        $role->delete();

        if($role) {
                Alert::success('Berhasil', 'Data berhasil dihapus');
                return redirect('/datarole');
            }else{
                //DB::rollback();
                Alert::error('Gagal', 'Gagal menghapus data !');
                return redirect('/datarole');
            }
    }

}
