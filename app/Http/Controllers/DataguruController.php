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
                        $btn = '<a href="/dataguru/show/'.$row->id.'"><i class="fas fa-eye" style="font-size:15px;color:#50cd89;"></i></a>
                        &nbsp;&nbsp;
                        <a href="/dataguru/edit/'.$row->id.'"><i class="fas fa-edit" style="font-size:15px;color:#009ef7;"></i></a>
                        &nbsp;&nbsp;
                        <a href="/dataguru/hapus/'.$row->id.'"><i class="fas fa-trash" style="font-size:15px;color:red;"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('dataguru.index', $data);
    }

    public function getKeluarga(Request $request) {
        $keluarga = DB::table('tblkeluarga')->where('idguru', $request->id)->get();
        
        $data = [
            'title' => 'Data keluarga',
            'datakeluarga' => $keluarga,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Keluarga',
            'idguru' => $request->id,
        ];

        return view('dataguru.showkeluarga', $data);
        // print_r($keluarga);
    }

    public function getPendidikan(Request $request) {
        $pendidikan = DB::table('tabelPendidikanGuru')->where('idguru', $request->id)->get();
        
        $data = [
            'title' => 'Data jenjang pendidikan',
            'datajenjang' => $pendidikan,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Pendidikan',
            'idguru' => $request->id,
        ];

        return view('dataguru.showjenjang', $data);
        // print_r($keluarga);
    }

    public function getMapel(Request $request) {
        $mapel = DB::table('tblmapeldiampu')
                    // ->select('league_name')
                    ->join('tblmapel', 'tblmapel.idmapel', '=', 'tblmapeldiampu.idmapel')
                    ->where('idguru', $request->id)
                    ->get();

        $tbmapel = DB::table('tblmapel')->where('status_mapel','Y')->get();
        
        $data = [
            'title' => 'Data mapel yang di ampu',
            'datamapel' => $mapel,
            'tblmapel' => $tbmapel,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Mapel yang diampu',
            'idguru' => $request->id,
        ];

        return view('dataguru.showmapel', $data);
        // print_r($keluarga);
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

    public function getShow($id) {
        // $mapel = DB::table('tblmapel')->where('status_mapel','Y')->get();
        $guru = DB::table('tabelguru')->where('id',$id)->get();
        $keluarga = DB::table('tblkeluarga')->where('idguru', $id)->get();
        $pendidikan = DB::table('tabelPendidikanGuru')->where('idguru', $id)->get();
        $mapel = DB::table('tblmapeldiampu')
                    // ->select('league_name')
                    ->join('tblmapel', 'tblmapel.idmapel', '=', 'tblmapeldiampu.idmapel')
                    ->where('idguru', $id)
                    ->get();

        $data = [
            'title' => 'Detail Data guru',
            'datamapel' => $mapel,
            'dataguru' => $guru,
            'datakeluarga' => $keluarga,
            'datajenjang' => $pendidikan,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Guru'
        ];
        
        return view('dataguru.show', $data);
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
            $tgllahir = date('Y', strtotime($request->input('tgllahirkeluarga')));
            $thnsekarang = Carbon::now()->format('Y');
            $umur = $thnsekarang - $tgllahir;

            $datakeluarga = array(
                'idguru' => $idguru,
                'nama_keluarga' => $nama[$a],
                'hubungan' => $hubungan[$a],
                'tempat_lahir' => $tmplahir[$a],
                'tgl_lahir_keluarga' => $tgllahir[$a],
                'umur_anak' => $umur,
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

    public function storekeluarga(Request $request)
    {
        $tgllahir = date('Y', strtotime($request->input('tgllahirkeluarga')));
        $thnsekarang = Carbon::now()->format('Y');
        $umur = $thnsekarang - $tgllahir;
        $idguru = $request->input('idguru');

        $data = array(
            'idguru' => $idguru,
            'nama_keluarga' => $request->input('nama'),
            'hubungan' => $request->input('hubungan'),
            'tempat_lahir' => $request->input('tempatlahirkeluarga'),
            'tgl_lahir_keluarga' => $request->input('tgllahirkeluarga'),
            'umur_anak' => $umur,
            'reg_date' => Carbon::now()->toDateTimeString()
        );
        $simpan = DB::table('tblkeluarga')->insert($data);

        if($simpan){
            Alert::success('Berhasil', 'Data berhasil disimpan');
            return redirect('/dataguru/showkeluarga/'.$idguru.'');
        }else{
            Alert::error('Gagal', 'Data gagal disimpan');
            return redirect('/dataguru/showkeluarga/'.$idguru.'');
        }
    }

    public function storependidikan(Request $request)
    {
        $idguru = $request->input('idguru');

        $data = array(
                'idguru' => $idguru,
                'Jenjang' => $request->input('jenjang'),
                'Asalperguruantinggi' => $request->input('kampus'),
                'Prodi' => $request->input('prodi'),
                'Tahunmasuk' => $request->input('tahunmasuk'),
                'Tahunkeluar' => $request->input('tahunkeluar'),
                'Ipk' => $request->input('ipk'),
                'reg_date' => Carbon::now()->toDateTimeString()
            );
        $simpan = DB::table('tabelPendidikanGuru')->insert($data);

        if($simpan){
            Alert::success('Berhasil', 'Data berhasil disimpan');
            return redirect('/dataguru/showpendidikan/'.$idguru.'');
        }else{
            Alert::error('Gagal', 'Data gagal disimpan');
            return redirect('/dataguru/showpendidikan/'.$idguru.'');
        }
    }

    public function storemapel(Request $request)
    {
        $idguru = $request->input('idguru');

        $data = array(
                'idguru' => $idguru,
                'idmapel' => $request->input('mapel'),
                'jumlah_jam' => $request->input('jumlah_jam'),
                'kelas' => $request->input('kelas'),
                'reg_date' => Carbon::now()->toDateTimeString()
            );
        $simpan = DB::table('tblmapeldiampu')->insert($data);

        if($simpan){
            Alert::success('Berhasil', 'Data berhasil disimpan');
            return redirect('/dataguru/showmapel/'.$idguru.'');
        }else{
            Alert::error('Gagal', 'Data gagal disimpan');
            return redirect('/dataguru/showmapel/'.$idguru.'');
        }
    }

    public function updatemapel(Request $request)
    {
        $idguru = $request->input('idguru');

        $data = array(
                'idmapel' => $request->input('mapel'),
                'jumlah_jam' => $request->input('jumlah_jam'),
                'kelas' => $request->input('kelas'),
                'reg_date' => Carbon::now()->toDateTimeString()
            );
        $simpan = DB::table('tblmapeldiampu')->where('idmapelampu', $request->input('idmapel'))->update($data);

        if($simpan){
            Alert::success('Berhasil', 'Data berhasil diubah');
            return redirect('/dataguru/showmapel/'.$idguru.'');
        }else{
            Alert::error('Gagal', 'Data gagal diubah');
            return redirect('/dataguru/showmapel/'.$idguru.'');
        }
    }

    public function updatependidikan(Request $request)
    {
        $idguru = $request->input('idguru');

        $data = array(
                'Jenjang' => $request->input('jenjang'),
                'Asalperguruantinggi' => $request->input('kampus'),
                'Prodi' => $request->input('prodi'),
                'Tahunmasuk' => $request->input('tahunmasuk'),
                'Tahunkeluar' => $request->input('tahunkeluar'),
                'Ipk' => $request->input('ipk'),
                'reg_date' => Carbon::now()->toDateTimeString()
            );
        $simpan = DB::table('tabelPendidikanGuru')->where('id', $request->input('idjenjang'))->update($data);

        if($simpan){
            Alert::success('Berhasil', 'Data berhasil diubah');
            return redirect('/dataguru/showpendidikan/'.$idguru.'');
        }else{
            Alert::error('Gagal', 'Data gagal diuabh');
            return redirect('/dataguru/showpendidikan/'.$idguru.'');
        }
    }

    public function updatekeluarga(Request $request)
    {
        $tgllahir = date('Y', strtotime($request->input('tgllahirkeluarga')));
        $thnsekarang = Carbon::now()->format('Y');
        $umur = $thnsekarang - $tgllahir;
        $idguru = $request->input('idguru');

        $data = array(
            'nama_keluarga' => $request->input('nama'),
            'hubungan' => $request->input('hubungan'),
            'tempat_lahir' => $request->input('tempatlahirkeluarga'),
            'tgl_lahir_keluarga' => $request->input('tgllahirkeluarga'),
            'umur_anak' => $umur,
            'reg_date' => Carbon::now()->toDateTimeString()
        );
        $simpan = DB::table('tblkeluarga')->where('idkeluarga', $request->input('idklg'))->update($data);

        if($simpan){
            Alert::success('Berhasil', 'Data berhasil diubah');
            return redirect('/dataguru/showkeluarga/'.$idguru.'');
        }else{
            Alert::error('Gagal', 'Data gagal mengubah data');
            return redirect('/dataguru/showkeluarga/'.$idguru.'');
        }
    }

    public function destroykeluarga($id)
    {
        $data = DB::table('tblkeluarga')->where('idkeluarga',$id);
        $guru = DB::table('tblkeluarga')->where('idkeluarga',$id)->get();
        $data->delete();

        if($data) {
            Alert::success('Berhasil', 'Data berhasil dihapus');
            //return response()->json(['message'=>'Berhasil']);
            return redirect('/dataguru/showkeluarga/'.$guru[0]->idguru.'');
        }else{
                //DB::rollback();
            Alert::error('Gagal', 'Gagal menghapus data !');
            return redirect('/dataguru/showkeluarga/'.$guru[0]->idguru.'');
        }
    }

    public function destroypendidikan($id)
    {
        $data = DB::table('tabelPendidikanGuru')->where('id',$id);
        $pendidikan = DB::table('tabelPendidikanGuru')->where('id',$id)->get();
        $data->delete();

        if($data) {
            Alert::success('Berhasil', 'Data berhasil dihapus');
            //return response()->json(['message'=>'Berhasil']);
            return redirect('/dataguru/showpendidikan/'.$pendidikan[0]->idguru.'');
        }else{
                //DB::rollback();
            Alert::error('Gagal', 'Gagal menghapus data !');
            return redirect('/dataguru/showpendidikan/'.$pendidikan[0]->idguru.'');
        }
    }

    public function destroymapel($id)
    {
        $data = DB::table('tblmapeldiampu')->where('idmapelampu',$id);
        $mapel = DB::table('tblmapeldiampu')->where('idmapelampu',$id)->get();
        $data->delete();

        if($data) {
            Alert::success('Berhasil', 'Data berhasil dihapus');
            //return response()->json(['message'=>'Berhasil']);
            return redirect('/dataguru/showmapel/'.$mapel[0]->idguru.'');
        }else{
                //DB::rollback();
            Alert::error('Gagal', 'Gagal menghapus data !');
            return redirect('/dataguru/showmapel/'.$mapel[0]->idguru.'');
        }
    }

    public function destroyguru($id)
    {
        $datamapel = DB::table('tblmapeldiampu')->where('idguru',$id);
        $datakeluarga = DB::table('tblkeluarga')->where('idguru',$id);
        $datajenjang = DB::table('tabelPendidikanGuru')->where('idguru',$id);
        $data = DB::table('tabelguru')->where('id',$id);

        $datamapel->delete();
        $datakeluarga->delete();
        $datajenjang->delete();
        $data->delete();

        if($data) {
            Alert::success('Berhasil', 'Data berhasil dihapus');
            //return response()->json(['message'=>'Berhasil']);
            return redirect('/dataguru');
        }else{
                //DB::rollback();
            Alert::error('Gagal', 'Gagal menghapus data !');
            return redirect('/dataguru');
        }
    }

}
