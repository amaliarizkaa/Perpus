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

                    <h1 class="text-judul-detail mt-4 lh-md">{{ $artikel->judul }}</h1>

                    <div class="informasi mx-auto">
                        <div href="single.html" class="time-news mx-auto d-block text-center pb-2 md-3">

                            <ion-icon name="Admin"></ion-icon> {{ $artikel->users->name }}
                            <ion-icon name="Waktu Upload"></ion-icon>{{ date('d M Y', strtotime($artikel->created_at)) }}
                            {{-- jumlah view artikel --}}
                            <ion-icon name="Views"></ion-icon>{{ $artikel->views }}
                        </div>
                    </div>

                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_news_img  mb-3"><img class="pic-detail mx-auto d-block"
                                src="{{ asset('uploads/' . $artikel->gambar_artikel) }}" alt="" /></div>
                        <div></div>
                    </div>


                    <div class="col-md-20 animate-box">
                        <p class="keterangan-detail mt-2">
                            {{-- paragraf1 --}}

                            {{ strip_tags(preg_replace('/&#?[a-z0-9]{2,8};/i', '', $artikel->body)) }}

                        </p>



                    </div>
                </div>
                {{-- content detail --}}

            </div>

            {{-- kanan --}}

            <div class="col-md-3 animate-box ">
                <div>
                    <div class="head-side mt-3 pb-1 fw-semibold ">Artikel Populer</div>
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
                                <div class="time-news "> {{ date('d-M-y', strtotime($item->created_at)) }} </div>
                                <a href="{{ url('/artikel/' . $item->slug) }}" class="link-side">Lihat</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
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
