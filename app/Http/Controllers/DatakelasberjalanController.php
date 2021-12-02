<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelasBerjalan;
use DB;
use Carbon\Carbon;
use Alert;
use DataTables;

class DatakelasberjalanController extends Controller
{
    //
    public function getIndex(Request $request) {

        $data = [
            'title' => 'Data Kelas Berjalan',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => 'Kelas Berjalan'
        ];

        if ($request->ajax()) {
            $data = DB::table('tblkelasberjalan')
                    ->join('tabeltahunajaran','tblkelasberjalan.idsettingtahun','=','tabeltahunajaran.idsettingtahun')
                    ->join('tblkelompokkelas','tblkelasberjalan.idkelompokkls','=','tblkelompokkelas.idkelompokkls')
                    ->join('tabelguru','tblkelasberjalan.idguru','=','tabelguru.id')
                    // ->select('tblkelasberjalan.idke','tblkelasberjalan.idruangkelas as ruang')
                    ->orderBy('idkelasberjalan', 'desc')
                    ->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="/datakelasberjalan/edit/'.$row->idkelasberjalan.'"><i class="fas fa-edit" style="font-size:15px;color:#009ef7;"></i></a>
                        <a href="/datakelasberjalan/hapus/'.$row->idkelasberjalan.'"><i class="fas fa-trash" style="font-size:15px;color:red;"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('datakelasberjalan.index', $data);

    }

    public function getCreate() {
 
        $tahunakademik = DB::table('tabeltahunajaran')->where('statusta', 'Y')->get();
        $kelompok = DB::table('tblkelompokkelas')->get();
        $guru = DB::table('tabelguru')->get();

        $data = [
            'title' => 'Tambah Data Kelas Berjalan',
            'tahunakademik' => $tahunakademik,
            'kelompok' => $kelompok,
            'guru' => $guru,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Kelas Berjalan'
        ];
       
        return view('datakelasberjalan.create', $data);
    }

    public function getEdit($id) {
        
        $kelas = DB::table('tblkelasberjalan')
                    ->join('tabeltahunajaran','tblkelasberjalan.idsettingtahun','=','tabeltahunajaran.idsettingtahun')
                    ->join('tblkelompokkelas','tblkelasberjalan.idkelompokkls','=','tblkelompokkelas.idkelompokkls')
                    ->join('tabelguru','tblkelasberjalan.idguru','=','tabelguru.id')
                    ->where('idkelasberjalan',$id)
                    ->get();

        $tahunakademik = DB::table('tabeltahunajaran')->where('statusta', 'Y')->get();
        $kelompok = DB::table('tblkelompokkelas')->get();
        $guru = DB::table('tabelguru')->get();

        if ($kelas) {

            $data = [
            'title' => 'Edit Data Kelas Berjalan',
            'datakelas' => $kelas,
            'thnajaran' => $tahunakademik,
            'kelompok' => $kelompok,
            'guru' => $guru,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Kelas Berjalan'
        ];

        return view('datakelasberjalan.edit', $data);
         //var_dump($kelas);
            
        } else {
            return redirect('/datakelasberjalan');
        }

    }

    public function store(Request $request)
    {
        $kelas = DB::table('tblkelasberjalan')->insert([
            'idsettingtahun' => $request->input('tahunakademik'),
            'idruangkelas' => $request->input('kelas'),
            'idkelompokkls' => $request->input('rombel'),
            'tingkat_kelas' => $request->input('tingkat'),
            'idjurusan' => $request->input('jurusan'),
            'idguru' => $request->input('walikelas'),
            'reg_date' => Carbon::now()->toDateTimeString()
        ]);

        if($kelas) {
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
        $kelas = DB::table('tblkelasberjalan')->where('idkelasberjalan',$request->input('id'))->update([
                'idsettingtahun' => $request->input('tahunakademik'),
                'idruangkelas' => $request->input('kelas'),
                'idkelompokkls' => $request->input('rombel'),
                'tingkat_kelas' => $request->input('tingkat'),
                'idjurusan' => $request->input('jurusan'),
                'idguru' => $request->input('walikelas'),
                'reg_date' => Carbon::now()->toDateTimeString()
            ]);

            if($kelas) {
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
        $kelas =  DB::table('tblkelasberjalan')->where('idkelasberjalan',$id);
        $kelas->delete();

        if($kelas) {
                Alert::success('Berhasil', 'Data berhasil dihapus');
                return redirect('/datakelasberjalan');
            }else{
                //DB::rollback();
                Alert::error('Gagal', 'Gagal menghapus data !');
                return redirect('/datakelasberjalan');
            }
    }


}
