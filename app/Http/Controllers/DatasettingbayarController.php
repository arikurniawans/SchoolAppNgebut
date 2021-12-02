<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Alert;
use DataTables;

class DatasettingbayarController extends Controller
{
    //
    public function getIndex(Request $request) {
        
        $data = [
            'title' => 'Setting Pembayaran Siswa',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Setting Pembayaran'
        ];

        if ($request->ajax()) {
            $data = DB::table('v_tbldaftarsiswapembayaran')->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="/datasettingpembayaran/create/'.$row->nisn.'" title="Setting Pembayaran"><i class="fas fa-users-cog" style="font-size:15px;color:#009ef7;"></i></a>
                        &nbsp;&nbsp;
                        <a href="/datasettingpembayaran/lihat/'.$row->nisn.'" title="Lihat Pembayaran"><i class="fas fa-sticky-note" style="font-size:15px;color:green;"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('datasettingpembayaran.index', $data);
    }

    
    public function getCreate($id) {
       $siswa = DB::table('v_tbldaftarsiswapembayaran')->where('nisn', $id)->get();
       $biaya = DB::table('tblkomponenbiaya')->get();
       $tahun = DB::table('tabeltahunajaran')->where('statusta', 'Y')->get();

        $data = [
            'title' => 'Setting Pembayaran Siswa',
            'siswa' => $siswa,
            'databiaya' => $biaya,
            'datatahun' => $tahun,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Data Siswa',
            'testVariable2' => 'Tabel Setting Pembayaran',
            'testVariable3' => 'Setting Pembayaran Siswa'
        ];
        
        return view('datasettingpembayaran.create', $data);
    }
    
    public function getShow($id) {
        $siswa = DB::table('v_tbldaftarsiswapembayaran')->where('nisn', $id)->get();
        $bayar = DB::table('v_tabelviewbayar')->where('nisn', $id)->get();

        $data = [
            'title' => 'Setting Pembayaran Siswa',
            'siswa' => $siswa,
            'databayar' => $bayar,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Data Siswa',
            'testVariable2' => 'Tabel Setting Pembayaran',
            'testVariable3' => 'Setting Pembayaran Siswa'
        ];
        
        return view('datasettingpembayaran.show', $data);
    }

    public function store(Request $request)
    {
        //DB::beginTransaction();
        $data = array(
            'nisn' => $request->input('nisn'),
            'tahunakademik' => $request->input('tahunakademik'),
            'semester' => $request->input('semester'),
            'idkomponenbiaya' => $request->input('id'),
            'reg_date' => Carbon::now()->toDateTimeString(),
            'status' => 'BL'
        );

        $simpan = DB::table('tblsettingpembayaran')->insert($data);

        if($simpan) {
            //Alert::success('Berhasil', 'Data berhasil ditambahkan');
            return response()->json(['message'=>'Berhasil']);
        }else{
            //DB::rollback();
            //Alert::error('Gagal', 'Gagal menambahkan data !');
            return response()->json(['message'=>'Gagal !']);
        }
        
    }
}