<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelasBerjalan;
use DB;
use Carbon\Carbon;
use Alert;
use DataTables;

class DataSettingSiswaController extends Controller
{
    //
    public function getIndex(Request $request) {

        $data = [
            'title' => 'Data Setting Siswa',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => 'Setting Siswa'
        ];

        if ($request->ajax()) {
            $data = DB::table('v_tblsetsiswa')
                    ->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('tahunakademik', function ($data) {
                        $ta = $data->tahunakademik."/".$data->semester;
                        return $ta;
                    })
                    ->editColumn('Nip', function ($data) {
                        $guru = "<u>".$data->Nama."</u> <br/>NIP : ".$data->Nip;
                        return $guru;
                    })
                    ->editColumn('jmlhsiswa', function ($data) {
                        $ta = $data->jmlhsiswa." Siswa";
                        return $ta;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href="/datasettingsiswa/show/'.$row->kode_kelompok.'/'.$row->tahunakademik.'"><i class="fas fa-eye" style="font-size:15px;color:#009ef7;"></i></a>
                        <a href="/datasettingsiswa/hapus/'.$row->kode_kelompok.'/'.$row->tahunakademik.'"><i class="fas fa-trash" style="font-size:15px;color:red;"></i></a>';
                        return $btn;
                    })
                    ->escapeColumns('Nip')
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('datasettingsiswa.index', $data);

    }

    public function getCreate() {
 
        $kelas = DB::table('tblkelasberjalan')
                ->join('tabeltahunajaran','tabeltahunajaran.idsettingtahun','=','tblkelasberjalan.idsettingtahun')
                ->join('tblkelompokkelas','tblkelompokkelas.idkelompokkls','=','tblkelasberjalan.idkelompokkls')
                ->join('tblruangkelas','tblruangkelas.idruang','=','tblkelasberjalan.idruangkelas')
                ->where('tabeltahunajaran.statusta', 'Y')
                ->get();

        $siswa = DB::table('tblsiswa')
                ->orderBy('idsiswa', 'desc')
                ->get();

        $data = [
            'title' => 'Tambah Setting Siswa',
            'kelas' => $kelas,
            'datasiswa' => $siswa,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Data Kelas Berjalan',
            'testVariable2' => 'Tabel Siswa',
            'testVariable3' => 'Setting Siswa'
        ];
       
        return view('datasettingsiswa.create', $data);
    }

    public function getShow($kls,$thn)
    {
        $kelas = DB::table('v_tblsetsiswa')
                ->where('kode_kelompok', $kls)
                ->where('tahunakademik', $thn)
                ->get();

        $siswa = DB::table('tb_kelas_siswa')
                ->join('tblsiswa','tblsiswa.nis','=','tb_kelas_siswa.nisn') 
                ->join('tblkelasberjalan','tblkelasberjalan.idkelasberjalan','=','tb_kelas_siswa.idkelasberjalan') 
                ->join('tblkelompokkelas','tblkelompokkelas.idkelompokkls','=','tblkelasberjalan.idkelompokkls') 
                ->join('tabeltahunajaran','tabeltahunajaran.idsettingtahun','=','tblkelasberjalan.idsettingtahun')
                ->where('tblkelompokkelas.kode_kelompok', $kls)
                ->where('tabeltahunajaran.tahunakademik', $thn)
                ->get();

        $data = [
            'title' => 'Detail Setting Siswa',
            'kelas' => $kelas,
            'siswa' => $siswa,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Data Kelas Berjalan',
            'testVariable2' => 'Tabel Siswa',
            'testVariable3' => 'Setting Siswa'
        ];
       
        return view('datasettingsiswa.show', $data);
    }

    public function getKelas($id)
    {
        $kelas = DB::table('tblkelasberjalan')
                ->join('tabelguru','tabelguru.id','=','tblkelasberjalan.idguru')
                ->join('tabeltahunajaran','tabeltahunajaran.idsettingtahun','=','tblkelasberjalan.idsettingtahun')
                ->join('tblkelompokkelas','tblkelompokkelas.idkelompokkls','=','tblkelasberjalan.idkelompokkls')
                ->join('tblruangkelas','tblruangkelas.idruang','=','tblkelasberjalan.idruangkelas')
                ->where('tblkelasberjalan.idkelasberjalan', $id)
                ->where('tabeltahunajaran.statusta', 'Y')
                ->get();

        if($kelas){
            return response()->json($kelas);
        }else{
            return response()->json(['empty']);
        }
    }

    public function store(Request $request)
    {
        $idsiswa = $request->input('id');
        if(!empty($idsiswa)){
            for($a=0; $a<count($idsiswa); $a++){
                $data = array(
                    'idkelasberjalan' => $request->input('kelas'),
                    'nisn' => $idsiswa[$a],
                    'reg_date' => Carbon::now()->toDateTimeString()
                );

                $simpan = DB::table('tb_kelas_siswa')->insert($data);
                if($simpan){
                    // Alert::success('Berhasil', 'Setting siswa berhasil');
                    // return redirect()
                    echo "Berhasil";
                }
            }
        }else{
            Alert::error('Gagal', 'Siswa belum dipilih !');
            return redirect()->back(); 
        }
        
    }

    public function destroy($kls, $thn)
    {
        $siswa = DB::table('tb_kelas_siswa')
                ->join('tblsiswa','tblsiswa.nis','=','tb_kelas_siswa.nisn') 
                ->join('tblkelasberjalan','tblkelasberjalan.idkelasberjalan','=','tb_kelas_siswa.idkelasberjalan') 
                ->join('tblkelompokkelas','tblkelompokkelas.idkelompokkls','=','tblkelasberjalan.idkelompokkls') 
                ->join('tabeltahunajaran','tabeltahunajaran.idsettingtahun','=','tblkelasberjalan.idsettingtahun')
                ->where('tblkelompokkelas.kode_kelompok', $kls)
                ->where('tabeltahunajaran.tahunakademik', $thn)
                ->get();
                // echo $siswa[0]->idkelasberjalan;
        $kelas =  DB::table('tb_kelas_siswa')->where('idkelasberjalan',$siswa[0]->idkelasberjalan);
        $kelas->delete();

        if($kelas) {
                Alert::success('Berhasil', 'Data berhasil dihapus');
                return redirect('/datasettingsiswa');
        }else{
                //DB::rollback();
                Alert::error('Gagal', 'Gagal menghapus data !');
                return redirect('/datasettingsiswa');
        }
    }

   
}
