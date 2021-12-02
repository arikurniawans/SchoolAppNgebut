{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('sub_header_action')
<div class="me-4">
    <!--begin::Menu-->
        <a href="{{ url('datapembayaranspp') }}" class="btn btn-sm btn-flex btn-primary fw-bolder">Kembali ke {{ $testVariable3 }}</a>
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
                @php array_push($arrnisn, $siswa->nisn); @endphp
                <table class="table table-hover">
                    <tbody>
                      <tr>
                        <td><b>NISN</b></td>
                        <td>{{$siswa->nisn}}</td>
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
                            <h4 class="text-gray-800 fw-bolder">Input Tagihan Pembayaran SPP</h4>
                            <div class="fs-6 text-gray-600">Form input tagihan Pembayaran SPP siswa</div>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Notice-->
                
                <!--begin::Input group-->
               <form id="kelasinput" name="kelasinput" method="post">
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <input type="hidden" name="nisn" id="nisn" value="@php  print_r($arrnisn[0]); @endphp"/>
                        <label class="required fs-5 fw-bold mb-2">Komponen Biaya / Total Tagihan</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                         <select name="komponen" id="komponen" onchange="pilih(this.value)" class="form-select form-select-solid">
                                <option value="">Pilih Komponen Biaya...</option>
                                @foreach($databayar as $bayar)
                                <option value="{{$bayar->idkomponen}}">{{$bayar->nama_komponen}} - Rp.{{ number_format($bayar->besaran_biaya)}}</option>
                                @endforeach
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Nominal Yang Dibayar</label>
                        <!--end::Label-->
                        <!--end::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="Jumlah Nominal Yang Dibayar" name="jumlah" id="jumlah" onkeyup="hitung()">
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Nominal Yang Belum Dibayar</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="Jumlah Nominal Yang Belum Dibayar" name="belum" id="belum" value="0">
                        <input type="hidden" id="temp"/>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row" id="styjurusan">
                    <!--begin::Label-->
                     <label class="required fs-5 fw-bold mb-2">Upload Bukti Bayar</label>
                     <!--end::Label-->
                    <!--begin::Input-->
                    <input type="file" class="form-control form-control-solid" name="select_file" id="select_file">
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
                    Simpan Data Pembayaran</button>
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
            $('[name="keterangan"]').select2()
            $('[name="kelas"]').select2()
            $('[name="tahunakademik"]').select2()
            $('[name="guru"]').select2()
        })

        $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
            });
        
        function pilih(id)
        {
            $.ajax({
                type: 'post',
                data: {'id': id},
                url: '/datapembayaranspp/cari',
                dataType: 'json',
                success: function(res){
                   console.log(res.message[0].besaran_biaya);
                   document.getElementById('jumlah').value = res.message[0].besaran_biaya;
                   document.getElementById('temp').value = res.message[0].besaran_biaya;
                   document.getElementById('belum').value = res.message[0].besaran_biaya;
                },
                error: function(res){
                    $('#message').text('Error!');
                    $('.dvLoading').hide();
                }
            });
        }

        function hitung(){
            var jumlah = document.getElementById('jumlah').value;
            var sisa = document.getElementById('temp').value;
            var hasil = sisa - jumlah;
            document.getElementById('belum').value = hasil;
        }


        $('#kelasinput').submit(function (e) {
                e.preventDefault();
                //$(this).html('Memproses Data...');
                document.getElementById("saveBtn").disabled = true;

                $.ajax({
                  data: new FormData(this),
                  url: "/datapembayaranspp/store",
                  processData: false,
                  contentType: false,
                  type: "POST",
                  dataType: 'json',
                  success: function (data) {
                      $('#kelasinput').trigger("reset");
                      document.getElementById("saveBtn").disabled = false;
                      $('#saveBtn').html('Simpan Data Pembayaran');
                      location.href = "/datapembayaranspp/";
                      console.log(data);
                  },
                  error: function (data) {
                      console.log('Error:', data);
                  }
              });
            });
            
    </script>
        }
@endpush