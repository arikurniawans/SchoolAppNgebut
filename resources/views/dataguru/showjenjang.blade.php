{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('sub_header_action')
<!--begin::Button-->
<a href="/dataguru" class="btn btn-sm btn-info">Kembali ke Data Guru</a>&nbsp;&nbsp;
<a href="javascript:void(0);" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">Tambah {{$testVariable}}</a>
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
                    Data {{ $testVariable }}
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex align-items-center position-relative my-1" data-kt-user-table-toolbar="base">
                        <!-- <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                    <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"></path>
                                </g>
                            </svg>
                        </span>
                        <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Cari {{ $testVariable }}.."> -->
                        <!--end::Add user-->
                    </div>
                    <!--end::Toolbar-->
                    <!--begin::Group actions-->
                    <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                        <div class="fw-bolder me-5">
                        <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected</div>
                        <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
                    </div>
                </div>
                <!--end::Card toolbar-->
            </div>

            <div class="card-body pt-0">
                <!--begin::Table-->
                <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_table_users" role="grid">
                            <thead>
                                <tr>
                                    <th width="50" style="text-align:center;">No</th>
                                    <th>Jenjang Pendidikan</th>
                                    <th>Perguruan Tinggi</th>
                                    <th>Program Studi</th>
                                    <th>Tahun Masuk</th>
                                    <th>Tahun Keluar</th>
                                    <th>IPK</th>
                                    <th width="100px">Action</th>
                                </tr>
                            </thead>
                            
                            <tbody class="text-gray-600 fw-bold">
                                @php $no=1; @endphp
                                @forelse($datajenjang as $data)
                            <tr class="odd">
                                <td>{{$no++}}</td>
                                <td>{{$data->Jenjang}}</td>
                                <td>{{$data->Asalperguruantinggi}}</td>
                                <td>{{$data->Prodi}}</td>
                                <td>{{$data->Tahunmasuk}}</td>
                                <td>{{$data->Tahunkeluar}}</td>
                                <td>{{$data->Ipk}}</td>
                                <td class="text-end">
                                    <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">Actions
                                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-down.svg-->
                                        <span class="svg-icon svg-icon-5 m-0">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                    <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
                                                                </g>
                                                            </svg>
                                                        </span>
                                        <!--end::Svg Icon--></a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="javascript:void(0);" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_card{{$data->id}}">Edit</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="/dataguru/hapuspendidikan/{{$data->id}}" class="menu-link px-3" data-kt-users-table-filter="delete_row">Delete</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </td>
                                <!--end::Action=-->
                            </tr>

                            <!--begin::Modal - New Card-->
                            <div class="modal fade" id="kt_modal_edit_card{{$data->id}}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered mw-650px">
                                <div class="modal-content">
                                <div class="modal-header">
                                <h2>Ubah Jenjang Pendidikan</h2>
                                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                        </svg>
                                    </span>
                                                                                <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Close-->
                                    </div>
                                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                                <form name="kelasinput" id="kelasinput" method="post" action="/dataguru/updatependidikan">
                                    {{ csrf_field() }}
                                    <div class="row mb-5">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Label-->
                                            <input type="hidden" name="idguru" value="{{$idguru}}"/>
                                            <input type="hidden" name="idjenjang" value="{{$data->id}}"/>
                                            <label class="required fs-5 fw-bold mb-2">Jenjang Pendidikan</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                             <select name="jenjang" class="form-select form-select-solid" id="jenjang">
                                                <option value="">Pilih Jenjang Pendidikan...</option>
                                                <option value="{{$data->Jenjang}}" selected>{{strtoupper($data->Jenjang)}}</option>
                                                <option value="s1">S1</option>
                                                <option value="s2">S2</option>
                                                <option value="s3">S3</option>
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--end::Label-->
                                            <label class="required fs-5 fw-bold mb-2">Asal Perguruan Tinggi</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                             <input type="text" name="kampus" class="form-control" placeholder="" value="{{$data->Asalperguruantinggi}}"/>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-bold mb-2">Program Studi</label>
                                            <input type="text" name="prodi" class="form-control" placeholder="" value="{{$data->Prodi}}"/>
                                        </div>
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-bold mb-2">Tahun Masuk</label>
                                            <input type="text" name="tahunmasuk" class="form-control" placeholder="" value="{{$data->Tahunmasuk}}"/>
                                        </div>
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-bold mb-2">Tahun Keluar</label>
                                            <input type="text" name="tahunkeluar" class="form-control" placeholder="" value="{{$data->Tahunkeluar}}"/>
                                        </div>
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-bold mb-2">IPK</label>
                                            <input type="text" name="ipk" class="form-control" placeholder="" value="{{$data->Ipk}}"/>
                                        </div>

                                    </div>

                                <div class="text-center">
                                    <button type="reset" id="kt_modal_new_target_cancel" data-bs-dismiss="modal" class="btn btn-light me-3">Batal</button>
                                    <button type="submit" class="btn btn-primary" id="saveBtn">Simpan Perubahan Data</button>
                                </div>
                            </form>
                                                           
                                </div>
                                <!--end::Modal body-->
                                </div>
                                <!--end::Modal content-->
                                </div>
                                <!--end::Modal dialog-->
                            </div>
                            <!--end::Modal - New Card-->
                            @empty
                               <tr class="odd" align="center">
                                    <td colspan="6">Belum ada data</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
                <!--end::Table-->
            </div>


        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->

<!--begin::Modal - New Card-->
<div class="modal fade" id="kt_modal_new_card" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
    <div class="modal-content">
    <div class="modal-header">
    <h2>Tambah Jenjang Pendidikan</h2>
    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
        <span class="svg-icon svg-icon-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
            </svg>
        </span>
                                                    <!--end::Svg Icon-->
        </div>
        <!--end::Close-->
        </div>
    <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
    <form name="kelasinput" id="kelasinput" method="post" action="/dataguru/storependidikan">
        {{ csrf_field() }}
        <div class="row mb-5">
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <!--begin::Label-->
                            <input type="hidden" name="idguru" value="{{$idguru}}"/>
                            <label class="required fs-5 fw-bold mb-2">Jenjang Pendidikan</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                             <select name="jenjang" class="form-select form-select-solid" id="jenjang">
                                <option value="">Pilih Jenjang Pendidikan...</option>
                                <option value="s1">S1</option>
                                <option value="s2">S2</option>
                                <option value="s3">S3</option>
                            </select>
                            <!--end::Input-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <!--end::Label-->
                            <label class="required fs-5 fw-bold mb-2">Asal Perguruan Tinggi</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                             <input type="text" name="kampus" class="form-control" placeholder=""/>
                            <!--end::Input-->
                        </div>
                        <!--end::Col-->
                        <div class="col-md-6 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-bold mb-2">Program Studi</label>
                            <input type="text" name="prodi" class="form-control" placeholder=""/>
                        </div>
                        <div class="col-md-6 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-bold mb-2">Tahun Masuk</label>
                            <input type="text" name="tahunmasuk" class="form-control" placeholder=""/>
                        </div>
                        <div class="col-md-6 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-bold mb-2">Tahun Keluar</label>
                            <input type="text" name="tahunkeluar" class="form-control" placeholder=""/>
                        </div>
                        <div class="col-md-6 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-bold mb-2">IPK</label>
                            <input type="text" name="ipk" class="form-control" placeholder=""/>
                        </div>

                    </div>

    <div class="text-center">
        <button type="reset" id="kt_modal_new_target_cancel" data-bs-dismiss="modal" class="btn btn-light me-3">Batal</button>
        <button type="submit" class="btn btn-primary" id="saveBtn">Simpan Data</button>
    </div>
</form>
                               
    </div>
    <!--end::Modal body-->
    </div>
    <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - New Card-->

</div>
@endsection

@push('lib-js')
@push('lib-js')
@endpush
@push('js')
@endpush
