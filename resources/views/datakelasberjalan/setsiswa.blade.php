{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('sub_header_action')
<a href="{{ url('datajurusan') }}" class="btn btn-sm btn-primary">Kembali ke {{$testVariable}}</a>
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
                    Tambah {{ $testVariable }}
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
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Kode Kelas</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="" name="NIK" value = "X IPA 1 "/>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->

                                      <!--begin::Table-->
                                      <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="table-responsive"><table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_table_users" role="grid">
                                                  <!--begin::Table head-->
                                                  <thead>
                                                  <!--begin::Table row-->
                                                  <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0" role="row"><th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1" aria-label="



                      													" style="width: 29.25px;">
                                                          <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                              <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1">
                                                          </div>
                                                      </th><th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 235.688px;">NISN Siswa</th>
                                                      <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 151.047px;">Nama Siswa</th>
                                                      </tr>
                                                  <!--end::Table row-->
                                                  </thead>
                                                  <!--end::Table head-->
                                                  <!--begin::Table body-->
                                                  <tbody class="text-gray-600 fw-bold">

                                                  <tr class="odd">

                                                      <!--begin::Checkbox-->
                                                      <td>
                                                          <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                              <input class="form-check-input" type="checkbox" value="1">
                                                          </div>
                                                      </td>
                                                      <!--end::Checkbox-->
                                                      <!--begin::User=-->
                                                      <td class="d-flex align-items-center">

                                                          <!--begin::User details-->
                                                          <div class="d-flex flex-column">
                                                              <a href="apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">2188770</a>
                                                          </div>
                                                          <!--begin::User details-->
                                                      </td>
                                                      <!--end::User=-->

                                                      <!--begin::Last login=-->
                                                       <td>Ramadi Suhari</td>
                                                      <!--end::Last login=-->




                                                  </tr>
                                                  <tr class="odd">

                                                       <!--begin::Checkbox-->
                                                       <td>
                                                           <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                               <input class="form-check-input" type="checkbox" value="1">
                                                           </div>
                                                       </td>
                                                       <!--end::Checkbox-->
                                                       <!--begin::User=-->
                                                       <td class="d-flex align-items-center">

                                                           <!--begin::User details-->
                                                           <div class="d-flex flex-column">
                                                               <a href="apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">244211</a>
                                                           </div>
                                                           <!--begin::User details-->
                                                       </td>
                                                       <!--end::User=-->

                                                       <!--begin::Last login=-->
                                                      <!--begin::Last login=-->
                                                       <td>Anjas Putra</td>
                                                      <!--end::Last login=-->




                                                   </tr>

                                                  </tbody>
                                                  <!--end::Table body-->
                                              </table></div><div class="row"><div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start"></div><div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end"><div class="dataTables_paginate paging_simple_numbers" id="kt_table_users_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="kt_table_users_previous"><a href="#" aria-controls="kt_table_users" data-dt-idx="0" tabindex="0" class="page-link"><i class="previous"></i></a></li><li class="paginate_button page-item active"><a href="#" aria-controls="kt_table_users" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="kt_table_users" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="kt_table_users" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item next" id="kt_table_users_next"><a href="#" aria-controls="kt_table_users" data-dt-idx="4" tabindex="0" class="page-link"><i class="next"></i></a></li></ul></div></div></div></div>
                                      <!--end::Table-->
                                  </div>

 <div class="card-footer text-end">
                <button class="btn w-100 w-sm-auto btn-primary">
                    <span class="svg-icon svg-icon-white svg-icon-1"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"/>
                            <path d="M17,4 L6,4 C4.79111111,4 4,4.7 4,6 L4,18 C4,19.3 4.79111111,20 6,20 L18,20 C19.2,20 20,19.3 20,18 L20,7.20710678 C20,7.07449854 19.9473216,6.94732158 19.8535534,6.85355339 L17,4 Z M17,11 L7,11 L7,4 L17,4 L17,11 Z" fill="#000000" fill-rule="nonzero"/>
                            <rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="5" rx="0.5"/>
                        </g>
                    </svg></span>
                    Simpan</button>
            </div>
                              </div>
                              <!--end::Card-->
                          </div>
                    </div>
                    <!--end::Col-->



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
            $('[name="status"]').select2()
        })
    </script>
@endpush
