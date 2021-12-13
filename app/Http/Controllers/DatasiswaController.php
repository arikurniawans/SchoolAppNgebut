<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Alert;
use DataTables;
use Validator;

class DatasiswaController extends Controller
{
    public function getIndex(Request $request) {
       
        $data = [
            'title' => 'Data Siswa',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Siswa'
        ];

        if ($request->ajax()) {
            $data = DB::table('tblsiswa')->orderBy('idsiswa', 'DESC')->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('jenkel', function ($data) {
                        if($data->jenkel == 'l'){
                            $jenis = "Laki-laki";
                        }else if($data->jenkel == 'p'){
                            $jenis = "Perempuan";
                        }
                        return $jenis;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href="/datasiswa/show/'.$row->idsiswa.'"><i class="fas fa-eye" style="font-size:15px;color:green;"></i></a>
                        &nbsp;&nbsp;
                        <a href="/datasiswa/edit/'.$row->idsiswa.'"><i class="fas fa-edit" style="font-size:15px;color:#009ef7;"></i></a>
                        &nbsp;&nbsp;
                        <a href="/datasiswa/hapus/'.$row->idsiswa.'"><i class="fas fa-trash" style="font-size:15px;color:red;"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('datasiswa.index', $data);
    }

    
    public function getCreate() {
       
        $data = [
            'title' => 'Tambah Data Siswa',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Data Siswa'
        ];
        
        return view('datasiswa.create', $data);
    }

    public function getEdit($id) {
       $siswa = DB::table('tblsiswa')->where('idsiswa', $id)->get();

        $data = [
            'title' => 'Ubah Data Siswa',
            'datasiswa' => $siswa,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Data Siswa'
        ];
        
        return view('datasiswa.edit', $data);
    }

    public function getShow($id) {
       $siswa = DB::table('tblsiswa')->where('idsiswa', $id)->get();

        $data = [
            'title' => 'Detail Data Siswa',
            'datasiswa' => $siswa,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Data Siswa'
        ];
        
        return view('datasiswa.show', $data);
    }

    public function store(Request $request)
    {
        $data = array(
            'nis' => $request->input('nis'),
            'nisn' => $request->input('nisn'),
            'nama_siswa' => $request->input('nama'),
            'jenkel' => $request->input('jeniskelamin'),
            'tempat_lahir' => $request->input('tempatlahir'),
            'tgl_lahir' => $request->input('tanggallahir'),
            'agama' => $request->input('agama'),
            'nama_ayah' => $request->input('nama_ayah'),
            'nama_ibu' => $request->input('nama_ibu'),
            'alamat' => $request->input('alamat'),
            'ijazah_tahun' => $request->input('tahun'),
            'ijazah_nopes' => $request->input('nopes'),
            'ijazah_no_shun' => $request->input('no_shun'),
            'ijazah_no' => $request->input('no_ijazah'),
            'asal_sekolah' => $request->input('asal_sekolah'),
            'no_telp' => $request->input('no_telp'),
            'tgl_masuk' => $request->input('tgl_masuk'),
            'tgl_keluar' => $request->input('tgl_keluar'),
            'kerja_ayah' => $request->input('kerja_ayah'),
            'kerja_ibu' => $request->input('kerja_ibu'),
            'anak_ke' => $request->input('anak_ke'),
            'reg_date' => Carbon::now()->toDateTimeString(),
            'status_siswa' => 'BT'
        );

        $siswa = DB::table('tblsiswa')->insert($data);
        if($siswa) {
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
        $data = array(
            'nis' => $request->input('nis'),
            'nisn' => $request->input('nisn'),
            'nama_siswa' => $request->input('nama'),
            'jenkel' => $request->input('jeniskelamin'),
            'tempat_lahir' => $request->input('tempatlahir'),
            'tgl_lahir' => $request->input('tanggallahir'),
            'agama' => $request->input('agama'),
            'nama_ayah' => $request->input('nama_ayah'),
            'nama_ibu' => $request->input('nama_ibu'),
            'alamat' => $request->input('alamat'),
            'ijazah_tahun' => $request->input('tahun'),
            'ijazah_nopes' => $request->input('nopes'),
            'ijazah_no_shun' => $request->input('no_shun'),
            'ijazah_no' => $request->input('no_ijazah'),
            'asal_sekolah' => $request->input('asal_sekolah'),
            'no_telp' => $request->input('no_telp'),
            'tgl_masuk' => $request->input('tgl_masuk'),
            'tgl_keluar' => $request->input('tgl_keluar'),
            'kerja_ayah' => $request->input('kerja_ayah'),
            'kerja_ibu' => $request->input('kerja_ibu'),
            'anak_ke' => $request->input('anak_ke'),
            'reg_date' => Carbon::now()->toDateTimeString()
        );

        $siswa = DB::table('tblsiswa')->where('idsiswa', $request->input('id'))->update($data);
        if($siswa) {
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
        $siswa =  DB::table('tblsiswa')->where('idsiswa',$id);
        $siswa->delete();

        if($siswa) {
                Alert::success('Berhasil', 'Data berhasil dihapus');
                return redirect('/datasiswa');
            }else{
                //DB::rollback();
                Alert::error('Gagal', 'Gagal menghapus data !');
                return redirect('/datasiswa');
            }
    }

}
