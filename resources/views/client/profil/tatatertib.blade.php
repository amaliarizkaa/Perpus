@extends('layouts.main')

@section('main-sec')
    <div class="container ">
        <br> <br> <br>
        <a href="/" class="buttonback" > <img class="back-katalog mt-2 " src="{{ URL::asset('images/previous.png') }}"alt=""> </a>
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="head-news pt-2 pb-1">Profil Perpustakaan</div>
                </div>

                {{-- judul --}}

                <div class="content">

                    <h1 class="text-judul-profil mt-4 lh-md">Tata Tertib Pengunjung <br>
                         Perpustakaan MAN 1 Yogyakarta</h1>
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img  mb-3"></div>
                            <div></div>
                </div>


                    <div class="profil-list col-md-20 animate-box">
                        <ol class="tatatertib">
                            <li>Berpakalan rapi tanpa memakai jakat dan topi.</li>
                            <li>Bersikap sopan, menjaga ketenangan, ketertiban dan kebersihan.</li>
                            <li>Setiap pengunjung wajib menginput data pengunjung.</li>
                            <li>Alas kaki dilepas, diletakkan di rak luar perpustakaan.</li>
                            <li>Dilarang membawa makan dan minuman. </li>
                            <li>Pemilik kartu anggota dapat bebas memilih buku yang dikehendaki</li>
                            <li>Bagi yang tidak memiliki kartu hanya bisa membaca di tempat, tidak bisa 
                                meminjam dibawa pulang.</li>
                            <li>Selain civitas MAN Yogyakarta 1, harap melapor kepada petugas sebelum 
                                memanfaatkan fasilitas perpustakaan.</li>
                            <li>Dilarang merusak koleksi (mencoret, menggunting, menyobek).</li>
                            <li>Buku referensi tidak dapat dibawa pulang, tetapi boleh difotokopi 
                                dan langsung dikembalikan. </li>
                            <li>Buku referensi yang digunakan untuk pembelajaran dikelas, penanggungjawabnya 
                                adalah guru pengampu mata pelajaran. </li>
                            <li>Ruang perpustakaan dapat digunakan untuk pembelajaran, pembinaan siswa, 
                                dan rapat dengan ketentuan:</li>
                                <ol type="a">
                                    <li>Penanggungjawab acara melakukan konfirmasi jadwal minimal 1 jam sebelumnya. </li>
                                    <li>Berlangsungnya acara sesuai jam layanan perpustakaan.</li>
                                </ol>
                            <li>Pembelajaran/pembinaan siswa di perpustakaan, guru ikut bertanggung jawab atas 
                                kerusakan/kehilangan koleksi/perabot perpustakaan. </li>
                            <li>Waktu layanan perpustakaan: Senin s/d Jum’at pukul 07.00 s/d 16.00 WIB.</li>
                        </ol>



                    </div>

                    
                                        

                            


                </div>
                {{-- content profil --}}

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
