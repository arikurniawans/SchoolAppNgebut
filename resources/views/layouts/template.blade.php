<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>{{ $title ?? 'Dashboard' }} | {{ $settings['app_name'] ?? env('APP_NAME') }}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
		
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{ asset('theme2/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('theme2/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
		<!--begin::Main-->
		<!--begin::Root-->
		@include('sweetalert::alert')
		<div class="d-flex flex-column flex-root">			
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
                @include('layouts._aside')
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                    @include('layouts._header')
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        @include('layouts._sub_header')
						<!--begin::Post-->
                        @yield('content')
						<!--end::Post-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
						<!--begin::Container-->
						<div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
							<!--begin::Copyright-->
							<div class="text-dark order-2 order-md-1">
								<span class="text-muted fw-bold me-1">{{ now()->format('Y') }}©</span>
								<a href="" target="_blank" class="text-gray-800 text-hover-primary">{{ $settings['app_name'] ?? env('APP_NAME') }}</a>
							</div>
							<!--end::Copyright-->
							<!--begin::Menu-->
							<ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
								<li class="menu-item">
									<a href="https://keenthemes.com/faqs" target="_blank" class="menu-link px-2">About</a>
								</li>
								<li class="menu-item">
									<a href="https://keenthemes.com/support" target="_blank" class="menu-link px-2">Support</a>
								</li>
								<li class="menu-item">
									<a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
								</li>
							</ul>
							<!--end::Menu-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<!--begin::Svg Icon | path: icons/duotone/Navigation/Up-2.svg-->
			<span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24" />
						<rect fill="#000000" opacity="0.5" x="11" y="10" width="2" height="10" rx="1" />
						<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
					</g>
				</svg>
			</span>
			<!--end::Svg Icon-->
		</div>
		<!--end::Main-->
		<!--begin::Javascript-->

		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{ asset('theme2/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('theme2/js/scripts.bundle.js') }}"></script>
        <script src="{{asset('js/custom.js')}}"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--end::Javascript-->
        @stack('lib-js')
        <script>
            $(document).ready(function () {
                // initToast('Berhasil', 'Dokumen berhasil dihapus!', 'success', '11 menit yang lalu')
                $('.select2').select2({
                    placeholder: 'Pilih data'
                });
            })

            var rupiah = document.getElementById('rupiah');

	        rupiah.addEventListener('keyup', function(e){
	            rupiah.value = formatRupiah(this.value, 'Rp.');
	        });

	        /* Fungsi formatRupiah */
	        function formatRupiah(angka, prefix){
	            var number_string = angka.replace(/[^,\d]/g, '').toString(),
	            split   = number_string.split(','),
	            sisa    = split[0].length % 3,
	            rupiah  = split[0].substr(0, sisa),
	            ribuan  = split[0].substr(sisa).match(/\d{3}/gi);
	 
	            if(ribuan){
	                separator = sisa ? '.' : '';
	                rupiah += separator + ribuan.join('.');
	            }
	 
	            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
	            return prefix == undefined ? rupiah : (rupiah ? 'Rp.' + rupiah : '');
	        }

            function initToast(title, message, status, time) {
                $.toast({
                    type: status,
                    title: title,
                    subtitle: time,
                    content: message,
                    delay: 5000,
                });
            }

            async function transAjax(data) {
                html = null;
                data.headers = {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                await $.ajax(data).done(function(res) {
                    html = res;
                })
                .fail(function() {
                    return false;
                })
                return html
            }

        </script>
        @stack('js')
	</body>
	<!--end::Body-->
</html>
