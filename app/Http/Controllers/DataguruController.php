<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Alert;
use DataTables;

class DataguruController extends Controller
{
    //
    public function getIndex(Request $request) {
        
        $data = [
            'title' => 'Data Guru',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Guru'
        ];

        if ($request->ajax()) {
            $data = DB::table('tabelguru')->orderBy('id', 'DESC')->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    // ->editColumn('kapasitas', function ($data) {
                    //     $kapasitas = $data->kapasitas." Orang";
                    //     return $kapasitas;
                    // })
                    ->addColumn('action', function($row){
                        $btn = '<a href="/dataguru/edit/'.$row->id.'"><i class="fas fa-edit" style="font-size:15px;color:#009ef7;"></i></a>
                        &nbsp;&nbsp;
                        <a href="/dataguru/hapus/'.$row->id.'"><i class="fas fa-trash" style="font-size:15px;color:red;"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('dataguru.index', $data);
    }


    public function getKeluarga(Request $request, $id) {
        
        $data = [
            'title' => 'Data keluarga',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Keluarga'
        ];

        if ($request->ajax()) {
            $data = DB::table('tblkeluarga')->where('idguru', $id)->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    // ->editColumn('kapasitas', function ($data) {
                    //     $kapasitas = $data->kapasitas." Orang";
                    //     return $kapasitas;
                    // })
                    ->addColumn('action', function($row){
                        $btn = '<a href="/datakeluarga/edit/'.$row->idkeluarga.'"><i class="fas fa-edit" style="font-size:15px;color:#009ef7;"></i></a>
                        &nbsp;&nbsp;
                        <a href="/datakeluarga/hapus/'.$row->idkeluarga.'"><i class="fas fa-trash" style="font-size:15px;color:red;"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('dataguru.showkeluarga', $data);
    }

    
    public function getCreate() {
        $mapel = DB::table('tblmapel')->where('status_mapel','Y')->get();

        $data = [
            'title' => 'Tambah Data guru',
            'datamapel' => $mapel,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Guru'
        ];
        
        return view('dataguru.create', $data);
    }

    public function getEdit($id) {
        $mapel = DB::table('tblmapel')->where('status_mapel','Y')->get();
        $guru = DB::table('tabelguru')->where('id',$id)->get();

        $data = [
            'title' => 'Ubah Data guru',
            'datamapel' => $mapel,
            'dataguru' => $guru,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Guru',
            'editkeluarga' => $id,
            'editjenjang' => $id,
            'editmapel' => $id,
        ];
        
        return view('dataguru.edit', $data);
    }

    public function update(Request $request)
    {        
        $data = array(
            'Nip' => $request->input('nip'),
            'Nik' => $request->input('nik'),
            'Nama' => $request->input('nama_lengkap'),
            'Agama' => $request->input('agama'),
            'Tempatlahir' => $request->input('tempatlahir'),
            'Tanggallahir' => $request->input('tanggallahir'),
            'Jeniskelamin' => $request->input('jenkel'),
            'Alamat' => $request->input('alamat'),
            'NoHp' => $request->input('notelp'),
            'Email' => $request->input('email'),
            'Jabatan' => $request->input('jabatan'),
            'Pangkat' => $request->input('pangkat'),
            'Golongan' => $request->input('golongan'),
            'NUPTK' => $request->input('nuptk'),
            'StatusMenikah' => $request->input('status_marital'),
            'Goldarah' => $request->input('gol_darah'),
            'NamaIbu' => '-',
            'Gelardepan' => $request->input('gelar_depan'),
            'Gelarbelakang' => $request->input('gelar_belakang'),
            'Tahunmasuk' => $request->input('tmt'),
            'Jabatansekolah' => $request->input('tugas'),
            'Niy' => $request->input('niy'),
            'status_guru' => $request->input('status_guru'),
            'balas_bakti_15_tahun' => $request->input('bakti_15'),
            'balas_bakti_25_tahun' => $request->input('bakti_25'),
            'pensiun_55_tahun' => $request->input('pensiun'),
            'masa_perpanjangan_1' => $request->input('perpanjangan_pertama'),
            'masa_perpanjangan_2' => $request->input('perpanjangan_kedua'),
            'masa_perpanjangan_3' => $request->input('perpanjangan_ketiga'),
            'sertifikasi' => $request->input('sertifikasi'),
            'reg_date' => Carbon::now()->toDateTimeString()
        );

        $ubah = DB::table('tabelguru')->where('id',$request->input('id'))->update($data);
        if($ubah) {
                Alert::success('Berhasil', 'Data berhasil diubah');
                return redirect('/dataguru');
            }else{
                //DB::rollback();
                Alert::error('Gagal', 'Gagal mengubah data !');
                return redirect('/dataguru/'.$request->input('id'));
            }

    }

    public function store(Request $request)
    {
        $nama = $request->input('nama');
        $hubungan = $request->input('hubungan');
        $tmplahir = $request->input('tempatlahirkeluarga');
        $tgllahir = $request->input('tgllahirkeluarga');

        $jenjang = $request->input('jenjang');
        $kampus = $request->input('kampus');
        $prodi = $request->input('prodi');
        $tahunmasuk = $request->input('tahunmasuk');
        $tahunkeluar = $request->input('tahunkeluar');
        $ipk = $request->input('ipk');

        $mapel = $request->input('mapel');
        $jam = $request->input('jumlah_jam');
        $kelas = $request->input('kelas');
        $idguru="";
        
        $data = array(
            'Nip' => $request->input('nip'),
            'Nik' => $request->input('nik'),
            'Nama' => $request->input('nama_lengkap'),
            'Agama' => $request->input('agama'),
            'Tempatlahir' => $request->input('tempatlahir'),
            'Tanggallahir' => $request->input('tanggallahir'),
            'Jeniskelamin' => $request->input('jenkel'),
            'Alamat' => $request->input('alamat'),
            'NoHp' => $request->input('notelp'),
            'Email' => $request->input('email'),
            'Jabatan' => $request->input('jabatan'),
            'Pangkat' => $request->input('pangkat'),
            'Golongan' => $request->input('golongan'),
            'NUPTK' => $request->input('nuptk'),
            'StatusMenikah' => $request->input('status_marital'),
            'Goldarah' => $request->input('gol_darah'),
            'NamaIbu' => '-',
            'Gelardepan' => $request->input('gelar_depan'),
            'Gelarbelakang' => $request->input('gelar_belakang'),
            'Tahunmasuk' => $request->input('tmt'),
            'Jabatansekolah' => $request->input('tugas'),
            'Niy' => $request->input('niy'),
            'status_guru' => $request->input('status_guru'),
            'balas_bakti_15_tahun' => $request->input('bakti_15'),
            'balas_bakti_25_tahun' => $request->input('bakti_25'),
            'pensiun_55_tahun' => $request->input('pensiun'),
            'masa_perpanjangan_1' => $request->input('perpanjangan_pertama'),
            'masa_perpanjangan_2' => $request->input('perpanjangan_kedua'),
            'masa_perpanjangan_3' => $request->input('perpanjangan_ketiga'),
            'sertifikasi' => $request->input('sertifikasi'),
            'reg_date' => Carbon::now()->toDateTimeString()
        );

        $simpan = DB::table('tabelguru')->insert($data);        
        $idgr =  DB::table('tabelguru')->latest('id')->first();
        $idguru = $idgr->id; 

        for($a=0;$a<count($nama); $a++){
            $datakeluarga = array(
                'idguru' => $idguru,
                'nama_keluarga' => $nama[$a],
                'hubungan' => $hubungan[$a],
                'tempat_lahir' => $tmplahir[$a],
                'tgl_lahir_keluarga' => $tgllahir[$a],
                'umur_anak' => '28',
                'reg_date' => Carbon::now()->toDateTimeString()
            );
            $simpan = DB::table('tblkeluarga')->insert($datakeluarga);
        }

        for($b=0;$b<count($jenjang); $b++){
            $datapendidikan = array(
                'idguru' => $idguru,
                'Jenjang' => $jenjang[$b],
                'Asalperguruantinggi' => $kampus[$b],
                'Prodi' => $prodi[$b],
                'Tahunmasuk' => $tahunmasuk[$b],
                'Tahunkeluar' => $tahunkeluar[$b],
                'Ipk' => $ipk[$b],
                'reg_date' => Carbon::now()->toDateTimeString()
            );
            $simpan = DB::table('tabelPendidikanGuru')->insert($datapendidikan);
        }

        for($c=0;$c<count($mapel); $c++){
            $datamapel = array(
                'idguru' => $idguru,
                'idmapel' => $mapel[$c],
                'jumlah_jam' => $jam[$c],
                'kelas' => $kelas[$c],
                'reg_date' => Carbon::now()->toDateTimeString()
            );
            $simpan = DB::table('tblmapeldiampu')->insert($datamapel);
        }

        Alert::success('Berhasil', 'Data berhasil disimpan');
        return redirect('/dataguru');

    }

}
