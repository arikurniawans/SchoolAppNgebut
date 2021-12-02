@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('action-title')
    <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
            <a href="#" class="btn btn-danger d-none d-sm-inline-block">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh-alert" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path>
                    <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path>
                    <line x1="12" y1="9" x2="12" y2="12"></line>
                    <line x1="12" y1="15" x2="12.01" y2="15"></line>
                </svg>
                Restore
            </a>
            <a href="#" class="btn btn-danger d-sm-none btn-icon" aria-label="Create new report">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh-alert" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path>
                    <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path>
                    <line x1="12" y1="9" x2="12" y2="12"></line>
                    <line x1="12" y1="15" x2="12.01" y2="15"></line>
                </svg>
            </a>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-md-12 border-0">
                @if($feedback = session('feedback'))
                    @include('layouts._alert_feedback', ['feedback' => $feedback])
                @endif
                <div class="card">
                    <div class="card-status-start bg-primary"></div>
                    <div class="card-body">
                        <form method="post" action="{{ url()->current() }}" enctype="multipart/form-data">
                            @csrf
                            @foreach($data as $st)
                                <div class="form-group mb-3 row">
                                    <label class="form-label col-3 col-form-label">{{ $st->setting_name }}</label>
                                    <div class="col @if($st->setting_type == 'file') text-center @endif">

                                        @if($st->setting_type == 'file')
                                            <span class="avatar avatar-xl mb-3 avatar-rounded text-center" style="background-image: url('{{ $st->setting_val != null ? \Illuminate\Support\Facades\Storage::url($st->setting_val) : 'http://ui-avatars.com/api/?name='. $settings['app_name'] }}')"></span>
                                        @endif
                                        @if($st->setting_type != 'textarea')
                                            <input type="{{ $st->setting_type }}" name="{{ $st->setting_var }}" id="{{ $st->setting_var }}" value="{{ $st->setting_val }}" class="form-control" placeholder="Masukkan {{ $st->setting_name }}">
                                        @else
                                            <textarea class="form-control" name="{{ $st->setting_var }}" id="{{ $st->setting_var }}">{{ $st->setting_val }}</textarea>
                                        @endif
                                        @if($st->setting_description)
                                        <small class="form-hint text-start">{{ $st->setting_description }}</small>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('lib-js')
@endpush
@push('js')
@endpush
