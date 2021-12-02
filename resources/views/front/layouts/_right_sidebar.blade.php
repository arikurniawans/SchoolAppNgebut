<div class="blog_right_sidebar">
    <aside class="single_sidebar_widget post_category_widget">
        <h4 class="widget_title">Kategori</h4>
        <ul class="list cat-list">
            @forelse($categori as $ct)
            <li>
                <a href="{{ url('post/kategori/'.\Illuminate\Support\Str::lower($ct->label)) }}" class="d-flex">
                    <p>{{ $ct->label }}</p>
                    <p>({{ $ct->galeri_count }})</p>
                </a>
            </li>
            @empty
                <li>
                    <p>Tidak ada kategori</p>
                </li>
            @endforelse
        </ul>
    </aside>
    <aside class="single_sidebar_widget popular_post_widget">
        <h3 class="widget_title">Foto Terbaru</h3>
        @foreach($recentPost as $rp)
        <div class="media post_item">
            <img width="80" height="80" src="{{ \Illuminate\Support\Facades\Storage::url($rp->picture) }}" alt="post">
            <div class="media-body">
                <a href="{{ url('post/'. $rp->seotitle) }}">
                    <h3>{{ \Illuminate\Support\Str::words($rp->title, 6) }}</h3>
                </a>
                <p>{{ \Carbon\Carbon::parse($rp->tanggal)->isoFormat('dddd, D/MMMM/YYYY') }}</p>
            </div>
        </div>
        @endforeach
    </aside>
</div>
