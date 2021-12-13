{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('sub_header_action')
<div class="me-4">
    <!--begin::Menu-->
        <a href="{{ url('datasettingsiswa') }}" class="btn btn-sm btn-flex btn-info fw-bolder">Kembali ke {{$testVariable3}}</a>
</div>
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
                    {{ $testVariable }}
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                </div>
                <!--end::Card toolbar-->
            </div>

            <form name="kelasinput" id="kelasinput" method="post">
            <div class="card-body pt-0">
                <table class="table table-hover">
                    <tbody>
                    	@forelse($kelas as $kls)
                      <tr>
                        <td width="15%"><b>Kelompok Kelas</b></td>
                        <td>{{$kls->kode_kelompok}}</td>
                      </tr>
                      <tr>
                        <td><b>Tahun Ajaran</b></td>
                        <td><label id="lbtahun">{{$kls->tahunakademik}} / {{$kls->semester}}</label></td>
                      </tr>
                      <tr>
                        <td><b>Wali Kelas</b></td>
                        <td><label id="lbwali">{{$kls->Nama}}</label></td>
                      </tr>
                      @empty
                      <tr>
                        <td width="15%"><b>Kelompok Kelas</b></td>
                        <td>-</td>
                      </tr>
                      <tr>
                        <td><b>Tahun Ajaran</b></td>
                        <td><label id="lbtahun">-</label></td>
                      </tr>
                      <tr>
                        <td><b>Wali Kelas</b></td>
                        <td><label id="lbwali">-</label></td>
                      </tr>
                      <tr>
                      @endforelse
                    </tbody>
                  </table>
                                
            </div>

        </div>
        <!--end::Card-->
        
        <br/>
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    {{ $testVariable2 }}
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
                            <h4 class="text-gray-800 fw-bolder">Data Siswa</h4>
                            <div class="fs-6 text-gray-600">Setting siswa berdasarkan kelompok kelas / rombongan belajar</div>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Notice-->
                
                <!--begin::Table-->
                <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_table_users" role="grid">
                            <!--begin::Table head-->
                            <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0" role="row">
                                <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1" aria-label="" style="">#</th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 5.25px;">NIS / NISN</th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 151.047px;">Nama Lengkap Siswa</th>
                                </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">
                            	@php $no=1; @endphp
                                @forelse($siswa as $datasiswa)
                                <tr class="odd">
                                <td>{{$no}}</td>
                                <td class="d-flex align-items-center">{{$datasiswa->nis}} / @if($datasiswa->nisn == '')-@else {{$datasiswa->nisn}} @endif</td>
                                <td>{{$datasiswa->nama_siswa}}</td>                                
                            </tr>
                            @empty
                                <tr class="odd">
                                    <td colspan="3">Belum ada data</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endforelse
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        </div>

            </div>

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