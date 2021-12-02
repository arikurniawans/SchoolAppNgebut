@extends('front.layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('content')
    <section class="blog_area single-post-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post">
                        <div class="feature-img">
                            <img class="img-fluid w-100" src="{{ \Illuminate\Support\Facades\Storage::url($post->picture) }}" alt="">
                        </div>
                        <div class="blog_details">
                            <h2>
                                {{ $post->title }}
                            </h2>
                            <ul class="blog-info-link mt-3 mb-4">
                                <li><a href="#"><i class="fa fa-user"></i> Administrator</a></li>
                                <li><a href="#"><i class="fa fa-calendar"></i> {{ \Carbon\Carbon::parse($post->tanggal)->isoFormat('dddd, D/MMMM/YYYY') }}</a></li>
                            </ul>
                            <p>{!! $post->content !!}</p>
                        </div>
                    </div>
                    <div class="navigation-top">
                        <div class="d-sm-flex justify-content-between text-center">
                            <ul class="social-icons">
                                <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            </ul>
                        </div>
                        <div class="navigation-area">
                            <div class="row">
                                @if($prev_post)
                                <div
                                    class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                    <div class="thumb">
                                        <a href="{{ url('post/'.$prev_post->seotitle) }}">
                                            <img class="img-fluid" src="{{ \Illuminate\Support\Facades\Storage::url($prev_post->picture) }}" width="60" height="60" alt="">
                                        </a>
                                    </div>
                                    <div class="arrow">
                                        <a href="{{ url('post/'.$prev_post->seotitle) }}">
                                            <span class="lnr text-white ti-arrow-left"></span>
                                        </a>
                                    </div>
                                    <div class="detials">
                                        <p>Prev Post</p>
                                        <a href="{{ url('post/'.$prev_post->seotitle) }}">
                                            <h4>{{ $prev_post->title }}</h4>
                                        </a>
                                    </div>
                                </div>
                                @endif
                                @if($next_post)
                                <div
                                    class="col-lg-6 @if(!$prev_post) offset-6 @endif col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                    <div class="detials">
                                        <p>Next Post</p>
                                        <a href="{{ url('post/'.$next_post->seotitle) }}">
                                            <h4>{{ $next_post->title }}</h4>
                                        </a>
                                    </div>
                                    <div class="arrow">
                                        <a href="{{ url('post/'.$next_post->seotitle) }}">
                                            <span class="lnr text-white ti-arrow-right"></span>
                                        </a>
                                    </div>
                                    <div class="thumb">
                                        <a href="{{ url('post/'.$next_post->seotitle) }}">
                                            <img class="img-fluid" src="{{ \Illuminate\Support\Facades\Storage::url($next_post->picture) }}"  width="60" height="60" alt="">
                                        </a>
                                    </div>
                                </div>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    @include('front.layouts._right_sidebar', ['recentPost' => $recentPost])
                </div>
            </div>
        </div>
    </section>
@endsection

@push('lib-js')
@endpush
@push('js')
@endpush
