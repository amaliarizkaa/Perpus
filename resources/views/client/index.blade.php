@extends('layouts.main')

@section('main-sec')


    <div class="container mt-5 ">

        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="head-news mt-4  pt-4 pb-1">Berita Perpustakaan </div>
                </div>
                @foreach ($artikel as $item)
                    {{-- card berita --}}
                    <div class="container">
                        <div class="row pb-4 mt-3">
                            <div class="col-md-5">
                                <div class="fh5co_hover_news_img">
                                    <div class="fh5co_news_img mb-3"><img class="img-fluid-post"
                                            src="{{ asset('uploads/' . $item->gambar_artikel) }}" alt="" />
                                    </div>
                                    <div></div>
                                </div>
                            </div>

                            <div class="col-md-7 animate-box">
                                <a href="{{ url('/artikel/' . $item->slug) }}" class="text-judul ">{{ $item->judul }}</a>
                                <br>

                                <a href="{{ url('/artikel/' . $item->slug) }}" class="time-news mt-2 py-3">
                                    {{ $item->users->name }} -
                                    {{ date('d-M-y', strtotime($item->created_at)) }} </a>
                                <div class="keterangan mt-2">

                                    {{ strip_tags(preg_replace('/&#?[a-z0-9]{2,8};/i', '', $item->body)) }}
                                </div>
                                <button type="button" class="all btn btn-outline-success mt-2"
                                    style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"><a
                                        class="btn-detail"
                                        href="{{ url('/artikel/' . $item->slug) }}">Selengkapnya</a></button>
                            </div>
                        </div>
                    </div>
                    {{-- card berita --}}
                @endforeach
            </div>

            {{-- kanan --}}

            <div class="col-md-3 animate-box ">
                <div>
                    <div class="head-side mt-5 pb-1 fw-semibold ">Artikel Populer</div>
                </div>
                @if ($post_populer)
                    @foreach ($post_populer as $item)
                        <div class="row pb-3 pt-2">
                            <div class="col-5 align-self-center">
                                <img src="{{ asset('uploads/' . $item->gambar_artikel) }}" alt="img"
                                    class="img-side-news" />
                            </div>
                            <div class="col-7 paddding">
                                <a href="{{ url('/artikel/' . $item->slug) }}" class="text-decoration-none">
                                    <div class="ket-side ">{{ $item->judul }}</div>
                                </a>
                                <div class="time-news pt-1"> {{ date('d-M-y', strtotime($item->created_at)) }} </div>
                                <a href="{{ url('/artikel/' . $item->slug) }}" class="link-side">Lihat</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            {{ $artikel->links() }}
        </div>
    </div>
    @yield('footer')

    <!-- Bootstrap core JavaScript
                                                                                                                                                                                                                                                                                                                                                                                                                                                            ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script>
        window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
    <script src="../../../../assets/js/vendor/holder.min.js"></script>
@endsection
