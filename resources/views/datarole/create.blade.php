{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('sub_header_action')
<form name="kelasinput" id="kelasinput" method="post" action="/datarole/store">
  {{ csrf_field() }}
<div class="me-4">
    <!--begin::Menu-->
        <a href="{{ url('datarole') }}" class="btn btn-sm btn-flex btn-info fw-bolder">Kembali ke {{$testVariable3}}</a>
</div>
<button type="submit" class="btn btn-sm btn-primary" name="btnSimpan" id="btnSimpan">Simpan Data</button>
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
               <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Pengguna</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                         <select class="form-control form-control-solid" name="pengguna" id="pengguna">
                            <option value="" selected>Pilih Pengguna</option>
                            @foreach($pengguna as $user)
                            <option value="{{$user->id}}">({{$user->Nip}}) - {{$user->Nama}}</option>
                            @endforeach
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Role Deskripsi</label>
                        <!--end::Label-->
                        <!--end::Input-->
                         <select class="form-control form-control-solid" name="akses" id="akses">
                            <option value="" selected>Pilih Role Deskripsi</option>
                            @foreach($dataakses as $akses)
                            <option value="{{$akses->idhakakses}}">{{$akses->nama_akses}}</option>
                            @endforeach
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>
                                
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
                            <h4 class="text-gray-800 fw-bolder">Tabel Fitur</h4>
                            <div class="fs-6 text-gray-600">Setting fitur aplikasi sesuai hak akses dan role pengguna</div>
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
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 235.688px;">Nama Fitur</th>
                                </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">
                            @foreach($datafitur as $fitur)
                            <tr class="odd">
                                <!--begin::Checkbox-->
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" checked="checked" name="id[]" value="{{$fitur->idfitur}}">
                                    </div>
                                </td>
                                <!--end::Checkbox-->
                                <td class="d-flex align-items-center">{{$fitur->nama_fitur}}</td>
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
            $('[name="pengguna"]').select2()
            $('[name="akses"]').select2()
        })

    $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
            });

            // $('#btnSimpan').click(function (e) {
            //     e.preventDefault();
            //     $(this).html('Memproses Data...');
            //     //document.getElementById("btnSimpan").disabled = true;

            //     var pengguna = $("#pengguna").val();
            //     var akses = $("#akses").val();

            //     var arr=[];
            //     $("input:checkbox[name*=id]:checked").each(function(){
            //          //arr.push($(this).val());
            //          arr.push({
            //             'cek': $(this).val(),
            //             'pub': 'Y'
            //          });
            //     });

                // for (var y=0; y<arr.length; y++)
                // {
                //   //console.log(arr[y].cek);
                //     $.ajax({
                //       data: {pengguna: pengguna, akses: akses, fitur: arr[y].cek, status:arr[y].pub},
                //       url: "/datarole/store",
                //       type: "POST",
                //       dataType: 'json',
                //       success: function (data) {
                //           $('#kelasinput').trigger("reset");
                //           document.getElementById("btnSimpan").disabled = false;
                //           $('#btnSimpan').html('Simpan');
                //           location.href = "/datarole/";
                //           // console.log(data);
                //       },
                //       error: function (data) {
                //           console.log('Error:', data);
                //           $('#btnSimpan').html('Simpan');
                //           document.getElementById("btnSimpan").disabled = false;
                //       }
                //   });
                // }

                

                
            // });
            
            
    </script>
@endpush