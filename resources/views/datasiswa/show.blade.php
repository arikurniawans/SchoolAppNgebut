{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('sub_header_action')
<a href="{{ url('datasiswa') }}" class="btn btn-sm btn-primary">Kembali ke {{$testVariable}}</a>
@endsection

@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">
        <!--begin::Card-->
        {{--LANGSUNG GUNAKAN NAMA VARIABLE YANG TELAH DIMASUKKAN KE ARRAY ELEMEN DI CONTROLLER PEMANGGIL SEBELUMNYA(HOMECONTROLLER::example()) --}}
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    Detail {{ $testVariable }}
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                </div>
                <!--end::Card toolbar-->
            </div>

            <div class="card-body pt-0">
                <!--begin::Notice-->
                <!--begin::Notice-->
                <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
                    <!--begin::Icon-->
                    <!--begin::Svg Icon | path: icons/duotone/Code/Warning-1-circle.svg-->
                    <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
																<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																	<rect fill="#000000" x="11" y="7" width="2" height="8" rx="1" />
																	<rect fill="#000000" x="11" y="16" width="2" height="2" rx="1" />
																</svg>
															</span>
                    <!--end::Svg Icon-->
                    <!--end::Icon-->
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack flex-grow-1">
                        <!--begin::Content-->
                        <div class="fw-bold">
                            <h4 class="text-gray-800 fw-bolder">Informasi</h4>
                            <div class="fs-6 text-gray-600">Detail informasi data siswa</div>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Notice-->
                <!--end::Notice-->
                <!--begin::Input group-->
                	<table class="table table-hover">
                    <tbody>
                        <tr>
                            <td width="20%"><b>NIS</b></td>
                            <td width="2%">:</td>
                            <td>{{$datasiswa[0]->nis}}</td>
                        </tr>
                        <tr>
                            <td width="20%"><b>NISN</b></td>
                            <td width="2%">:</td>
                            <td>{{$datasiswa[0]->nisn}}</td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Nama Siswa</b></td>
                            <td width="2%">:</td>
                            <td>{{$datasiswa[0]->nama_siswa}}</td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Jenis Kelamin</b></td>
                            <td width="2%">:</td>
                            <td>@if($datasiswa[0]->jenkel == 'l') Laki-laki @elseif($datasiswa[0]->jenkel == 'p') Perempuan @endif</td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Tempat Lahir</b></td>
                            <td width="2%">:</td>
                            <td>{{$datasiswa[0]->tempat_lahir}}</td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Tanggal Lahir</b></td>
                            <td width="2%">:</td>
                            <td>{{$datasiswa[0]->tgl_lahir}}</td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Agama</b></td>
                            <td width="2%">:</td>
                            <td>{{$datasiswa[0]->agama}}</td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Nama Ayah</b></td>
                            <td width="2%">:</td>
                            <td>{{$datasiswa[0]->nama_ayah}}</td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Nama Ibu</b></td>
                            <td width="2%">:</td>
                            <td>{{$datasiswa[0]->nama_ibu}}</td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Alamat Tinggal</b></td>
                            <td width="2%">:</td>
                            <td>{{$datasiswa[0]->alamat}}</td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Email Wali Siswa</b></td>
                            <td width="2%">:</td>
                            <td>{{$datasiswa[0]->email_wali}}</td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Email Siswa</b></td>
                            <td width="2%">:</td>
                            <td>{{$datasiswa[0]->email_siswa}}</td>
                        </tr>
                        <tr style="background-color: #DCDCDC">
                            <td colspan="3"><b># Data Ijazah</b></td>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Tahun Ijazah</b></td>
                            <td width="2%">:</td>
                            <td>{{$datasiswa[0]->ijazah_tahun}}</td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Nopes UN SMP</b></td>
                            <td width="2%">:</td>
                            <td>{{$datasiswa[0]->ijazah_nopes}}</td>
                        </tr>
                        <tr>
                            <td width="20%"><b>NO. SHUN</b></td>
                            <td width="2%">:</td>
                            <td>{{$datasiswa[0]->ijazah_no_shun}}</td>
                        </tr>
                        <tr>
                            <td width="20%"><b>NO. Ijazah</b></td>
                            <td width="2%">:</td>
                            <td>{{$datasiswa[0]->ijazah_no}}</td>
                        </tr>
                        <tr style="background-color: #DCDCDC">
                            <td colspan="3"></td>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Asal Sekolah</b></td>
                            <td width="2%">:</td>
                            <td>{{$datasiswa[0]->asal_sekolah}}</td>
                        </tr>
                        <tr>
                            <td width="20%"><b>NO. Telepon</b></td>
                            <td width="2%">:</td>
                            <td>{{$datasiswa[0]->no_telp}}</td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Tanggal Masuk</b></td>
                            <td width="2%">:</td>
                            <td>{{$datasiswa[0]->tgl_masuk}}</td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Tanggal Keluar</b></td>
                            <td width="2%">:</td>
                            <td>{{$datasiswa[0]->tgl_keluar}}</td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Pekerjaan Ayah</b></td>
                            <td width="2%">:</td>
                            <td>{{$datasiswa[0]->kerja_ayah}}</td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Pekerjaan Ibu</b></td>
                            <td width="2%">:</td>
                            <td>{{$datasiswa[0]->kerja_ibu}}</td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Anak Ke-</b></td>
                            <td width="2%">:</td>
                            <td>{{$datasiswa[0]->anak_ke}}</td>
                        </tr>
                    </tbody>
                </table>

        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
@endsection

@push('lib-js')
@endpush
@push('js')
@endpush
