@extends('layouts.main')

@section('main-sec')
    <div class="container ">
        <br> <br> <br>
        <a href="/" class="buttonback"> <img class="back-katalog mt-2 "
                src="{{ URL::asset('images/previous.png') }}"alt=""> </a>
        <div class="row mx-0">
            <div class="col-md-8" data-animate-effect="fadeInLeft">
                <div>
                    <div class="head-news pt-2 pb-1">Berita Perpustakaan </div>
                </div>

                {{-- content detail --}}

                <div class="content">
                    <h1 class="text-judul-detail mt-4 lh-md">{{ $berita->judul }}</h1>
                    <div class="informasi mx-auto">
                        <div href="single.html" class="time-news mx-auto d-block text-center pb-2 md-3">
                            <ion-icon name="person"></ion-icon> {{ $berita->users->name }}
                            <ion-icon name="time"></ion-icon>{{ date('d M Y', strtotime($berita->created_at)) }}
                            {{-- jumlah view artikel --}}
                            <ion-icon name="eye"></ion-icon>{{ $berita->views }}
                            {{--  --}}
                        </div>
                    </div>
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_news_img  mb-3"><img class="pic-detail mx-auto d-block"
                                src="{{ asset('uploads/' . $berita->gambar_berita) }}" alt="" /></div>
                        <div></div>
                    </div>
                    <div class="col-md-20 animate-box">
                        <p class="keterangan-detail mt-2">
                            {{-- paragraf1 --}}
                            {{ strip_tags(preg_replace('/&#?[a-z0-9]{2,8};/i', '', $berita->body)) }}
                        </p>
                    </div>
                </div>
                {{-- content detail --}}
            </div>
            {{-- kanan --}}

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
