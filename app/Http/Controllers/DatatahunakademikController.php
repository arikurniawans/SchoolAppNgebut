<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SettingAkademik;
use DB;
use Carbon\Carbon;
use Alert;
use DataTables;

class DatatahunakademikController extends Controller
{

    public function getIndex(Request $request) {
       
        // $tahunakademik = DB::table('tabeltahunajaran')->orderBy('idsettingtahun', 'desc')->get();
        $data = [
            'title' => 'Data Tahun Akademik',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => 'Tahun Akademik'
        ];

        if ($request->ajax()) {
            $data = DB::table('tabeltahunajaran')->orderBy('idsettingtahun', 'desc')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('statusta', function ($data) {
                        if($data->statusta == 'Y'){
                            return 'Aktif';
                        }else{
                            return 'Non Aktif';
                        }
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href="/datatahunakademik/edit/'.$row->idsettingtahun.'"><i class="fas fa-edit" style="font-size:15px;color:#009ef7;"></i></a>
                        &nbsp;&nbsp;
                        <a href="/datatahunakademik/hapus/'.$row->idsettingtahun.'"><i class="fas fa-trash" style="font-size:15px;color:red;"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('datatahunakademik.index', $data);
    }


    public function getCreate() {
        $data = [
            'title' => 'Tambah Data Tahun Akademik',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => 'Tahun Akademik'
        ];
        return view('datatahunakademik.create', $data);
    }

    public function getEdit($id) {

        $tahunakademik = DB::table('tabeltahunajaran')->where('idsettingtahun', $id)->get();

        $data = [
            'title' => 'Edit Data Tahun Akademik',
            'tahunakademik' =>$tahunakademik,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => 'Tahun Akademik'
        ];

        return view('datatahunakademik.edit', $data);
    }

    public function show()
    {
        $tahunakademik = DB::table('tabeltahunajaran')->orderBy('idsettingtahun', 'desc')->get();
        $data = ['tahunakademik' => $tahunakademik];
        return view('datatahunakademik.tabel', $data);
    }

    public function store(Request $request)
    {
        //DB::beginTransaction();

        $setting = DB::table('tabeltahunajaran')->insert([
            'tahunakademik' => $request->input('tahun_akademik'),
            'semester' => $request->input('semester'),
            'statusta' => $request->input('status'),
            'reg_date' => Carbon::now()->toDateTimeString()
        ]);

        if($setting) {
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
            $data = DB::table('tabeltahunajaran')->where('idsettingtahun',$request->input('id_tahun'))->update([
                'tahunakademik' => $request->input('tahun_akademik'),
                'semester' => $request->input('semester'),
                'statusta' => $request->input('status'),
                'reg_date' => Carbon::now()->toDateTimeString()
            ]);

            if($data) {
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
        $data = DB::table('tabeltahunajaran')->where('idsettingtahun',$id);
        $data->delete();

        if($data) {
            Alert::success('Berhasil', 'Data berhasil dihapus');
            //return response()->json(['message'=>'Berhasil']);
            return redirect('/datatahunakademik');
        }else{
                //DB::rollback();
            Alert::error('Gagal', 'Gagal menghapus data !');
            return redirect('/datatahunakademik');
        }
    }

}
