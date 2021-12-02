<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-top black-bg d-none d-md-block">
                <div class="container">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left">
                                <ul>
                                    <li>{{ now()->isoFormat('dddd, D MMMM YYYY') }}</li>
                                </ul>
                            </div>
                            <div class="header-info-right">
                                <ul class="header-social">
                                    <li><a target="_blank" href="{{ $settings['app_fb'] }}"><i class="fab fa-facebook"></i></a></li>
                                    <li><a target="_blank" href="{{ $settings['app_ig'] }}"><i class="fab fa-instagram"></i></a></li>
                                    <li> <a target="_blank" href="{{ $settings['app_yt'] }}"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="header-mid d-none d-md-block">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-3 col-lg-3 col-md-3">
                            <div class="logo">
                                <a href="{{ url('/') }}"><img width="200" src="{{ \Illuminate\Support\Facades\Storage::url($settings['app_logo']) }}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9">
                            <div class="header-banner f-right ">
                                <img src="{{asset('assets/img/hero/header_card.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-10 col-lg-10 col-md-12 header-flex">
                            <!-- sticky -->
                            <div class="sticky-logo">
                                <a href="{{ url('/') }}"><img width="65" src="{{ \Illuminate\Support\Facades\Storage::url($settings['app_logo']) }}" alt=""></a>
                            </div>
                            <!-- Main-menu -->
                            <div class="main-menu d-none d-md-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{ url('/') }}">Home</a></li>
                                        @auth
                                            <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                        @else
                                            <li><a href="{{ url('/login') }}">Login Aplikasi</a></li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4">
                            <div class="header-right-btn f-right d-none d-lg-block">
                                <i class="fas fa-search special-tag"></i>
                                <div class="search-box">
                                    <form action="{{ url('/post') }}" method="get">
                                        <input name="search" type="text" class="form-control" placeholder="Search..">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-md-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
