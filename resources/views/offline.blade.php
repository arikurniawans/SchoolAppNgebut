<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Offline - {{ $settings['app_name'] }}</title>
    <link rel="icon"
          type="image/png"
          href="{{ asset('logo.png') }}">
    <!-- CSS files -->
    @stack('lib-css')


    <link href="{{asset('template/css/tabler.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('template/css/tabler-vendors.min.css')}}" rel="stylesheet"/>
    @stack('css')
    <style>
        .toast-container{position:fixed;z-index:1055;margin:5px}.top-right{top:0;right:0}.top-left{top:0;left:0}.top-center{transform:translateX(-50%);top:0;left:50%}.bottom-right{right:0;bottom:0}.bottom-left{left:0;bottom:0}.bottom-center{transform:translateX(-50%);bottom:0;left:50%}.toast-container>.toast{min-width:150px;background:0 0;border:none}.toast-container>.toast>.toast-header{border:none}.toast-container>.toast>.toast-header strong{padding-right:20px}.toast-container>.toast>.toast-body{background:#fff}
    </style>
    @laravelPWA
</head>
<body class="antialiased border-top-wide border-primary d-flex flex-column">
<div class="page page-center">
    <div class="container-tight py-4">
        <div class="empty">
            <div class="empty-img"><img src="{{ asset('images/undraw_quitting_time_dm8t.svg') }}" height="128"  alt="">
            </div>
            <p class="empty-title">Periksa Koneksi Internet Anda</p>
            <p class="empty-subtitle text-muted">
                Mohon maaf sepertinya koneksi anda terputus, silahkan cek ulang kembali koneksi anda lalu coba lagi, terimakasih.
            </p>
            <div class="empty-action">
                <a href="{{ url('/dashboard') }}" class="btn btn-primary">
                    <!-- Download SVG icon from http://tabler-icons.io/i/arrow-left -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="5" y1="12" x2="19" y2="12" /><line x1="5" y1="12" x2="11" y2="18" /><line x1="5" y1="12" x2="11" y2="6" /></svg>
                    Kembali ke Dashboard
                </a>
            </div>
        </div>
    </div>
</div>
@stack('lib-js')
<!-- Tabler Core -->
<script src="{{asset('template/js/tabler.min.js')}}"></script>
</body>
</html>
