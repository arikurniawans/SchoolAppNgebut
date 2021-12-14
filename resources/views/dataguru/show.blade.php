{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('sub_header_action')
<!--begin::Button-->
<a href="/dataguru" class="btn btn-sm btn-primary">Kembali ke Data {{$testVariable}}</a>
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
                <div class="py-5">
                    <div class="rounded border p-10">
                        <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x mb-5 fs-6">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_4"><i class="fas fa-user"></i> Data Guru</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_7"><i class="fas fa-users"></i> Data Keluarga</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_5"><i class="fas fa-graduation-cap"></i> Data Pendidikan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_6"><i class="fas fa-book-reader"></i> Data Mapel di Ampu</a>
                            </li>
                        </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="kt_tab_pane_4" role="tabpanel">
                            @forelse($dataguru as $guru)
                            <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td width="20%"><b>NIP</b></td>
                                    <td width="2%">:</td>
                                    <td>{{$guru->Nip}}</td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>NIK</b></td>
                                    <td width="2%">:</td>
                                    <td>{{$guru->Nik}}</td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Nama Lengkap</b></td>
                                    <td width="2%">:</td>
                                    <td>{{$guru->Nama}}</td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Agama</b></td>
                                    <td width="2%">:</td>
                                    <td>{{$guru->Agama}}</td>
                                </tr>
                                <tr>
                                    <td width="30%"><b>Tempat Lahir / Tanggal Lahir</b></td>
                                    <td width="2%">:</td>
                                    <td>{{$guru->Tempatlahir}}, {{$guru->Tanggallahir}}</td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Jenis Kelamin</b></td>
                                    <td width="2%">:</td>
                                    <td>@if($guru->Jeniskelamin == 'L') Laki-laki @elseif($guru->Jeniskelamin == 'P') Perempuan @endif</td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Alamat</b></td>
                                    <td width="2%">:</td>
                                    <td>{{$guru->Alamat}}</td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>No. Telepon / Handphone</b></td>
                                    <td width="2%">:</td>
                                    <td>{{$guru->NoHp}}</td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Email</b></td>
                                    <td width="2%">:</td>
                                    <td>{{$guru->Email}}</td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Jabatan/Pangkat/Golongan</b></td>
                                    <td width="2%">:</td>
                                    <td>{{$guru->Jabatan}}/{{$guru->Pangkat}}/{{$guru->Golongan}}</td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Email</b></td>
                                    <td width="2%">:</td>
                                    <td>{{$guru->Email}}</td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>NUPTK</b></td>
                                    <td width="2%">:</td>
                                    <td>{{$guru->NUPTK}}</td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Status Marital</b></td>
                                    <td width="2%">:</td>
                                    <td>@if($guru->StatusMenikah == 'BM') Belum Menikah @elseif($guru->StatusMenikah == 'M') Menikah @elseif($guru->StatusMenikah == 'C') Cerai @endif</td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Golongan Darah</b></td>
                                    <td width="2%">:</td>
                                    <td>{{$guru->Goldarah}}</td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Gelar Depan</b></td>
                                    <td width="2%">:</td>
                                    <td>{{$guru->Gelardepan}}</td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Gelar Belakang</b></td>
                                    <td width="2%">:</td>
                                    <td>{{$guru->Gelarbelakang}}</td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>TMT (Terhitung Mulai Tanggal)</b></td>
                                    <td width="2%">:</td>
                                    <td>{{$guru->Tahunmasuk}}</td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Tugas Tambahan</b></td>
                                    <td width="2%">:</td>
                                    <td>{{$guru->Jabatansekolah}}</td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>NIY</b></td>
                                    <td width="2%">:</td>
                                    <td>{{$guru->Niy}}</td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Status Guru</b></td>
                                    <td width="2%">:</td>
                                    <td>{{ strtoupper($guru->status_guru)}}</td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Balas Bakti 15 Tahun</b></td>
                                    <td width="2%">:</td>
                                    <td>{{$guru->balas_bakti_15_tahun}}</td>
                                </tr>
                                 <tr>
                                    <td width="20%"><b>Balas Bakti 25 Tahun</b></td>
                                    <td width="2%">:</td>
                                    <td>{{$guru->balas_bakti_25_tahun}}</td>
                                </tr>
                                 <tr>
                                    <td width="20%"><b>Pensiun 55 Tahun</b></td>
                                    <td width="2%">:</td>
                                    <td>{{$guru->pensiun_55_tahun}}</td>
                                </tr>
                                 <tr>
                                    <td width="20%"><b>Masa Perpanjangan Pertama</b></td>
                                    <td width="2%">:</td>
                                    <td>{{$guru->masa_perpanjangan_1}}</td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Masa Perpanjangan Kedua</b></td>
                                    <td width="2%">:</td>
                                    <td>{{$guru->masa_perpanjangan_2}}</td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Masa Perpanjangan Ketiga</b></td>
                                    <td width="2%">:</td>
                                    <td>{{$guru->masa_perpanjangan_3}}</td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Sertifikasi</b></td>
                                    <td width="2%">:</td>
                                    <td>{{strtoupper($guru->sertifikasi)}}</td>
                                </tr>
                            </tbody>
                        </table>
                        @empty
                        <center>Belum ada data</center>
                        @endforelse
                        </div>

                        <div class="tab-pane fade" id="kt_tab_pane_7" role="tabpanel">
                            
                            <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_table_users" role="grid">
                                        <thead>
                                            <tr>
                                                <th width="50" style="text-align:center;">No</th>
                                                <th>Nama</th>
                                                <th>Hubungan</th>
                                                <th>Tmpt Lahir</th>
                                                <th>Tgl Lahir</th>
                                                <th>Umur</th>
                                            </tr>
                                        </thead>                                        
                                        <tbody class="text-gray-600 fw-bold">
                                            @php $no=1; @endphp
                                            @forelse($datakeluarga as $data)
                                        <tr class="odd">
                                            <td>{{$no++}}</td>
                                            <td>{{$data->nama_keluarga}}</td>
                                            <td>{{$data->hubungan}}</td>
                                            <td>{{$data->tempat_lahir}}</td>
                                            <td>{{$data->tgl_lahir_keluarga}}</td>
                                            <td>{{$data->umur_anak}} Tahun</td>
                                        </tr>
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
                        <div class="tab-pane fade" id="kt_tab_pane_5" role="tabpanel">
                            
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
                                        </tr>
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
                        <div class="tab-pane fade" id="kt_tab_pane_6" role="tabpanel">
                            
                            <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_table_users" role="grid">
                                        <thead>
                                            <th width="50" style="text-align:center;">No</th>
                                            <th>Kode Mapel</th>
                                            <th>Nama Mapel</th>
                                            <th>Jumlah Jam</th>
                                            <th>Kelas</th>
                                        </thead>                                        
                                        <tbody class="text-gray-600 fw-bold">
                                            @php $no=1; @endphp
                                            @forelse($datamapel as $data)
                                        <tr class="odd">
                                            <td>{{$no++}}</td>
                                            <td>{{$data->kode_mapel}}</td>
                                            <td>{{$data->nama_mapel}}</td>
                                            <td>{{$data->jumlah_jam}} Jam</td>
                                            <td>{{$data->kelas}}</td>
                                        </tr>
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
                    </div>
                </div>

            </div>

        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->

</div>
@endsection

@push('lib-js')
@push('lib-js')
@endpush
@push('js')
@endpush
