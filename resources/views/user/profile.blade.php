@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('action-title')
@endsection

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-md-12">
                @if($feedback = session('feedback'))
                    @include('layouts._alert_feedback', ['feedback' => $feedback])
                @endif
            </div>
            <div class="col-md-4 mb-sm-0 mb-3 border-0">
                <div class="card">
                    <div class="card-body p-4 text-center">
                        <span class="avatar avatar-xl mb-3 avatar-rounded" style="background-image: url('{{ $profile->avatar != null ? \Illuminate\Support\Facades\Storage::url($profile->avatar) : 'https://ui-avatars.com/api/?name='.$profile->name }}')"></span>
                        <h3 class="m-0 mb-1"><a href="#">{{ $profile->name }}</a></h3>
                        <div class="text-muted">{{ $profile->username }}</div>
                        <div class="mt-3">
                            <span class="badge bg-purple-lt">{{ \Illuminate\Support\Str::ucfirst($profile->level) }}</span>
                        </div>
                    </div>
                    <div class="d-flex flex-sm-nowrap flex-wrap">
                        <a href="#" class="card-btn"><!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><rect x="3" y="5" width="18" height="14" rx="2"></rect><polyline points="3 7 12 13 21 7"></polyline></svg>
                            {{ $profile->email }}</a>
                        <a href="#" class="card-btn"><!-- Download SVG icon from http://tabler-icons.io/i/phone -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2"></path></svg>
                            {{ $profile->no_hp }}</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8 border-0">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-pills card-header-pills" id="tab-card">
                            <li class="nav-item">
                                <button id="btn-pengguna" class="nav-link active" onclick="activeTab('pengguna')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                    </svg>
                                    Informasi Pengguna
                                </button>
                            </li>
                            <li class="nav-item">
                                <button id="btn-password" class="nav-link" onclick="activeTab('password')">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-key" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="8" cy="15" r="4"></circle>
                                        <line x1="10.85" y1="12.15" x2="19" y2="4"></line>
                                        <line x1="18" y1="5" x2="20" y2="7"></line>
                                        <line x1="15" y1="8" x2="17" y2="10"></line>
                                    </svg>
                                    Ganti Password
                                </button>
                            </li>
                            <li class="nav-item">
                                <button id="btn-log" class="nav-link" onclick="activeTab('log')">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-traffic-lights" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <rect x="7" y="2" width="10" height="20" rx="5"></rect>
                                        <circle cx="12" cy="7" r="1"></circle>
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="12" cy="17" r="1"></circle>
                                    </svg>
                                    Log Aktivitas
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <form id="row-informasi" action="{{ url('profile/informasi') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label">Nama Lengkap</label>
                                    <div class="col">
                                        <input type="text" name="name" id="name" value="{{ old('name', $profile->name) }}" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan nama..">
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label">Username</label>
                                    <div class="col">
                                        <input type="text" name="username" id="username" value="{{ old('username', $profile->username) }}" class="form-control disabled @error('username') is-invalid @enderror" disabled placeholder="Masukkan username..">
                                        @error('username')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="form-label col-md-3 col-form-label">Email</label>
                                    <div class="col">
                                            <input type="email" name="email" id="email" value="{{ old('email', $profile->email) }}" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email..">
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="form-label col-md-3 col-form-label">Nomor Handphone</label>
                                    <div class="col">
                                            <input type="no_hp" name="no_hp" id="no_hp" value="{{ old('no_hp', $profile->no_hp) }}" class="form-control @error('no_hp') is-invalid @enderror" placeholder="Masukkan Nomor Handphone..">
                                        @error('no_hp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label class="form-label col-md-3 col-form-label">Ganti Avatar</label>
                                    <div class="col">
                                            <input type="file" name="avatar" id="avatar"  class="form-control @error('avatar') is-invalid @enderror">
                                        @error('avatar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                            <small class="form-hint text-start">Biarkan kosong apabila tidak ingin mengubah avatar.</small>
                                    </div>
                            </div>
                            <div class="form-footer float-end">
                                <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                                        <circle cx="12" cy="14" r="2"></circle>
                                        <polyline points="14 4 14 8 8 8 8 4"></polyline>
                                    </svg>
                                    Simpan</button>
                            </div>
                        </form>
                        <form id="row-password" style="display: none" action="{{ url('profile/password') }}" method="post">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group row mb-3">
                                    <label class="form-label col-md-3 col-form-label">Password Lama</label>
                                    <div class="col">
                                        <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" placeholder="Masukkan Password lama..">
                                        @error('old_password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="form-label col-md-3 col-form-label">Password Baru</label>
                                    <div class="col">
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Password baru..">
                                        <small class="form-hint">Gunakan password yang kuat(ribet) tapi mudah diingat oleh anda.</small>
                                        @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="form-label col-md-3 col-form-label">Konfirmasi Password Baru</label>
                                    <div class="col">
                                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Konfirmasi Password baru..">
                                        @error('password_confirmation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-footer float-end">
                                    <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                                            <circle cx="12" cy="14" r="2"></circle>
                                            <polyline points="14 4 14 8 8 8 8 4"></polyline>
                                        </svg>
                                        Simpan</button>
                                </div>
                            </div>
                        </form>
                        <div class="row" id="row-log" style="display: none">
                            <div class="col-md-12">
                                <ul class="list list-timeline">
                                    @foreach($logs as $lg)
                                        <li>
                                            <div class="list-timeline-icon @if($lg->log_type == 'aktivitas') bg-success @else bg-primary @endif"><!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                                @if($lg->log_type == 'aktivitas')
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-activity" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M3 12h4l3 8l4 -16l3 8h4"></path>
                                                    </svg>
                                                    @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-event" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <rect x="4" y="5" width="16" height="16" rx="2"></rect>
                                                        <line x1="16" y1="3" x2="16" y2="7"></line>
                                                        <line x1="8" y1="3" x2="8" y2="7"></line>
                                                        <line x1="4" y1="11" x2="20" y2="11"></line>
                                                        <rect x="8" y="15" width="2" height="2"></rect>
                                                    </svg>
                                                @endif
                                            </div>
                                            <div class="list-timeline-content">
                                                <div class="list-timeline-time" style="width: 6rem!important;">{{ \Carbon\Carbon::parse($lg->log_created_at)->isoFormat('DD/MM/YYYY HH:mm') }}</div>
                                                @if($lg->log_type == 'aktivitas')
                                                    <p class="list-timeline-title">Pengguna melakukan aktivitas!</p>
                                                @else
                                                    <p class="list-timeline-title">Pengguna melakukan sebuah pekerjaan!</p>
                                                @endif
                                                <p class="text-muted">{{ $lg->log_description }}.</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('lib-js')
@endpush
@push('js')
    <script>
        $(document).ready(function () {
            @if(request()->has('tab') && request()->get('tab') == 'log')
                activeTab('log')
            @endif
            @if($errors->has('password') || $errors->has('old_password'))
            activeTab('password')
            @endif
        })
        function activeTab(param) {
            $('#tab-card li button').removeClass('active');
            $('#btn-'+param).addClass('active');
            if(param === 'pengguna') {
                $('#row-informasi').show();
                $('#row-password').hide();
                $('#row-log').hide();
            } else if(param === 'password') {
                $('#row-password').show();
                $('#row-informasi').hide();
                $('#row-log').hide();
            } else {
                $('#row-log').show();
                $('#row-informasi').hide();
                $('#row-password').hide();
            }
        }
    </script>
@endpush
