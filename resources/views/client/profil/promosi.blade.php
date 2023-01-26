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

                    <h1 class="text-judul-profil mt-4 lh-md">Promosi</h1>
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_news_img  mb-3"></div>
                        <div></div>
                    </div>


                    <div class="profil-list col-md-20 animate-box">
                        <p>Promosi perpustakaan merupakan aktivitas memperkenalkan Koleksi, sistem, dan layanan perpustakaan
                            serta untuk mengembangkan minat baca.
                            Perpustakaan MAN 1 Yogyakarta memiliki beberapa kegiatan untuk promosi, antara lain</p>
                        <ul class="none-dot">
                            <li>
                                <h6>Display buku baru</h6>
                                Buku-buku baru yang telah diolah, dipajang pada rak display buku baru setiap hari senin
                                selama satu minggu.
                                Pada hari sabtu buku-buku tersebut diperkenankan dipinjam oleh pemustaka.
                            </li>
                            <li class="pt-3">
                                <h6>Pemilihan King dan Queen of Readers.</h6>
                                Reward bagi peminjam teraktif diberikan setiap satu tahun sekali dengan kategori putra dan
                                putri yang diberi
                                predikat King dan Queen of Readers.
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
