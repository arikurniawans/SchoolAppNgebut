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
                @foreach($datasekolah as $sekolah)
                <form name="kelasinput" id="kelasinput" method="post">
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <input type="hidden" name="id" id="id" value="{{$sekolah->idsekolah}}"/>
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">NPSN</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="number" class="form-control form-control-solid" placeholder="" name="npsn" id="npsn" value="{{$sekolah->npsn}}" autocomplete="off"/>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Nama Sekolah</label>
                        <!--end::Label-->
                        <!--end::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="" name="nama_sekolah" id="nama_sekolah" value="{{$sekolah->nama_sekolah}}" autocomplete="off"/>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row g-9 mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Web Sekolah</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input class="form-control form-control-solid" placeholder="" name="web_sekolah" id="web_sekolah" value="{{$sekolah->web_sekolah}}" autocomplete="off"/>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">No. Telepon</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="number" class="form-control form-control-solid" placeholder="" name="telp" id="telp" value="{{$sekolah->notelp}}" autocomplete="off"/>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->                    
                </div>
                <!--end::Input group--> 
                <!--begin::Col-->
                    <div class="d-flex flex-column mb-5 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Alamat Sekolah</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <textarea class="form-control form-control-solid" name="alamat" id="alamat" autocomplete="off">{{$sekolah->alamat_sekolah}}</textarea>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->               
                <!--begin::Input group-->
                <div class="row g-9 mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Provinsi</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select class="form-control form-control-solid" name="provinsi" id="provinsi">
                            <option value="">Pilih Provinsi</option>
                            <option value="{{$sekolah->provinsi}}" selected>{{$sekolah->provinsi}}</option>
                            @foreach($dataprov as $prov)
                            <option value="{{$prov->kode}}">{{$prov->nama}}</option>
                            @endforeach
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Kabupaten / Kota</label>
                        <!--end::Label-->
                       <select class="form-control form-control-solid" name="kab" id="kab">
                            <option value="">Pilih Kabupaten/Kota</option>
                            <option value="{{$sekolah->kab_kota}}" selected>{{$sekolah->kab_kota}}</option>
                        </select>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->  
                <!--begin::Input group-->
                <div class="row g-9 mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Kecamatan</label>
                        <!--end::Label-->
                       <select class="form-control form-control-solid" name="kec" id="kec">
                            <option value="">Pilih Kecamatan</option>
                            <option value="{{$sekolah->kec}}" selected>{{$sekolah->kec}}</option>
                        </select>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Kode Pos</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input class="form-control form-control-solid" placeholder="" name="kodepos" id="kodepos" value="{{$sekolah->kode_pos}}" autocomplete="off"/>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->   
                <!--begin::Input group-->
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Luas Tanah (M<sup>2</sup>)</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="" name="luas" id="luas" value="{{$sekolah->luas_tanah}}" autocomplete="off"/>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Jumlah Ruang Kelas</label>
                        <!--end::Label-->
                        <!--end::Input-->
                        <input type="number" class="form-control form-control-solid" placeholder="" name="ruang" value="{{$sekolah->ruang_kelas}}" id="ruang" autocomplete="off"/>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Jumlah Lab</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="number" class="form-control form-control-solid" placeholder="" name="lab" id="lab" value="{{$sekolah->lab}}" autocomplete="off"/>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <label class="required fs-5 fw-bold mb-2">Jumlah Perpus</label>
                        
                        <input type="number" class="form-control form-control-solid" placeholder="" name="perpus" id="perpus" value="{{$sekolah->perpus}}" autocomplete="off"/>
                       
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
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
        </form>
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

        $(document).ready(function () {

            $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
            });

            $('body').on("change","#provinsi",function(){
                var id = $(this).val();
                var data = "id="+id+"&data=kabupaten";
                $.ajax({
                    type: 'POST',
                    url: "/datasekolah/wilayah",
                    data: data,
                    success: function(hasil) {
                        $("#kab").html(hasil);
                    },
                      error: function (data) {
                          console.log('Error:', data);
                      }
                });
            });

            $('body').on("change","#kab",function(){
                var id = $(this).val();
                var data = "id="+id+"&data=kecamatan";
                $.ajax({
                    type: 'POST',
                    url: "/datasekolah/wilayah",
                    data: data,
                    success: function(hasil) {
                        $("#kec").html(hasil);
                    },
                      error: function (data) {
                          console.log('Error:', data);
                      }
                });
            });

        });
        
        $('#saveBtn').click(function (e) {
                e.preventDefault();
                $(this).html('Memproses Data...');
                document.getElementById("saveBtn").disabled = true;

                $.ajax({
                  data: $('#kelasinput').serialize(),
                  url: "/datasekolah/update",
                  type: "POST",
                  dataType: 'json',
                  success: function (data) {
                      $('#kelasinput').trigger("reset");
                      document.getElementById("saveBtn").disabled = false;
                      $('#saveBtn').html('Simpan Perubahan Data');
                      location.href = "/datasekolah/";
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
