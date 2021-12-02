<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Alert;
use DataTables;

class DatasettingjadwalController extends Controller
{
    //

    public function getIndex(Request $request) {

        $data = [
            'title' => 'Data Setting Jadwal',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Setting Jadwal'
        ];

        if ($request->ajax()) {
            $data = DB::table('v_tabelsetting_jadwal')
                    ->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('tingkat_kelas', function ($data) {
                        $kelas = $data->tingkat_kelas." ".$data->jurusan_kelompok." ".$data->nama_kelompok;
                        return $kelas;
                    })
                    ->editColumn('hari', function ($data) {
                        $jam = $data->jam_mulai." - ".$data->jam_selesai;
                        $jadwal = $data->hari."<br/><i class='fas fa-clock'></i> ".$jam;
                        return $jadwal;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href="/datasettingjadwal/edit/'.$row->idsetjadwal.'"><i class="fas fa-edit" style="font-size:15px;color:#009ef7;"></i></a>
                        <a href="/datasettingjadwal/hapus/'.$row->idsetjadwal.'"><i class="fas fa-trash" style="font-size:15px;color:red;"></i></a>';
                        return $btn;
                    })
                    ->escapeColumns('hari')
                    ->rawColumns(['action'])
                    ->make(true);
        }
       
        return view('datasettingjadwal.index', $data);
    }

    
    public function getCreate() {
        
        $kelas = DB::table('tblkelasberjalan')
                    ->join('tblkelompokkelas','tblkelasberjalan.idkelompokkls','=','tblkelompokkelas.idkelompokkls')
                    // ->select('tblkelasberjalan.idke','tblkelasberjalan.idruangkelas as ruang')
                    ->orderBy('idkelasberjalan', 'desc')
                    ->get();

        $guru = DB::table('tabelguru')->get();
        $mapel = DB::table('tabelmapel')->get();

        $data = [
            'title' => 'Tambah Data Setting Jadwal',
            'datakelas' => $kelas,
            'dataguru' => $guru,
            'datamapel' => $mapel,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Setting Jadwal'
        ];
        
        return view('datasettingjadwal.create', $data);
    }

    public function getEdit($id) {
        $kelas = DB::table('tblkelasberjalan')
                    ->join('tblkelompokkelas','tblkelasberjalan.idkelompokkls','=','tblkelompokkelas.idkelompokkls')
                    // ->select('tblkelasberjalan.idke','tblkelasberjalan.idruangkelas as ruang')
                    ->orderBy('idkelasberjalan', 'desc')
                    ->get();

        $guru = DB::table('tabelguru')->get();
        $mapel = DB::table('tabelmapel')->get();

        $setjadwal = DB::table('v_tabelsetting_jadwal')->where('idsetjadwal', $id)
                    ->get();

        $data = [
            'title' => 'Edit Data Setting Jadwal',
            'datakelas' => $kelas,
            'dataguru' => $guru,
            'datamapel' => $mapel,
            'datajadwal' => $setjadwal,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Setting Jadwal'
        ];
        
        return view('datasettingjadwal.edit', $data);
    }

    public function getSetjadwal() {
        
        $data = [
            'title' => 'Tambah Data Setting Jadwal',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Setting Jadwal'
        ];
        
        return view('datasettingjadwal.setjadwal', $data);
    }

    public function store(Request $request)
    {
        $hari = $request->input('hari');

        if($hari == 'Senin'){
            $kodehr = '1';
        }else if($hari == 'Selasa'){
            $kodehr = '2';
        }else if($hari == 'Rabu'){
            $kodehr = '3';
        }else if($hari == 'Kamis'){
            $kodehr = '4';
        }else if($hari == 'Jumat'){
            $kodehr = '5';
        }else if($hari == 'Sabtu'){
            $kodehr = '6';
        }

        $data = DB::table('tblsettingjadwal')->insert([
            'idkelasberjalan' => $request->input('kelas'),
            'idmapel' => $request->input('mapel'),
            'idguru' => $request->input('guru'),
            'hari' => $hari,
            'jam_mulai' => $request->input('jam_mulai'),
            'jam_selesai' => $request->input('jam_selesai'),
            'reg_date' => Carbon::now()->toDateTimeString(),
            'kode_hari' => $kodehr
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
            $hari = $request->input('hari');

            if($hari == 'Senin'){
                $kodehr = '1';
            }else if($hari == 'Selasa'){
                $kodehr = '2';
            }else if($hari == 'Rabu'){
                $kodehr = '3';
            }else if($hari == 'Kamis'){
                $kodehr = '4';
            }else if($hari == 'Jumat'){
                $kodehr = '5';
            }else if($hari == 'Sabtu'){
                $kodehr = '6';
            }

            $setjadwal = DB::table('tblsettingjadwal')->where('idsetjadwal',$request->input('id'))->update([
                'idkelasberjalan' => $request->input('kelas'),
                'idmapel' => $request->input('mapel'),
                'idguru' => $request->input('guru'),
                'hari' => $hari,
                'jam_mulai' => $request->input('jam_mulai'),
                'jam_selesai' => $request->input('jam_selesai'),
                'reg_date' => Carbon::now()->toDateTimeString(),
                'kode_hari' => $kodehr
            ]);


            if($setjadwal) {
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
        $setjadwal = DB::table('tblsettingjadwal')->where('idsetjadwal',$id);
        $setjadwal->delete();

        if ($setjadwal) {
            Alert::success('Berhasil', 'Data berhasil dihapus');
            return redirect('/datasettingjadwal');
        } else {
            Alert::error('Gagal', 'Gagal menghapus data !');
            return redirect('/datasettingjadwal');
        }
    }

}
