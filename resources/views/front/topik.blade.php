@extends('front.layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('content')
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <h3>Kategori: <span class="font-weight-normal">{{ $topik }}</span></h3>
                        @forelse($posts as $ps)
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="{{ \Illuminate\Support\Facades\Storage::url($ps->picture) }}" alt="">
                                <a href="#" class="blog_item_date">
                                    <h3>{{ \Carbon\Carbon::parse($ps->tanggal)->format('d') }}</h3>
                                    <p>{{ \Carbon\Carbon::parse($ps->tanggal)->isoFormat('MMM') }}</p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="{{ url('/post/'. $ps->seotitle) }}">
                                    <h2>{{ $ps->title }}</h2>
                                </a>
                                <p>{{ \Illuminate\Support\Str::words($ps->content, 10) }}</p>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="fa fa-user"></i> Administrator</a></li>
                                </ul>
                            </div>
                        </article>
                        @empty
                            <h3 class="text-center">Tidak ada data yang tersedia.</h3>
                        @endforelse

                        {{ $posts->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
                <div class="col-md-4">
                    @include('front.layouts._right_sidebar')
                </div>
            </div>
            </div>
        </div>
    </section>
@endsection

@push('lib-js')
@endpush
@push('js')
@endpush
