@extends('layouts.main')

@section('main-sec')
    <div class="container ">
        <br> <br> <br>
        <a href="/" class="buttonback"> <img class="back-katalog mt-2 "
                src="{{ URL::asset('images/previous.png') }}"alt=""> </a>
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="head-news pt-2 pb-1">Profil Perpustakaan</div>
                </div>

                {{-- judul --}}

                <div class="content">

                    <h1 class="text-judul-profil mt-4 lh-md">Prestasi</h1>
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_news_img  mb-3"></div>
                        <div></div>
                    </div>


                    <div class="profil-list col-md-20 animate-box">
                        <ul>
                            <li>Juara Harapan I (ranking 4 dari 10 besar) Lomba Perpustakaan SLTA (SMA/SMK/MA) Negeri/Swasta
                                Tingkat Nasional
                            </li>
                            <li>Tahun 2015 Juara 1 Tingkat Provinsi DIY Lomba Perpustakaan Sekolah Tingkat SLTA
                                (SMA/SMK/MA)
                                Negeri/Swasta Tahun 2015</li>
                            <li>Terakreditasi "A" oleh Perpustakaan Nasional RI dengan Nomor 05/1/ee/VIII.2015 Juara III
                                Lomba Perpustakaan
                                Sekolah Se-Kota Yogyakarta Tahun 2010 Tingkat SLTA (SMA/SMK/MA) yangdiselenggarakan Kantor
                                Arsip dan
                                Perpustakaan Daerah Kota Yogyakarta.</li>
                            <li>Perpustakaan MAN 1 Yogyakarta Meningkatkan Intelektualitas, Kreatifitas, dan Spiritualitas.
                            </li>
                        </ul>
                    </div>
                </div>
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
                                <div class="time-news "> {{ date('d M Y', strtotime($item->created_at)) }} </div>
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
