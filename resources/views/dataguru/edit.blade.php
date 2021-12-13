{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('sub_header_action')
<a href="{{ url('dataguru') }}" class="btn btn-sm btn-primary">Kembali ke {{$testVariable}}</a>&nbsp;&nbsp;
<a href="{{ url('dataguru/showkeluarga') }}/{{$editkeluarga}}" class="btn btn-sm btn-info">Edit Data Keluarga</a>&nbsp;&nbsp;
<a href="{{ url('dataguru/showpendidikan') }}/{{$editjenjang}}" class="btn btn-sm btn-info">Edit Jenjang Pendidikan</a>&nbsp;&nbsp;
<a href="{{ url('dataguru/showmapel') }}/{{$editmapel}}" class="btn btn-sm btn-info">Edit Mapel Ampu</a>&nbsp;&nbsp;
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
                    Ubah {{ $testVariable }}
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
                <form action="/dataguru/update" method="post">
                        {{ csrf_field() }}
                @foreach($dataguru as $guru)
                <div class="row mb-5">
                    
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="fs-5 fw-bold mb-2">Nomor Induk Pegawai</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="hidden" value="{{$guru->id}}" name="id"/>
                        <input type="text" class="form-control form-control-solid" placeholder="" name="nip" id="nip" value="{{$guru->Nip}}"/>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="fs-5 fw-bold mb-2">Nomor Induk Kependudukan</label>
                        <!--end::Label-->
                        <!--end::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="" name="nik" id="nik" value="{{$guru->Nik}}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Nama Lengkap</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="" name="nama_lengkap" id="nama_lengkap" value="{{$guru->Nama}}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Agama</label>
                        <!--end::Label-->
                        <!--begin::Select-->
                        <select name="agama" class="form-select form-select-solid" id="agama">
                            <option value="">Silahkan Pilih Agama...</option>
                            <option value="{{$guru->Agama}}" selected>{{$guru->Agama}}</option>
                            <option value="Islam">Islam</option>
                            <option value="Protestan">Protestan</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                        </select>
                        <!--end::Select-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Tempat Lahir</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="" name="tempatlahir" id="tempatlahir" value="{{$guru->Tempatlahir}}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Tanggal Lahir</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                         <input type="date" class="form-control form-control-solid" placeholder="" name="tanggallahir" id="tanggallahir" value="{{$guru->Tanggallahir}}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Jenis Kelamin</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select name="jenkel" class="form-select form-select-solid" id="jenkel">
                            <option value="">Silahkan Pilih Jenis Kelamin...</option>
                            <option value="{{$guru->Jeniskelamin}}" selected>@if($guru->Jeniskelamin == 'L') Laki-laki @elseif($guru->Jeniskelamin == 'P') Perempuan @endif</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Alamat Tinggal</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <textarea class="form-control form-control-solid" name="alamat" id="alamat">{{$guru->Alamat}}</textarea>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">No. Telepon / Handphone</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="number" class="form-control form-control-solid" placeholder="" name="notelp" id="notelp" value="{{$guru->NoHp}}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Email</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                         <input type="email" class="form-control form-control-solid" placeholder="" name="email" id="email" value="{{$guru->Email}}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Jabatan</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="" name="jabatan" id="jabatan" value="{{$guru->Jabatan}}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Pangkat</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                         <input type="text" class="form-control form-control-solid" placeholder="" name="pangkat" id="pangkat" value="{{$guru->Pangkat}}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Golongan</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="" name="golongan" id="golongan" value="{{$guru->Golongan}}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">NUPTK</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                         <input type="number" class="form-control form-control-solid" placeholder="" name="nuptk" id="nuptk" value="{{$guru->NUPTK}}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Status Marital</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select name="status_marital" class="form-select form-select-solid" id="status_marital">
                            <option value="">Silahkan Pilih Status Marital...</option>
                            <option value="{{$guru->StatusMenikah}}" selected>@if($guru->StatusMenikah == 'BM') Belum Menikah @elseif($guru->StatusMenikah == 'M') Menikah @elseif($guru->StatusMenikah == 'C') Cerai @endif</option>
                            <option value="BM">Belum Menikah</option>
                            <option value="M">Menikah</option>
                            <option value="C">Cerai</option>
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Golongan Darah</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select name="gol_darah" class="form-select form-select-solid" id="gol_darah">
                            <option value="">Silahkan Pilih Golongan Darah...</option>
                            <option value="{{$guru->Goldarah}}" selected>{{$guru->Goldarah}}</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Gelar Depan</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="" name="gelar_depan" id="gelar_depan" value="{{$guru->Gelardepan}}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Gelar Belakang</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                         <input type="text" class="form-control form-control-solid" placeholder="" name="gelar_belakang" id="gelar_belakang" value="{{$guru->Gelarbelakang}}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">TMT (Terhitung Mulai Tanggal)</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="date" class="form-control form-control-solid" placeholder="" name="tmt" id="tmt" value="{{$guru->Tahunmasuk}}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Tugas Tambahan</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                         <input type="text" class="form-control form-control-solid" placeholder="" name="tugas" id="tugas" value="{{$guru->Jabatansekolah}}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">NIY / NIGK</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="" name="niy" id="niy" value="{{$guru->Niy}}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Status Guru</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select name="status_guru" class="form-select form-select-solid" id="status_guru">
                            <option value="">Silahkan Pilih Status Guru...</option>
                            <option value="{{$guru->status_guru}}">{{$guru->status_guru}}</option>
                            <option value="GTT">GTT (Guru  Tidak  Tetap) / PTT (Pegawai  Tidak  Tetap)</option>
                            <option value="gty">GTY (Guru Tetap Yayasan) / PTY (Pegawai Tetap Yayasan)</option>
                            <!-- <option value="Honorer">Honorer</option>
                            <option value="PNS">PNS (Pegawai Negeri Sipil)</option> -->
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Balas Bakti 15 Tahun</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="date" class="form-control form-control-solid" placeholder="" name="bakti_15" id="bakti_15" value="{{$guru->balas_bakti_15_tahun}}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Balas Bakti 25 Tahun</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                         <input type="date" class="form-control form-control-solid" placeholder="" name="bakti_25" id="bakti_25" value="{{$guru->balas_bakti_25_tahun}}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Pensiun 55 tahun</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="date" class="form-control form-control-solid" placeholder="" name="pensiun" id="pensiun" value="{{$guru->pensiun_55_tahun}}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Masa Perpanjangan Pertama</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                         <input type="date" class="form-control form-control-solid" placeholder="" name="perpanjangan_pertama" id="perpanjangan_pertama" value="{{$guru->masa_perpanjangan_1}}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Masa Perpanjangan Kedua</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="date" class="form-control form-control-solid" placeholder="" name="perpanjangan_kedua" id="perpanjangan_kedua" value="{{$guru->masa_perpanjangan_2}}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Masa Perpanjangan Ketiga</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                         <input type="date" class="form-control form-control-solid" placeholder="" name="perpanjangan_ketiga" id="perpanjangan_ketiga" value="{{$guru->masa_perpanjangan_3}}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Sertifikasi</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select name="sertifikasi" class="form-select form-select-solid" id="sertifikasi">
                            <option value="">Silahkan Pilih Status Guru...</option>
                            <option value="{{$guru->sertifikasi}}" selected>{{ ucwords($guru->sertifikasi)}}</option>
                            <option value="belum">Belum</option>
                            <option value="sudah">Sudah</option>
                             <option value="proses">Sedang Dalam Proses</option>
                        </select>
                        <!--end::Input
                    </div>
                    <!--end::Col-->
                </div>
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
                    Simpan Perubahan Data</button>
            </div>
            @endforeach

        </form>

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
