{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('sub_header_action')
<form method="post" action="/datapembayaranspp/simpanvalidasi">
    {{ csrf_field() }}
<div class="me-4">
    <!--begin::Menu-->
        <a href="{{ url('datapembayaranspp') }}" class="btn btn-sm btn-flex btn-info fw-bolder">Kembali ke {{ $testVariable3 }}</a>
        <button type="submit" id="btnSave" class="btn btn-sm btn-primary">Simpan Validasi</button>
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

            <div class="card-body pt-0">
                @php $arrnisn=[]; @endphp
                @foreach($datasiswa as $siswa)
                @php array_push($arrnisn, $siswa->nisn) @endphp
                <table class="table table-hover">
                    <tbody>
                      <tr>
                        <td><b>NISN</b></td>
                        <td>{{$siswa->nisn}} <input type="hidden" name="nisn" value="{{$siswa->nisn}}"/></td>
                      </tr>
                      <tr>
                        <td><b>Nama Siswa</b></td>
                        <td>{{$siswa->nama}}</td>
                      </tr>
                      <tr>
                        <td><b>Kelompok Kelas</b></td>
                        <td>{{$siswa->kode_kelompok}}</td>
                      </tr>
                      <tr>
                        <td><b>Tahun Akademik</b></td>
                        <td>{{$siswa->tahunakademik}}</td>
                      </tr>
                      <tr>
                        <td><b>Semester</b></td>
                        <td>{{$siswa->semester}}</td>
                      </tr>
                    </tbody>
                    @endforeach
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
                            <h4 class="text-gray-800 fw-bolder">Rincian Pembayaran</h4>
                            <div class="fs-6 text-gray-600">Daftar rincian pembayaran siswa sesuai rincian biaya yang harus dibayar</div>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Notice-->
                
                <!--begin::Table-->
                <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_table_users" role="grid">
                            <!--begin::Table head-->
                            <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0" role="row">
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 235.688px;">Komponen Biaya</th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 151.047px;">Besaran Biaya</th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 151.047px;">Status</th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 151.047px;">Keterangan</th>
                                </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">
                            @php $no=1; @endphp
                            @foreach($datarincian as $rincian)
                            <tr class="odd">
                                <td class="d-flex align-items-center">{{$rincian->nama_komponen}}<input type="hidden" name="idkomp[]" value="{{$rincian->idkomponenbiaya}}"/> </td>
                                <td>Rp.{{ number_format($rincian->besaran_biaya)}}</td>
                                <td>@if($rincian->status == 'BL')
                                        <span class="badge badge-light-danger fw-bolder fs-8 px-2 py-1 ms-2">Belum Lunas</span>
                                    @elseif($rincian->status == 'V')
                                        <span class="badge badge-light-info fw-bolder fs-8 px-2 py-1 ms-2">Menunggu Validasi</span>
                                    @elseif($rincian->status == 'A')
                                        <span class="badge badge-light-warning fw-bolder fs-8 px-2 py-1 ms-2">Angsur</span>
                                    @elseif($rincian->status == 'L')
                                        <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Lunas</span>
                                    @endif
                                </td>
                                <td>
                                    <select name="keterangan[]" id="keterangan[]" class="form-select form-select-solid">
                                        <option value="BL">Pilih Keterangan...</option>
                                        <option value="L">Lunas</option>
                                        <option value="BL">Belum Lunas</option>
                                        <option value="A">Angsur</option>
                                    </select>
                                </td>                                
                                </tr>
                            @endforeach
                            
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
</form>
@endsection

@push('lib-js')
@endpush
@push('js')
    <script>
        /*$(document).ready(function () {
        })*/
        $(function () {
            $('[name="keterangan"]').select2()
            $('[name="kelas"]').select2()
            $('[name="tahunakademik"]').select2()
            $('[name="guru"]').select2()
        })

    //     $.ajaxSetup({
    //               headers: {
    //                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //               }
    //         });

    //         $('#btnSave').click(function (e) {
    //             e.preventDefault();
    //             $(this).html('Memproses Data...');
    //             var id = []; 

    //             var selectedValues = [];    
    // $("#keterangan :selected").each(function(){
    //     selectedValues.push($('#keterangan').val()); 
    //     console.log(selectedValues);
    // });

    </script>
@endpush