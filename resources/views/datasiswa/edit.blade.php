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
                <form name="kelasinput" id="kelasinput" method="post">
                	@foreach($datasiswa as $siswa)
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">NIS</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="hidden" name="id" id="id" value="{{$siswa->idsiswa}}"/>
                        <input type="text" class="form-control form-control-solid" placeholder="" name="nis" required id="nis" autocomplete="off" value="{{$siswa->nis}}"/>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">NISN</label>
                        <!--end::Label-->
                        <!--end::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="" name="nisn" required id="nisn" autocomplete="off" value="{{$siswa->nisn}}"/>
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
                        <input type="text" class="form-control form-control-solid" placeholder="" name="nama" required id="nama" autocomplete="off" value="{{$siswa->nama_siswa}}"/>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Jenis Kelamin</label>
                        <!--end::Label-->
                         <!--begin::Select-->
                        <select name="jeniskelamin" class="form-select form-select-solid"required id="jeniskelamin">
                        <option value="">Silahkan Pilih Jenis Kelamin...</option>
                        <option value="{{$siswa->jenkel}}" selected>@if($siswa->jenkel == 'l') Laki-laki @elseif($siswa->jenkel =='p') Perempuan @endif</option>
                        <option value="l">Pria</option>
                        <option value="p">Perempuan</option>
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
                        <input type="text" class="form-control form-control-solid" placeholder="" name="tempatlahir" required id="tempatlahir" autocomplete="off" value="{{$siswa->tempat_lahir}}"/>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Tanggal Lahir</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                         <input type="date" class="form-control form-control-solid" placeholder="" name="tanggallahir" value="{{$siswa->tgl_lahir}}" required id="tanggallahir" autocomplete="off"/>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-5">                    
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Agama</label>
                        <!--end::Label-->
                        <!--begin::Select-->
                        <select name="agama" class="form-select form-select-solid"required id="agama">
                        <option value="">Silahkan Pilih Agama...</option>
                        <option value="{{$siswa->agama}}" selected>{{$siswa->agama}}</option>
                        <option value="Islam">Islam</option>
                        <option value="Protestan">Protestan</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        </select>
                        <!--end::Select-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Nama Ayah</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="" name="nama_ayah" value="{{$siswa->nama_ayah}}" required id="nama_ayah" autocomplete="off"/>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>                
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Nama Ibu</label>
                        <!--end::Label-->
                        <!--end::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="" name="nama_ibu" required id="nama_ibu" value="{{$siswa->nama_ibu}}" autocomplete="off"/>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Alamat</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="" name="alamat" required id="alamat" value="{{$siswa->alamat}}" autocomplete="off"/>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->  
                </div>
                <fieldset>
                <legend><div style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: left">
                      <span style="font-size: 20px; background-color: #F3F5F6; padding: 0 10px;">
                        Data Ijazah :
                      </span>
                    </div></legend><br/><br/>
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Tahun Ijazah</label>
                        <!--end::Label-->
                        <!--end::Input-->
                        <select name="tahun" id="tahun" required class="form-select form-select-solid">
                               <option value="">Silahkan Pilih Tahun Ijazah...</option>
                               <option value="{{$siswa->ijazah_tahun}}" selected>{{$siswa->ijazah_tahun}}</option>
                               {{ $thn = date('Y') }}
                               @for($a=2015; $a<=$thn; $a++)
                                    <option value="{{ $a }}">{{ $a }}</option>
                               @endfor
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Nopes UN SMP</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="" name="nopes" required id="nopes" value="{{$siswa->ijazah_nopes}}" autocomplete="off"/>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->  
                </div>
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">No. SHUN</label>
                        <!--end::Label-->
                        <!--end::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="" name="no_shun" required id="no_shun" value="{{$siswa->ijazah_no_shun}}" autocomplete="off"/>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">No. Ijazah</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="" name="no_ijazah" required id="no_ijazah" value="{{$siswa->ijazah_no}}" autocomplete="off"/>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->  
                </div>
                <hr/>
            </fieldset>

            <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Asal Sekolah</label>
                        <!--end::Label-->
                        <!--end::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="" name="asal_sekolah" required id="asal_sekolah" value="{{$siswa->asal_sekolah}}" autocomplete="off"/>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">No. Telepon</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="" name="no_telp" required id="no_telp" value="{{$siswa->no_telp}}" autocomplete="off"/>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->  
                </div>

                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Tanggal Masuk</label>
                        <!--end::Label-->
                        <!--end::Input-->
                        <input type="date" class="form-control form-control-solid" placeholder="" name="tgl_masuk" required id="tgl_masuk" value="{{$siswa->tgl_masuk}}" autocomplete="off"/>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Tanggal Keluar</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="date" class="form-control form-control-solid" placeholder="" name="tgl_keluar" required id="tgl_keluar" value="{{$siswa->tgl_keluar}}" autocomplete="off"/>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->  
                </div>

                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Kerja Ayah</label>
                        <!--end::Label-->
                        <!--end::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="" name="kerja_ayah" required id="kerja_ayah" value="{{$siswa->kerja_ayah}}" autocomplete="off"/>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Kerja Ibu</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="" name="kerja_ibu" required id="kerja_ibu" value="{{$siswa->kerja_ibu}}" autocomplete="off"/>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->  
                </div>

                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Anak Ke-</label>
                        <!--end::Label-->
                        <!--end::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="" name="anak_ke" required id="anak_ke" value="{{$siswa->anak_ke}}" autocomplete="off"/>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>

            <div class="card-footer text-end">
                <button class="btn w-100 w-sm-auto btn-primary" id="saveBtn">
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
    <script>
        /*$(document).ready(function () {
        })*/
        $(function () {
            $('[name="tahun"]').select2()
            $('[name="agama"]').select2()
        });

        $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
            });

        $('#saveBtn').click(function (e) {
                e.preventDefault();
                $(this).html('Memproses Data...');
                document.getElementById("saveBtn").disabled = true;

                $.ajax({
                  data: $('#kelasinput').serialize(),
                  url: "/datasiswa/update",
                  type: "POST",
                  dataType: 'json',
                  success: function (data) {
                      $('#kelasinput').trigger("reset");
                      document.getElementById("saveBtn").disabled = false;
                      $('#saveBtn').html('Simpa Perubahan Datan');
                      location.href = "/datasiswa/";
                      console.log(data);
                  },
                  error: function (data) {
                      console.log('Error:', data);
                      $('#saveBtn').html('Simpan Perubahan Data');
                      document.getElementById("saveBtn").disabled = false;
                  }
              });
            });

    </script>
@endpush
