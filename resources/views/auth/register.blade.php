@extends('layouts.auth')

@section('content')
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Multi-steps-->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid stepper stepper-pills stepper-column" id="kt_create_account_stepper">
            <!--begin::Aside-->
            <div class="d-flex flex-column flex-lg-row-auto w-xl-500px bg-lighten shadow-sm">
                <!--begin::Wrapper-->
                <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-500px scroll-y">
                    <!--begin::Header-->
                    <div class="d-flex flex-row-fluid flex-column flex-center p-10 pt-lg-20">
                        <!--begin::Logo-->
                        <a href="{{ url('/') }}" class="mb-10 mb-lg-20">
                            <img alt="Logo" src="{{asset('theme2/media/logos/logo-2-dark.svg')}}" class="h-45px" />
                        </a>
                        <!--end::Logo-->
                        <!--begin::Nav-->
                        <div class="stepper-nav">
                            <!--begin::Step 1-->
                            <div class="stepper-item current" data-kt-stepper-element="nav">
                                <!--begin::Line-->
                                <div class="stepper-line w-40px"></div>
                                <!--end::Line-->
                                <!--begin::Icon-->
                                <div class="stepper-icon w-40px h-40px">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">1</span>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title">Tipe Akun</h3>
                                    <div class="stepper-desc fw-bold">Konfigurasi akun anda</div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Step 1-->
                            <!--begin::Step 2-->
                            <div class="stepper-item" data-kt-stepper-element="nav">
                                <!--begin::Line-->
                                <div class="stepper-line w-40px"></div>
                                <!--end::Line-->
                                <!--begin::Icon-->
                                <div class="stepper-icon w-40px h-40px">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">2</span>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title">Informasi Siswa</h3>
                                    <div class="stepper-desc fw-bold">Form Informasi Siswa</div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Step 2-->
                            <!--begin::Step 3-->
                            <div class="stepper-item" data-kt-stepper-element="nav">
                                <!--begin::Line-->
                                <div class="stepper-line w-40px"></div>
                                <!--end::Line-->
                                <!--begin::Icon-->
                                <div class="stepper-icon w-40px h-40px">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">3</span>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title">Informasi Sekolah</h3>
                                    <div class="stepper-desc fw-bold">Form pengisian sekolah siswa</div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Step 3-->
                            <!--begin::Step 4-->
                            <div class="stepper-item" data-kt-stepper-element="nav">
                                <!--begin::Line-->
                                <div class="stepper-line w-40px"></div>
                                <!--end::Line-->
                                <!--begin::Icon-->
                                <div class="stepper-icon w-40px h-40px">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">4</span>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title">Informasi Orang Tua</h3>
                                    <div class="stepper-desc fw-bold">Form informasi orang tua</div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Step 4-->
                            <!--begin::Step 5-->
                            <div class="stepper-item" data-kt-stepper-element="nav">
                                <!--begin::Line-->
                                <div class="stepper-line w-40px"></div>
                                <!--end::Line-->
                                <!--begin::Icon-->
                                <div class="stepper-icon w-40px h-40px">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">5</span>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title">Selesai</h3>
                                    <div class="stepper-desc fw-bold">Konfirmasi penyelsaian pendaftaran</div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Step 5-->
                        </div>
                        <!--end::Nav-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Illustration-->
                    <div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-150px min-h-lg-300px" style="background-image: url(theme2/media/illustrations/work.png)"></div>
                    <!--end::Illustration-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--begin::Aside-->
            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid py-10">
                <!--begin::Content-->
                <div class="d-flex flex-center flex-column flex-column-fluid">
                    <!--begin::Wrapper-->
                    <div class="w-lg-700px p-10 p-lg-15 mx-auto">
                        <!--begin::Form-->
                        <form class="my-auto pb-5" novalidate="novalidate" id="kt_create_account_form">
                            <!--begin::Step 1-->
                            <div class="current" data-kt-stepper-element="content">
                                <!--begin::Wrapper-->
                                <div class="w-100">
                                    <!--begin::Heading-->
                                    <div class="pb-10 pb-lg-15">
                                        <!--begin::Title-->
                                        <h2 class="fw-bolder d-flex align-items-center text-dark">Pilih Tipe Akun anda
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Billing is issued based on your selected account type"></i></h2>
                                        <!--end::Title-->
                                        <!--begin::Notice-->
                                        <div class="text-gray-400 fw-bold fs-6 mb-2">Sudah mendaftar sebagai siswa? <a href="{{ url('login') }}">Login disini</a>.</div>
                                        <div class="text-gray-400 fw-bold fs-6">Jika anda bingung untuk memilih silahkan baca informasinya di
                                            <a href="#" class="link-primary fw-bolder">Halaman Bantuan</a>.</div>
                                        <!--end::Notice-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                    <div class="fv-row">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <!--begin::Option-->
                                                <input type="radio" class="btn-check" name="account_type" value="siswa" checked="checked" id="kt_create_account_form_account_type_personal" />
                                                <label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center mb-10" for="kt_create_account_form_account_type_personal">
                                                    <!--begin::Svg Icon | path: icons/duotone/Interface/User.svg-->
                                                    <span class="svg-icon svg-icon-3x me-5">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path d="M17 6C17 8.76142 14.7614 11 12 11C9.23858 11 7 8.76142 7 6C7 3.23858 9.23858 1 12 1C14.7614 1 17 3.23858 17 6Z" fill="#121319" />
																<path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd" d="M18.818 14.1248C18.2016 13.4101 17.1428 13.4469 16.3149 13.9001C15.0338 14.6013 13.5635 15 12 15C10.4365 15 8.96618 14.6013 7.68505 13.9001C6.85717 13.4469 5.79841 13.4101 5.182 14.1248C3.82222 15.7014 3 17.7547 3 20V21C3 22.1045 3.89543 23 5 23H19C20.1046 23 21 22.1045 21 21V20C21 17.7547 20.1778 15.7014 18.818 14.1248Z" fill="#191213" />
															</svg>
														</span>
                                                    <!--end::Svg Icon-->
                                                    <!--begin::Info-->
                                                    <span class="d-block fw-bold text-start">
															<span class="text-dark fw-bolder d-block fs-4 mb-2">Siswa</span>
															<span class="text-gray-400 fw-bold fs-6">Pendaftaran khusus siswa baru di sekolah</span>
														</span>
                                                    <!--end::Info-->
                                                </label>
                                                <!--end::Option-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <!--begin::Option-->
                                                <input disabled type="radio" class="btn-check" name="account_type" value="corporate" id="kt_create_account_form_account_type_corporate" />
                                                <label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center" for="kt_create_account_form_account_type_corporate">
                                                    <!--begin::Svg Icon | path: icons/duotone/Interface/Briefcase.svg-->
                                                    <span class="svg-icon svg-icon-3x me-5">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path opacity="0.25" d="M2 10C2 8.34315 3.34315 7 5 7H19C20.6569 7 22 8.34315 22 10V19C22 20.6569 20.6569 22 19 22H5C3.34315 22 2 20.6569 2 19V10Z" fill="#12131A" />
																<path fill-rule="evenodd" clip-rule="evenodd" d="M9 4C8.44772 4 8 4.44772 8 5V8C8 8.55228 7.55228 9 7 9C6.44772 9 6 8.55228 6 8V5C6 3.34315 7.34315 2 9 2H15C16.6569 2 18 3.34315 18 5V8C18 8.55228 17.5523 9 17 9C16.4477 9 16 8.55228 16 8V5C16 4.44772 15.5523 4 15 4H9Z" fill="#12131A" />
															</svg>
														</span>
                                                    <!--end::Svg Icon-->
                                                    <!--begin::Info-->
                                                    <span class="d-block fw-bold text-start">
															<span class="text-dark fw-bolder d-block fs-4 mb-2">Guru</span>
															<span class="text-gray-400 fw-bold fs-6">Pendaftaran guru baru pada sekolah</span>
														</span>
                                                    <!--end::Info-->
                                                </label>
                                                <!--end::Option-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Step 1-->
                            <!--begin::Step 2-->
                            <div class="" data-kt-stepper-element="content">
                                <!--begin::Wrapper-->
                                <div class="w-100">
                                    <!--begin::Heading-->
                                    <div class="pb-10 pb-lg-15">
                                        <!--begin::Title-->
                                        <h2 class="fw-bolder text-dark">Informasi Siswa</h2>
                                        <!--end::Title-->
                                        <!--begin::Notice-->
                                        <div class="text-gray-400 fw-bold fs-6">Jika anda bingung untuk mengisi silahkan baca informasinya di
                                            <a href="#" class="link-primary fw-bolder">Halaman Bantuan</a>.</div>
                                        <!--end::Notice-->
                                    </div>
                                    <!--end::Heading-->

                                    <div class="mb-5 fv-row">
                                        <!--begin::Label-->
                                        <label class="form-label mb-3">Nama Lengkap Siswa</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-lg form-control-solid" name="nama_lengkap" placeholder="" value="" />
                                        <!--end::Input-->
                                    </div>

                                    <!--begin::Input group-->
                                    <div class="mb-5 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center form-label mb-3">Jenis Kelamin
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Pilih salah satu jenis kelamin anda"></i></label>
                                        <!--end::Label-->
                                        <!--begin::Row-->
                                        <div class="row mb-2" data-kt-buttons="true">
                                            <!--begin::Col-->
                                            <div class="col">
                                                <!--begin::Option-->
                                                <label class="btn btn-outline btn-outline-dashed btn-outline-default w-100 p-4">
                                                    <input type="radio" class="btn-check" name="account_team_size" value="1-1" />
                                                    <span class="fw-bolder fs-3">Laki-laki</span>
                                                </label>
                                                <!--end::Option-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col">
                                                <!--begin::Option-->
                                                <label class="btn btn-outline btn-outline-dashed btn-outline-default w-100 p-4 active">
                                                    <input type="radio" class="btn-check" name="account_team_size" checked="checked" value="2-10" />
                                                    <span class="fw-bolder fs-3">Perempuan</span>
                                                </label>
                                                <!--end::Option-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                        <!--end::Hint-->
                                    </div>
                                    <!--end::Input group-->

                                    <div class="mb-5 fv-row">
                                        <div class="row">
                                            <div class="col">
                                                <!--begin::Label-->
                                                <label class="form-label mb-3">Tempat Lahir</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-lg form-control-solid" name="tempat_lengkap" placeholder="" value="" />
                                                <!--end::Input-->
                                            </div>
                                            <div class="col">
                                                <!--begin::Label-->
                                                <label class="form-label mb-3">Tanggal Lahir</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-lg form-control-solid datepicker" name="tanggal_lahir" placeholder="Pilih Tanggal" />
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-5 fv-row">
                                        <label class="form-label mb-3">Alamat</label>
                                        <input type="text" class="form-control form-control-lg form-control-solid" name="alamat" placeholder="" value="" />
                                    </div>

                                    <div class="mb-5 fv-row">
                                        <label class="form-label mb-3">Agama</label>
                                        <select class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select..." data-allow-clear="true" data-hide-search="true">
                                            <option></option>
                                            <option value="1">Islam</option>
                                            <option value="1">Kristen</option>
                                            <option value="2">Budha</option>
                                            <option value="3">Hindu</option>
                                            <option value="4">Katholik</option>
                                        </select>
                                    </div>

                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Step 2-->
                            <!--begin::Step 3-->
                            <div class="" data-kt-stepper-element="content">
                                <!--begin::Wrapper-->
                                <div class="w-100">
                                    <!--begin::Heading-->
                                    <div class="pb-10 pb-lg-12">
                                        <!--begin::Title-->
                                        <h2 class="fw-bolder text-dark">Informasi Sekolah</h2>
                                        <!--end::Title-->
                                        <!--begin::Notice-->
                                        <div class="text-gray-400 fw-bold fs-6">Jika anda bingung untuk mengisi silahkan baca informasinya di
                                            <a href="#" class="link-primary fw-bolder">Halaman Bantuan</a>.</div>
                                        <!--end::Notice-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label required">Asal Sekolah</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="" class="form-control form-control-lg form-control-solid" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center form-label">
                                            <span class="required">Tahun Lulus</span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="business_descriptor" class="form-control form-control-lg form-control-solid" value="{{ now()->format('Y') }}" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label required">Jurusan yang diinginkan</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select name="" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select..." data-allow-clear="true" data-hide-search="true">
                                            <option></option>
                                            <option value="1">IPA</option>
                                            <option value="1">IPS</option>
                                        </select>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-10">
                                        <!--end::Label-->
                                        <label class="form-label">Alasan memilih sekolah kami</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <textarea class="form-control form-control-lg form-control-solid" rows="3"></textarea>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-0">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold form-label required">Email yang bisa dihubungi</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control form-control-lg form-control-solid" value="bantuan@sekula.ac.id" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Step 3-->
                            <!--begin::Step 4-->
                            <div class="" data-kt-stepper-element="content">
                                <!--begin::Wrapper-->
                                <div class="w-100">
                                    <!--begin::Heading-->
                                    <div class="pb-10 pb-lg-15">
                                        <!--begin::Title-->
                                        <h2 class="fw-bolder text-dark">Informasi Orang Tua</h2>
                                        <!--end::Title-->
                                        <!--begin::Notice-->
                                        <div class="text-gray-400 fw-bold fs-6">Jika anda bingung untuk mengisi silahkan baca informasinya di
                                            <a href="#" class="link-primary fw-bolder">Halaman Bantuan</a>.</div>
                                        <!--end::Notice-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-7 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Nama Ibu</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan nama ibu"></i>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" class="form-control form-control-solid" placeholder="" />
                                    </div>

                                    <div class="mb-7 fv-row">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!--begin::Label-->
                                                <label class="form-label mb-3">Pekerjaan Ibu</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-lg form-control-solid" name="tempat_lengkap" placeholder="Ibu Rumah Tangga" value="" />
                                                <!--end::Input-->
                                            </div>
                                            <div class="col-md-6">
                                                <!--begin::Label-->
                                                <label class="form-label mb-3">Pendapatan Ibu</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="number" class="form-control form-control-lg form-control-solid" />
                                                <div class="form-text">Biarkan kosong apabila tidak bekerja</div>
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column mb-7 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Nama Ayah</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan nama ibu"></i>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" class="form-control form-control-solid" placeholder="" />
                                    </div>

                                    <div class="mb-7 fv-row">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!--begin::Label-->
                                                <label class="form-label mb-3">Pekerjaan Ayah</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-lg form-control-solid" name="tempat_lengkap" placeholder="Pegawai Negeri Sipil" value="" />
                                                <!--end::Input-->
                                            </div>
                                            <div class="col-md-6">
                                                <!--begin::Label-->
                                                <label class="form-label mb-3">Pendapatan Ayah</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="number" class="form-control form-control-lg form-control-solid" />
                                                <div class="form-text">Biarkan kosong apabila tidak bekerja</div>
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="fv-row mb-7">
                                        <!--end::Label-->
                                        <label class="form-label">Alamat Orang Tua</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <textarea class="form-control form-control-lg form-control-solid" rows="3"></textarea>
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Step 4-->
                            <!--begin::Step 5-->
                            <div class="" data-kt-stepper-element="content">
                                <!--begin::Wrapper-->
                                <div class="w-100">
                                    <!--begin::Heading-->
                                    <div class="pb-8 pb-lg-10">
                                        <!--begin::Title-->
                                        <h2 class="fw-bolder text-dark">Selangkah lagi kamu selesai!</h2>
                                        <!--end::Title-->
                                        <!--begin::Notice-->
                                        <div class="text-gray-400 fw-bold fs-6">Silahkan konfirmasi menyelsaikan form anda.</div>
                                        <!--end::Notice-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Body-->
                                    <div class="mb-0">
                                        <!--begin::Text-->
                                        <div class="fs-6 text-gray-600 mb-5">Setelah kamu menekan tombol selesai, maka form yang telah diisi akan disubmit ke sistem dan anda akan mendapatkan email konfirmasi akun untuk melakukan<a href="authentication/sign-in/basic.html" class="link-primary fw-bolder">Login</a>.</div>
                                        <!--end::Text-->
                                        <!--begin::Alert-->
                                        <!--begin::Notice-->
                                        <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
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
                                                    <h4 class="text-gray-800 fw-bolder">Kami menghargai privasi anda!</h4>
                                                    <div class="fs-6 text-gray-600">Seluruh data yang anda isikan ke sistem senantiasa kami akan jaga agar tidak terjadi kebocoran ke publik</div>
                                                </div>
                                                <!--end::Content-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Notice-->
                                        <!--end::Alert-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Step 5-->
                            <!--begin::Actions-->
                            <div class="d-flex flex-stack pt-15">
                                <div class="mr-2">
                                    <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Left-2.svg-->
                                        <span class="svg-icon svg-icon-4 me-1">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24" />
													<rect fill="#000000" opacity="0.3" transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000)" x="14" y="7" width="2" height="10" rx="1" />
													<path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997)" />
												</g>
											</svg>
										</span>
                                        <!--end::Svg Icon-->Sebelumnya</button>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="submit">
											<span class="indicator-label">Selesai
                                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Right-2.svg-->
											<span class="svg-icon svg-icon-4 ms-2">
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<polygon points="0 0 24 0 24 24 0 24" />
														<rect fill="#000000" opacity="0.5" transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000)" x="7.5" y="7.5" width="2" height="9" rx="1" />
														<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
													</g>
												</svg>
											</span>
                                                <!--end::Svg Icon--></span>
                                        <span class="indicator-progress">Tunggu sebentar...
											<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                    <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">Selanjutnya
                                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Right-2.svg-->
                                        <span class="svg-icon svg-icon-4 ms-1">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24" />
													<rect fill="#000000" opacity="0.5" transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000)" x="7.5" y="7.5" width="2" height="9" rx="1" />
													<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
												</g>
											</svg>
										</span>
                                        <!--end::Svg Icon--></button>
                                </div>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Content-->
                <!--begin::Footer-->
                <div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
                    <!--begin::Links-->
                    <div class="d-flex flex-center fw-bold fs-6">
                        <a href="https://keenthemes.com/faqs" class="text-muted text-hover-primary px-2" target="_blank">Tentang Kami</a>
                        <a href="https://keenthemes.com/support" class="text-muted text-hover-primary px-2" target="_blank">QnA</a>
                        <a href="https://1.envato.market/EA4JP" class="text-muted text-hover-primary px-2" target="_blank">Help</a>
                    </div>
                    <!--end::Links-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Authentication - Multi-steps-->
    </div>
@endsection

@push('js')
@endpush
