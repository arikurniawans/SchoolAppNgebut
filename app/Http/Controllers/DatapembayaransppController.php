<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Alert;
use DataTables;
use Validator;

class DatapembayaransppController extends Controller
{
    //

    public function getIndex(Request $request) {
        
        $data = [
            'title' => 'Pembayaran SPP',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Pembayaran SPP'
        ];

        if ($request->ajax()) {
            $data = DB::table('v_sppsiswa')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('jmlh', function ($data) {
                        $jmlh = $data->jmlh." Komponen";
                        return $jmlh;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href="/datapembayaranspp/create/'.$row->nisn.'"><i class="fas fa-edit" style="font-size:15px;color:#009ef7;"></i></a>
                        &nbsp;&nbsp;
                        <a href="/datapembayaranspp/show/'.$row->nisn.'"><i class="fas fa-trash" style="font-size:15px;color:red;"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('datapembayaranspp.index', $data);
    }
    
    public function getCreate($id) {
        $siswa = DB::table('v_sppsiswa')->where('nisn', $id)->get();
        $bayar = DB::table('v_tabelviewbayar')->where('nisn', $id)->get();

        $data = [
            'title' => 'Input Pembayaran SPP',
            'datasiswa' => $siswa,
            'databayar' => $bayar,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Data Siswa',
            'testVariable2' => 'Tabel Rincian Tagihan Pembayaran',
            'testVariable3' => 'Input Pembayaran SPP'
        ];
        
        return view('datapembayaranspp.create', $data);
    }


    public function store(Request $request)
    {
        request()->validate([
         'select_file'  => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
       ]);
  
        if ($files = $request->file('select_file')) {
             
            //store file into document folder
            $image = $request->file('select_file');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('bukti'), $new_name);
            
            $data = array(
                'nisn' => $request->input('nisn'),
                'idkomponenbiaya' => $request->input('komponen'),
                'nominal_bayar' => $request->input('jumlah'),
                'nominal_sisa' => $request->input('belum'),
                'file_bukti' => $new_name,
                'keterangan' => '-',
                'reg_date' => Carbon::now()->toDateTimeString()
            );

            $simpan = DB::table('tblpembayaranspp')->insert($data);
            $ubahsetbayar = DB::table('tblsettingpembayaran')->where(['idkomponenbiaya' => $request->input('komponen')])->update(['status' => 'V']);

            if($simpan) {
                //Alert::success('Berhasil', 'Data berhasil ditambahkan');
                return response()->json(['message'=>'success']);
            }else{
                //DB::rollback();
                //Alert::error('Gagal', 'Gagal menambahkan data !');
                return response()->json(['message'=>'fail']);
            }
        }
    }

    public function getShow($id) {
        $rincian = DB::table('v_tblvalidasispp')->where('nisn', $id)->get();
        $siswa = DB::table('v_sppsiswa')->where('nisn', $id)->get();

        $data = [
            'title' => 'Validasi Pembayaran SPP',
            'datasiswa' => $siswa,
            'datarincian' => $rincian,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Data Siswa',
            'testVariable2' => 'Tabel Rincian Pembayaran',
            'testVariable3' => 'Validasi Pembayaran SPP'
        ];
        
        return view('datapembayaranspp.show', $data);
    }

    public function cariKomponen(Request $request)
    {
        $id = $request->post('id');
        $komponen = DB::table('tblkomponenbiaya')->where('idkomponen', $id)->get();
        if($komponen){
            return response()->json(['message'=> $komponen]);
        }else{
            return response()->json(['message'=> null]);
        }
    }

    public function simpanValidasi(Request $request)
    {
        $nisn = $request->input('nisn');
        $idkomp = $request->input('idkomp');
        $keterangan = $request->input('keterangan');
        foreach ($keterangan as $key => $value) {
            $spp = DB::table('tblpembayaranspp')->where(['nisn' => $nisn, 'idkomponenbiaya' => $idkomp[$key]])->get();

            $bayar = DB::table('tblsettingpembayaran')->where(['nisn' => $nisn, 'idkomponenbiaya' => $idkomp[$key]])->get();

            foreach ($spp as $data) {
                $ubah1 = DB::table('tblpembayaranspp')->where(['idbayarspp' => $data->idbayarspp])->update(['keterangan' => $keterangan[$key]]);
            }

            foreach ($bayar as $databayar) {
                $ubah2 = DB::table('tblsettingpembayaran')->where(['idsettingbayar' => $databayar->idsettingbayar])->update(['status' => $keterangan[$key]]);
            }

        Alert::success('Berhasil', 'Validasi Data Berhasil');
        return redirect('/datapembayaranspp');

        }
    }



}