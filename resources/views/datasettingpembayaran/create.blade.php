{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('sub_header_action')
<div class="me-4">
    <!--begin::Menu-->
        <a href="{{ url('datasettingpembayaran') }}" class="btn btn-sm btn-flex btn-info fw-bolder">Kembali ke {{$testVariable3}}</a>
</div>
<button type="button" class="btn btn-sm btn-primary" name="btnSimpan" id="btnSimpan">Simpan Data</button>
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
                @foreach($siswa as $datasiswa)
                <table class="table table-hover">
                    <tbody>
                      <tr>
                        <td><b>NISN</b></td>
                        <td><input type="hidden" name="nisn" id="nisn" value="{{$datasiswa->nisn}}"/>{{$datasiswa->nisn}}</td>
                      </tr>
                      <tr>
                        <td><b>Nama Siswa</b></td>
                        <td>{{$datasiswa->nama}}</td>
                      </tr>
                      <tr>
                        <td><b>Kelompok Kelas</b></td>
                        <td>{{$datasiswa->kode_kelompok}}</td>
                      </tr>
                       <tr>
                        <td><b>Tahun Akademik</b></td>
                        <td>
                            <select name="tahunakademik" id="tahunakademik" class="form-select form-select-solid">
                                <option value="">Pilih Tahun Akademik...</option>
                                @foreach($datatahun as $tahun)
                                <option value="{{$tahun->idsettingtahun}}">{{$tahun->tahunakademik}}</option>
                                @endforeach
                            </select>
                        </td>
                      </tr>
                      <tr>
                        <td><b>Semester</b></td>
                        <td>
                            <select name="semester" id="semester" class="form-select form-select-solid">
                                <option value="">Pilih Semester...</option>
                                <option value="X1">Ganjil</option>
                                <option value="X2">Genap</option>
                            </select>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  @endforeach
                                
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
                            <div class="fs-6 text-gray-600">Setting rincian pembayaran siswa sesuai rincian biaya yang harus dibayar</div>
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
                                <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 29.25px;">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" checked="checked" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1">
                                    </div>
                                </th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 235.688px;">Komponen Biaya</th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 151.047px;">Besaran Biaya</th>
                                </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">
                            @foreach($databiaya as $biaya)
                            <tr class="odd">
                                <!--begin::Checkbox-->
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" checked="checked" name="id[]" value="{{$biaya->idkomponen}}">
                                    </div>
                                </td>
                                <!--end::Checkbox-->
                                <td class="d-flex align-items-center">{{$biaya->nama_komponen}}</td>
                                <td>Rp.{{number_format($biaya->besaran_biaya)}}</td>
                            </tr>                          
                            @endforeach                         
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        </div>
                    </form>

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
    <script>
        /*$(document).ready(function () {
        })*/
        $(function () {
            $('[name="kelas"]').select2()
            $('[name="tahunakademik"]').select2()
        })

    $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
            });

            $('#btnSimpan').click(function (e) {
                e.preventDefault();
                $(this).html('Memproses Data...');
                document.getElementById("btnSimpan").disabled = true;

                var nisn = $("#nisn").val();
                var tahunakademik = $("#tahunakademik").val();
                var semester = $("#semester").val();

                var arr=[];
                $("input:checkbox[name*=id]:checked").each(function(){
                     arr.push($(this).val());
                });

                for (var y=0; y<arr.length; y++)
                {
                    //console.log(arr[y]);
                    $.ajax({
                      data: {nisn: nisn, tahunakademik: tahunakademik, semester: semester, id: arr[y]},
                      url: "/datasettingpembayaran/store",
                      type: "POST",
                      dataType: 'json',
                      success: function (data) {
                          $('#kelasinput').trigger("reset");
                          document.getElementById("btnSimpan").disabled = false;
                          $('#btnSimpan').html('Simpan');
                          location.href = "/datasettingpembayaran/";
                          // console.log(data);
                      },
                      error: function (data) {
                          console.log('Error:', data);
                          $('#btnSimpan').html('Simpan');
                          document.getElementById("btnSimpan").disabled = false;
                      }
                  });
                }

                
            });
            
            
    </script>
@endpush