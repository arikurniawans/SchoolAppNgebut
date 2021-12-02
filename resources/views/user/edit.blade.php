@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('action-title')
    <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
            <a href="{{ url('users') }}" class="btn btn-success d-none d-sm-inline-block">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back-up" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M9 13l-4 -4l4 -4m-4 4h11a4 4 0 0 1 0 8h-1"></path>
                </svg>
                Kembali
            </a>
            <a href="{{ url('users') }}"  class="btn btn-success d-sm-none btn-icon">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back-up" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M9 13l-4 -4l4 -4m-4 4h11a4 4 0 0 1 0 8h-1"></path>
                </svg>
            </a>
        </div>
    </div>
@endsection

@section('content')

    <div class="container-xl">
        <div class="row">
            <div class="col-md-12">
                @if($feedback = session('feedback'))
                    @include('layouts._alert_feedback', ['feedback' => $feedback])
                @endif
                <form action="{{ url('users/'.$edit->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="card">
                    <div class="card-status-start bg-warning"></div>
                    <div class="card-header d-flex">
                        <h4 class="card-title">Form Isian Pengguna</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row mb-3">
                            <label class="form-label col-md-3 col-form-label">Nama Lengkap</label>
                            <div class="col">
                                <input type="text" name="name" id="no_hp" value="{{ old('name', $edit->name) }}" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan nama lengkap pengguna..">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="form-label col-md-3 col-form-label">Email</label>
                            <div class="col">
                                <input type="email" name="email" id="email" value="{{ old('email', $edit->email) }}" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan email..">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="form-label col-md-3 col-form-label">Nomor Handphone</label>
                            <div class="col">
                                <input type="no_hp" name="no_hp" id="no_hp" value="{{ old('no_hp', $edit->no_hp) }}" class="form-control @error('no_hp') is-invalid @enderror" placeholder="Masukkan Nomor Handphone..">
                                @error('no_hp')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="hr-text hr-text-left">Informasi Login Akun</div>

                        <div class="form-group row mb-3">
                            <label class="form-label col-md-3 col-form-label">Username</label>
                            <div class="col">
                                <input type="text" name="username" id="username" value="{{ old('username', $edit->username) }}" class="form-control @error('username') is-invalid @enderror" placeholder="Masukkan username..">
                                @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="form-label col-md-3 col-form-label">Password</label>
                            <div class="col">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Password..">
                                <small class="form-hint"><b>Biarkan kosong apabila tidak ingin mengganti password</b>, gunakan password yang kuat(ribet) tapi mudah diingat oleh anda.</small>
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-md-3 col-form-label">Konfirmasi Password</label>
                            <div class="col">
                                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Konfirmasi Password..">
                                @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="hr-text hr-text-left">Informasi Role Pengguna</div>
                        <div class="form-group row mb-3">
                            <label class="form-label col-md-3 col-form-label">Role</label>
                            <div class="col">
                                <select name="level" class="form-control select2 @error('level') is-invalid @enderror" id="level">
                                    <option></option>
                                    <option {{ old('level', $edit->level) == env('role_user',) ? 'selected' : '' }} value="{{ env('role_user') }}">{{ \Illuminate\Support\Str::ucfirst(env('role_user')) }}</option>
                                    <option {{ old('level', $edit->level) == env('role_surat',) ? 'selected' : '' }} value="{{ env('role_surat') }}">{{ \Illuminate\Support\Str::ucfirst(env('role_surat')) }}</option>
                                    <option {{ old('level', $edit->level) == env('role_protokol',) ? 'selected' : '' }} value="{{ env('role_protokol') }}">{{ \Illuminate\Support\Str::ucfirst(env('role_protokol')) }}</option>
                                    <option {{ old('level', $edit->level) == env('role_dokumentasi',) ? 'selected' : '' }} value="{{ env('role_dokumentasi') }}">{{ \Illuminate\Support\Str::ucfirst(env('role_dokumentasi')) }}</option>
                                </select>
                                <small class="form-hint">Silahkan pilih sebagai role apa pengguna yang akan dibuat.</small>
                                @error('level')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="form-label col-md-3 col-form-label">Organisasi Perangkat Daerah</label>
                            <div class="col">
                                <select name="opd" class="form-control select2 @error('opd') is-invalid @enderror" id="opd">
                                    <option>Pilih OPD</option>
                                    @if($edit->opd && !old('opd'))
                                    <option value="{{ $edit->opd->id_opd }}" selected>{{ $edit->opd->nama_opd   }}</option>
                                    @endif
                                    @foreach($opd as $o)
                                        <option @if($o->id_opd == old('opd')) selected @endif value="{{ $o->id_opd }}">{{ $o->nama_opd }}</option>
                                    @endforeach
                                </select>
                                <small class="form-hint">Biarkan tidak dipilih apabila pengguna tidak memiliki opd manapun</small>
                                @error('opd')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="hr-text hr-text-left">Tampilan pengguna</div>
                        <div class="form-group row mb-3">
                            <label class="form-label col-md-3 col-form-label">Foto Pengguna</label>
                            <div class="col text-center">
                                @if($edit->avatar != null)
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($edit->avatar) }}" class="avatar avatar-2xl mb-2">
                                @endif
                                <input name="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror">
                                <small class="form-hint text-start">Biarkan kosong saja apabila tidak ingin mengganti foto.</small>
                                @error('avatar')
                                <div class="invalid-feedback text-start">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="hr-text hr-text-left">Status Pengguna</div>
                            <div class="form-selectgroup form-selectgroup-boxes d-flex flex-column">
                                <label class="form-selectgroup-item flex-fill">
                                    <input @if($edit->active) checked @endif type="radio" name="active" value="1" class="form-selectgroup-input">
                                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                                        <div class="me-3">
                                            <span class="form-selectgroup-check"></span>
                                        </div>
                                        <div>

                                            <strong>Aktif</strong>
                                        </div>
                                    </div>
                                </label>
                                <label class="form-selectgroup-item flex-fill">
                                    <input @if(!$edit->active) checked @endif type="radio" name="active" value="0" class="form-selectgroup-input">
                                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                                        <div class="me-3">
                                            <span class="form-selectgroup-check"></span>
                                        </div>
                                        <div>
                                            <strong>Tidak aktif</strong>
                                        </div>
                                    </div>
                                </label>
                            </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                                <circle cx="12" cy="14" r="2"></circle>
                                <polyline points="14 4 14 8 8 8 8 4"></polyline>
                            </svg> Simpan</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('lib-js')
@endpush
@push('js')
@endpush
