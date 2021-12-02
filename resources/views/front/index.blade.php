@extends('front.layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('content')

    <main>
        <!-- Trending Area Start -->
        <div class="trending-area fix">
            <div class="container">
                <div class="trending-main">
                    <!-- Trending Tittle -->
                    <div class="row mt-5">
                        <div class="col-lg-8">
                            @foreach($recent_foto as $rf)
                                @if($loop->first)
                                    <div class="trending-top mb-30">
                                        <div class="trend-top-img">
                                            <img src="{{ \Illuminate\Support\Facades\Storage::url($rf->picture) }}"
                                                 alt="">
                                            <div class="trend-top-cap">
                                                <span>{{ \Carbon\Carbon::parse($rf->tanggal)->isoFormat('dddd, D/MMMM/YYYY') }}</span>
                                                <h2><a href="{{ url('post/'.$rf->seotitle) }}">{{ $rf->title }}</a></h2>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            <div class="trending-bottom">
                                <div class="row">
                                    @foreach($recent_foto as $rf)
                                        @if(!$loop->first)
                                            <div class="col-lg-4">
                                                <div class="single-bottom mb-35">
                                                    <div class="trend-bottom-img mb-30">
                                                        <img
                                                            height="150px"
                                                            src="{{ \Illuminate\Support\Facades\Storage::url($rf->picture) }}"
                                                            alt="">
                                                    </div>
                                                    <div class="trend-bottom-cap">
                                                        <span
                                                            class="color1">{{ \Carbon\Carbon::parse($rf->tanggal)->isoFormat('dddd, D/MMMM/YYYY') }}</span>
                                                        <h4>
                                                            <a href="{{ url('post/'.$rf->seotitle) }}">{{ $rf->title }}</a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            @foreach($randPost as $rp)
                                <div class="trand-right-single d-flex">
                                    <div class="trand-right-img">
                                        <img width="120px" height="120px"
                                             src="{{ \Illuminate\Support\Facades\Storage::url($rp->picture) }}" alt="">
                                    </div>
                                    <div class="trand-right-cap">
                                        <span class="color1">{{ \Carbon\Carbon::parse($rp->tanggal)->isoFormat('dddd, D/MMMM/YYYY') }}</span>
                                        <h4>
                                            <a href="{{ url('post/'.$rp->seotitle) }}">{{ $rp->title }}</a>
                                        </h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Trending Area End -->
        <!--   Weekly-News start -->
        @foreach($kategori as $ks)

            <div class="weekly-news-area pt-50">
                <div class="container">
                    <div class="weekly-wrapper">
                        <!-- section Tittle -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-tittle mb-30">
                                    <h3>{{ $ks->label }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="weekly-news-active dot-style d-flex dot-style">
                                    @foreach($ks->galeri as $gp)
                                        <div class="weekly-single">
                                            <div class="weekly-img">
                                                <img height="270px" src="{{ \Illuminate\Support\Facades\Storage::url($gp->picture) }}" alt="">
                                            </div>
                                            <div class="weekly-caption">
                                                <span class="color1">{{ \Carbon\Carbon::parse($gp->tanggal)->isoFormat('dddd, D/MMMM/YYYY') }}</span>
                                                <h4><a href="{{ url('post/'. $gp->seotitle) }}">{{ $gp->title }}</a></h4>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- End Weekly-News -->
        <!--   Weekly2-News start -->
        {{--<div class="weekly2-news-area  weekly2-pading gray-bg">
            <div class="container">
                <div class="weekly2-wrapper">
                    <!-- section Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-tittle mb-30">
                                <h3>Weekly Top News</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="weekly2-news-active dot-style d-flex dot-style">
                                <div class="weekly2-single">
                                    <div class="weekly2-img">
                                        <img src="assets/img/news/weekly2News1.jpg" alt="">
                                    </div>
                                    <div class="weekly2-caption">
                                        <span class="color1">Corporate</span>
                                        <p>25 Jan 2020</p>
                                        <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                                    </div>
                                </div>
                                <div class="weekly2-single">
                                    <div class="weekly2-img">
                                        <img src="assets/img/news/weekly2News2.jpg" alt="">
                                    </div>
                                    <div class="weekly2-caption">
                                        <span class="color1">Event night</span>
                                        <p>25 Jan 2020</p>
                                        <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                                    </div>
                                </div>
                                <div class="weekly2-single">
                                    <div class="weekly2-img">
                                        <img src="assets/img/news/weekly2News3.jpg" alt="">
                                    </div>
                                    <div class="weekly2-caption">
                                        <span class="color1">Corporate</span>
                                        <p>25 Jan 2020</p>
                                        <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                                    </div>
                                </div>
                                <div class="weekly2-single">
                                    <div class="weekly2-img">
                                        <img src="assets/img/news/weekly2News4.jpg" alt="">
                                    </div>
                                    <div class="weekly2-caption">
                                        <span class="color1">Event time</span>
                                        <p>25 Jan 2020</p>
                                        <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                                    </div>
                                </div>
                                <div class="weekly2-single">
                                    <div class="weekly2-img">
                                        <img src="assets/img/news/weekly2News4.jpg" alt="">
                                    </div>
                                    <div class="weekly2-caption">
                                        <span class="color1">Corporate</span>
                                        <p>25 Jan 2020</p>
                                        <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}
        <!-- End Weekly-News -->
        <!-- Start Youtube -->
        <div class="youtube-area video-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="video-items-active">
                            @foreach($yts as $yt)
                                <div class="video-items text-center">
                                    <iframe src="{{ $yt->url }}" frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="video-info">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="video-caption">
                                <div class="top-caption">
                                    <span class="color1">Youtube</span>
                                </div>
                                <div class="bottom-caption">
                                    <h2>Selamat datang di youtube channel {{ $settings['app_name'] }}</h2>
                                    <p>{{ \Illuminate\Support\Str::words($settings['app_desc'], 75) }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="testmonial-nav text-center">
                                @foreach($yts as $yt)
                                    <div class="single-video">
                                        <iframe src="{{ $yt->url }}" frameborder="0"
                                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                        <div class="video-intro">
                                            <h4>{{ $yt->title }}</h4>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('lib-js')
@endpush
@push('js')
@endpush
