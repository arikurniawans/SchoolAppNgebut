{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('sub_header_action')
<a href="{{ url('datasekolah') }}" class="btn btn-sm btn-primary">Kembali ke {{$testVariable}}</a>
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
                            <h4 class="text-gray-800 fw-bolder">Perhatian</h4>
                            <div class="fs-6 text-gray-600">Pengguna agar memperhatikan seluruh <b class="text-danger">input/isian</b> yang disediakan!</div>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Notice-->
                <!--end::Notice-->
                <!--begin::Input group-->
                @foreach($datasekolah as $sekolah)
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td width="20%"><b>NPSN</b></td>
                            <td width="2%">:</td>
                            <td>{{$sekolah->npsn}}</td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Nama Sekolah</b></td>
                            <td width="2%">:</td>
                            <td>{{$sekolah->nama_sekolah}}</td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Web Sekolah</b></td>
                            <td width="2%">:</td>
                            <td><a href="{{$sekolah->web_sekolah}}" target="_blank">{{$sekolah->web_sekolah}}</a></td>
                        </tr>
                        <tr>
                            <td width="20%"><b>No. Telepon</b></td>
                            <td width="2%">:</td>
                            <td>{{$sekolah->notelp}}</td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Alamat Sekolah</b></td>
                            <td width="2%">:</td>
                            <td>{{$sekolah->alamat_sekolah}}</td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Provinsi / Kabupaten / Kota / Kecamatan</b></td>
                            <td width="2%">:</td>
                            <td>{{$sekolah->provinsi}} - {{$sekolah->kab_kota}} - {{$sekolah->kec}}</td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Kode Pos</b></td>
                            <td width="2%">:</td>
                            <td>{{$sekolah->kode_pos}}</td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Luas Tanah</b></td>
                            <td width="2%">:</td>
                            <td>{{$sekolah->luas_tanah}} M<sup>2</sup></td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Ruang Kelas</b></td>
                            <td width="2%">:</td>
                            <td>{{$sekolah->ruang_kelas}}</td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Laboratorium</b></td>
                            <td width="2%">:</td>
                            <td>{{$sekolah->lab}}</td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Perpustakaan</b></td>
                            <td width="2%">:</td>
                            <td>{{$sekolah->perpus}}</td>
                        </tr>
                    </tbody>
                </table>
                @endforeach
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
@endsection

@push('lib-js')
@endpush
@push('js')
    <script>
        $(function () {
            $('[name="provinsi"]').select2()
            $('[name="kab"]').select2()
            $('[name="kec"]').select2()
        });
    </script>
@endpush
