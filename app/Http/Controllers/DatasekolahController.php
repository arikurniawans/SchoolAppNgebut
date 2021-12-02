<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Alert;
use DataTables;
use Validator;

class DatasekolahController extends Controller
{

    public function getIndex(Request $request) {

        $data = [
            'title' => 'Data Sekolah',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],

            'testVariable' => 'Sekolah'
        ];

        if ($request->ajax()) {
            $data = DB::table('tblsekolah')->orderBy('idsekolah', 'DESC')->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="/datasekolah/show/'.$row->idsekolah.'"><i class="fas fa-eye" style="font-size:15px;color:green;"></i></a>
                        &nbsp;&nbsp;<a href="/datasekolah/edit/'.$row->npsn.'"><i class="fas fa-edit" style="font-size:15px;color:#009ef7;"></i></a>
                        &nbsp;&nbsp;
                        <a href="/datasekolah/hapus/'.$row->idsekolah.'"><i class="fas fa-trash" style="font-size:15px;color:red;"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('datasekolah.index', $data);
    }

    public function getCreate() {
        $provinsi = DB::table('tblwilayah')->where('kode', '18')->get();

        $data = [
            'title' => 'Tambah Data Sekolah',
            'dataprov' => $provinsi,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Data sekolah'
        ];
        
        return view('datasekolah.create', $data);
    }

    public function getEdit($id) {
        $provinsi = DB::table('tblwilayah')->where('kode', '18')->get();
        $sekolah = DB::table('tblsekolah')->where('npsn', $id)->get();

        $data = [
            'title' => 'Ubah Data Sekolah',
            'dataprov' => $provinsi,
            'datasekolah' => $sekolah,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Data sekolah'
        ];
        
        return view('datasekolah.edit', $data);
    }

    public function getShow($id) {
        $provinsi = DB::table('tblwilayah')->where('kode', '18')->get();
        $sekolah = DB::table('tblsekolah')->where('idsekolah', $id)->get();

        $data = [
            'title' => 'Detail Data Sekolah',
            'dataprov' => $provinsi,
            'datasekolah' => $sekolah,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Data sekolah'
        ];
        
        return view('datasekolah.show', $data);
    }

    public function store(Request $request)
    {
        $provinsi = DB::table('tblwilayah')->where('kode', $request->post('provinsi'))->get();
        $kabupaten = DB::table('tblwilayah')->where('kode', $request->post('kab'))->get();
        $kecamatan = DB::table('tblwilayah')->where('kode', $request->post('kec'))->get();

        $prov = $provinsi[0]->nama;
        $kab = $kabupaten[0]->nama;
        $kec = $kecamatan[0]->nama;

        $data = array(
            'npsn' => $request->post('npsn'),
            'nama_sekolah' => $request->post('nama_sekolah'),
            'web_sekolah' => $request->post('web_sekolah'),
            'notelp' => $request->post('telp'),
            'alamat_sekolah' => $request->post('alamat'),
            'provinsi' => $prov,
            'kab_kota' => $kab,
            'kec' => $kec,
            'kode_pos' => $request->post('kodepos'),
            'luas_tanah' => $request->post('luas'),
            'ruang_kelas' => $request->post('ruang'),
            'lab' => $request->post('lab'),
            'perpus' => $request->post('perpus'),
            'reg_date' => Carbon::now()->toDateTimeString()
        );

        // $cek = DB::table('tblsekolah')->where('npsn', $request->post('npsn'))->get();
        // if($cek){
        //     return response()->json(['message'=> 'Terdaftar']);
        // }else{
        //     return response()->json(['message'=>'Belum Terdaftar']);
        // }

        $simpan = DB::table('tblsekolah')->insert($data);
        if($simpan) {
            Alert::success('Berhasil', 'Data berhasil ditambahkan');
            return response()->json(['message'=>'success']);
        }else{
            //DB::rollback();
            Alert::error('Gagal', 'Gagal menambahkan data !');
             return response()->json(['message'=>'fail']);
        }
    }

    public function update(Request $request)
    {
        $provinsi = DB::table('tblwilayah')->where('kode', $request->post('provinsi'))->get();
        $kabupaten = DB::table('tblwilayah')->where('kode', $request->post('kab'))->get();
        $kecamatan = DB::table('tblwilayah')->where('kode', $request->post('kec'))->get();

        $prov = $provinsi[0]->nama;
        $kab = $kabupaten[0]->nama;
        $kec = $kecamatan[0]->nama;

        $data = array(
            'npsn' => $request->post('npsn'),
            'nama_sekolah' => $request->post('nama_sekolah'),
            'web_sekolah' => $request->post('web_sekolah'),
            'notelp' => $request->post('telp'),
            'alamat_sekolah' => $request->post('alamat'),
            'provinsi' => $prov,
            'kab_kota' => $kab,
            'kec' => $kec,
            'kode_pos' => $request->post('kodepos'),
            'luas_tanah' => $request->post('luas'),
            'ruang_kelas' => $request->post('ruang'),
            'lab' => $request->post('lab'),
            'perpus' => $request->post('perpus'),
            'reg_date' => Carbon::now()->toDateTimeString()
        );

        // $cek = DB::table('tblsekolah')->where('npsn', $request->post('npsn'))->get();
        // if($cek){
        //     return response()->json(['message'=> 'Terdaftar']);
        // }else{
        //     return response()->json(['message'=>'Belum Terdaftar']);
        // }

        $simpan = DB::table('tblsekolah')->where('idsekolah',$request->input('id'))->update($data);
        if($simpan) {
            Alert::success('Berhasil', 'Data berhasil diubah');
            return response()->json(['message'=>'success']);
        }else{
            //DB::rollback();
            Alert::error('Gagal', 'Gagal mengubah data !');
             return response()->json(['message'=>'fail']);
        }
    }

    public function destroy($id)
    {
        $kelas =  DB::table('tblsekolah')->where('idsekolah',$id);
        $kelas->delete();

        if($kelas) {
                Alert::success('Berhasil', 'Data berhasil dihapus');
                return redirect('/datasekolah');
            }else{
                //DB::rollback();
                Alert::error('Gagal', 'Gagal menghapus data !');
                return redirect('/datasekolah');
            }
    }

    public function cariWilayah(Request $request)
    {
        $id = $request->post('id');
        $data = $request->post('data');

        $n=strlen($id);
        $m=($n==2?5:($n==5?8:0));

        if($data == 'kabupaten'){
            $kabupaten = DB::select("SELECT * FROM tblwilayah WHERE LEFT(kode,'$n')='$id' AND CHAR_LENGTH(kode)=$m ORDER BY nama");
            if($kabupaten){           
                echo "<option value='' selected>Pilih Kabupaten/kota</option>";
                foreach ($kabupaten as $key) {
                    echo "<option value='".$key->kode."'>".$key->nama."</option>";
                }
            }else{
                echo "<option value='' selected>Pilih Kabupaten/kota</option>";
            }
        }else if($data == 'kecamatan'){
            $kecamatan = DB::select("SELECT * FROM tblwilayah WHERE LEFT(kode,'$n')='$id' AND CHAR_LENGTH(kode)=$m ORDER BY nama");
            if($kecamatan){           

                foreach ($kecamatan as $key) {
                    echo "<option value='".$key->kode."'>".$key->nama."</option>";
                }
            }else{
                echo "<option value='' selected>Pilih Kecamatan</option>";
            }
        }
    }

}
