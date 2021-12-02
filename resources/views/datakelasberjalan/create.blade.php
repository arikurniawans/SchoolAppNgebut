{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('sub_header_action')
<a href="{{ url('datakelasberjalan') }}" class="btn btn-sm btn-primary">Kembali ke {{$testVariable}}</a>
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
                <form name="kelasinput" id="kelasinput" method="post">
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Tahun Akademik</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                         <select name="tahunakademik" class="form-select form-select-solid">
                        <option value="">Pilih Tahun Akademik...</option>
                        @foreach($tahunakademik as $thn)
                              <option value="{{$thn->idsettingtahun}}">{{$thn->tahunakademik}}</option>
                        @endforeach
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Tingkat Kelas</label>
                        <!--end::Label-->
                        <!--end::Input-->
                        <select name="tingkat" id="tingkat" class="form-select form-select-solid" onchange="disableKelas()">
                            <option value="">Pilih Tingkat Kelas...</option>
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Ruang Kelas</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <!--begin::Select-->
                               <select name="kelas" class="form-select form-select-solid">
                                  <option value="" disabled selected>Pilih Kelas...</option>
                                   <option value="X">X</option>
                                   <option value="XI">XI</option>
                                   <option value="XII">XII</option>
                                </select>
                               <!--end::Select-->
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row" id="styjurusan">
                    <!--begin::Label-->
                     <label class="required fs-5 fw-bold mb-2">Jurusan / Program Keahlian</label>
                     <!--end::Label-->
                               <!--begin::Input-->
                               <!--begin::Select-->
                                <select name="jurusan" id="jurusan" class="form-select form-select-solid">
                                      <option value="1" selected>Pilih Jurusan...</option>
                                      <option value="ipa">IPA</option>
                                      <option value="ips">IPS</option>
                                </select>
                                      <!--end::Select-->
                               <!--end::Input-->
                           </div>
                           <!--end::Col-->

                </div>

                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Kelompok Kelas</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                         <select name="rombel" class="form-select form-select-solid">
                          <option value="">Pilih Kelompok Kelas...</option>
                          @foreach($kelompok as $data)
                            <option value="{{$data->idkelompokkls}}">{{$data->nama_kelompok}}</option>
                          @endforeach
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Wali Kelas</label>
                        <!--end::Label-->
                        <!--end::Input-->
                        <select name="walikelas" class="form-select form-select-solid">
                            <option value="">Pilih Wali Kelas...</option>
                            @foreach($guru as $gr)
                            <option value="{{$gr->id}}">{{$gr->Nip}} - {{$gr->Nama}}</option>
                          @endforeach
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>

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
                    Simpan</button>
            </div>
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
            $('[name="tahunakademik"]').select2()
            $('[name="kelas"]').select2()
            $('[name="jurusan"]').select2()
            $('[name="walikelas"]').select2()
        })

        function disableKelas(){
          var kelas = document.getElementById('semester').selectedOptions[0].value;
          if(kelas=="X"){
            $('select#jurusan').prop('selectedIndex', 0).change();
            document.getElementById('jurusan').disabled = true;            
          }else{
            document.getElementById('jurusan').disabled = false;
          }

        }

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
                  url: "/datakelasberjalan/store",
                  type: "POST",
                  dataType: 'json',
                  success: function (data) {
                      $('#kelasinput').trigger("reset");
                      document.getElementById("saveBtn").disabled = false;
                      $('#saveBtn').html('Simpan');
                      location.href = "/datakelasberjalan/";
                      console.log(data);
                  },
                  error: function (data) {
                      console.log('Error:', data);
                      $('#saveBtn').html('Simpan');
                      document.getElementById("saveBtn").disabled = false;
                  }
              });
            });

    </script>
@endpush