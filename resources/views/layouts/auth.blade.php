<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head><base href="../../">
    <meta charset="utf-8" />
    <title>{{ $title ?? 'Dashboard' }} | {{ $settings['app_name'] ?? env('APP_NAME') }}</title>
    <meta name="description" content="{{ $settings['app_desc'] }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="{{  $settings['app_keywords'] }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ $settings['app_icon'] }}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('theme2/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme2/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="bg-white">
<!--begin::Main-->
@yield('content')
<!--end::Main-->
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ asset('theme2/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('theme2/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{asset('theme2/js/custom/modals/create-account.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<!--end::Page Custom Javascript-->
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
