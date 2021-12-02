@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('action-title')
    <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
            <a href="{{ url('galeri') }}" class="btn btn-success d-none d-sm-inline-block">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back-up" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M9 13l-4 -4l4 -4m-4 4h11a4 4 0 0 1 0 8h-1"></path>
                </svg>
                Kembali
            </a>
            <a href="{{ url('galeri') }}"  class="btn btn-success d-sm-none btn-icon">
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
                <form action="{{ url('galeri') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="card">
                    <div class="card-status-start bg-green"></div>
                    <div class="card-header">
                        <h4 class="card-title">Form Isian Galeri</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row mb-3">
                            <label class="form-label col-md-3 col-form-label">Judul</label>
                            <div class="col">
                                <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" placeholder="Masukkan Judul..">
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="form-label col-md-3 col-form-label">Seotitle</label>
                            <div class="col">
                                <input type="text" readonly name="seotitle" id="seotitle" value="{{ old('seotitle') }}" class="form-control @error('seotitle') is-invalid @enderror" placeholder="Masukkan Seotitle..">
                                @error('seotitle')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-3">
                            <label class="form-label col-md-3 col-form-label">Kategori Album</label>
                            <div class="col">
                                <select name="kategori[]" id="kategori" class="form-control select2 @error('kategori') is-invalid @enderror" multiple>
                                    <option></option>
                                    @foreach($kategori as $kt)
                                        <option {{ (collect(old('kategori'))->contains($kt->id)) ? 'selected':'' }} value="{{ $kt->id }}">{{ $kt->label }}</option>
                                    @endforeach
                                </select>
                                @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-3">
                            <label class="form-label col-md-3 col-form-label">Tanggal Foto</label>
                            <div class="col">
                                <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', now()->format('Y-m-d')) }}" class="form-control @error('tanggal') is-invalid @enderror" placeholder="Masukkan Tanggal..">
                                @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="form-label col-md-3 col-form-label">Content</label>
                            <div class="col">
                                <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" placeholder="Masukkan Content.." rows="6">{{ old('content') }}</textarea>
                                @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row mb-3">
                            <label class="form-label col-md-3 col-form-label">Gambar</label>
                            <div class="col">
                                <input type="file" name="picture" id="picture" value="{{ old('picture') }}" class="form-control @error('picture') is-invalid @enderror" placeholder="Masukkan Gambar..">
                                @error('picture')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="hr-text hr-text-left">Status Galeri</div>
                        <div class="form-selectgroup form-selectgroup-boxes d-flex flex-column">
                            <label class="form-selectgroup-item flex-fill">
                                <input @if(old('active') == '1') checked @endif type="radio" name="active" value="1" class="form-selectgroup-input">
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
                                <input @if(old('active') != '1') checked @endif type="radio" name="active" value="0" class="form-selectgroup-input">
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
    <script>
        $(document).ready(function () {
            $('#title').on('keyup', function () {
                var seo = ToSeoUrl($(this).val());
                $('#seotitle').val(seo)
            })
        })

        function ToSeoUrl(url) {
            // make the url lowercase
            var encodedUrl = url.toString().toLowerCase();

            // replace & with and
            encodedUrl = encodedUrl.split(/\&+/).join("-and-")

            // remove invalid characters
            encodedUrl = encodedUrl.split(/[^a-z0-9]/).join("-");

            // remove duplicates
            encodedUrl = encodedUrl.split(/-+/).join("-");

            // trim leading & trailing characters
            encodedUrl = encodedUrl.trim('-');

            return encodedUrl;
        }
    </script>
@endpush
