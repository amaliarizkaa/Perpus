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
                    <h1 class="text-judul-profil mt-4 lh-md">Layanan</h1>
                    <div class="profil-list col-md-20 animate-box">
                        <ul class="none-dot">
                            <li>
                                <h6>Layanan Sirkulasi</h6>
                                Layanan sirkulasi adalah kegiatan transaksi peminjaman, pengembalian koleksi,
                                dan perpanjangan waktu pinjam bahan pustaka. Selain itu melayani pembuatan
                                kartu anggota perpustakaan, bahan pustaka, dan melayani Surat Keterangan Bebas
                                Pustaka untuk keperluan mutasi pegawai, pensiun, pindah sekolah, kenaikan kelas, dan
                                pengambilan ijazah.
                            </li>

                            <li class="pt-3">
                                <h6>Layanan Referensi</h6>
                                Layanan referensi adalah layanan rujukan bahan pustaka yang hanya bisa dibaca ditempat.
                                <p>Koleksi pada layanan referensi meliputi kamus, ensiklopedi, altas, buku tahunan,
                                    undang-undang, dll. Selain koleksi referensi tersebut perpustakaan juga melayankan
                                    koleksi khusus berupa karya ilmiah, kliping, dan terbitan berkala
                                    (surat kabar, majalah, dan jurnal).</p>
                            </li>

                            <li class="pt-1">
                                <h6>Layanan audio-visual </h6>
                                Layanan audio visual digunakan untuk kegiatan pembelajaran atau rapat.
                            </li>

                            <li class="pt-3">
                                <h6>OPAC (Online Public Access Catalog) </h6>
                                OPAC merupakan katalog online sebagai sarana penelusuran koleksi perpustakaan.
                                Perpustakaan MAN 1 Yogyakarta menyediakan 2 komputer khusus untuk OPAC yang berada
                                di depan pintu masuk perpustakaan barat dan timur.
                            </li>

                            <li class="pt-3">
                                <h6>Layanan e-Book</h6>
                                Layanan e-Book di Perpustakaan MAN Yogyakarta I terdiri dari e book tentang buku-buku
                                pelajaran,
                                e-book tentang budaya, serta e-book fiksi maupun non fiksi. Layanan e-Book ini dapat diakses
                                melalui local host "PERPUS ONLINE@PERPUSTAKAAN DIGITAL" dalam lingkungan madrasah.
                            </li>
                            <li class="pt-3">
                                <h6>Layanan Pengembangan Minat Baca</h6>
                                Kegiatan layananan pengembangan minat baca di Perpustakaan MAN Yogyakarta I diselenggarakan
                                setiap memperingati hari lahir perpustakaan. Berbagai kegiatan diselenggarakan untuk
                                meningkatkan intensitas siswa dalam membaca dan memanfaatkan koleksi perpustakaan.
                                Adapun kegiatan yang pernah terlaksana antara lain, lomba sesorah (pidato bahasa Jawa)
                                dan geguritan (puisi bahasa Jawa), lomba resensi buku, lomba pembuatan majalah dinding dan
                                kliping yang materinya. berasal dari surat kabar milik perpustakaan dengan subyek yang sudah
                                ditentukan.
                            </li>

                            <li class="pt-3">
                                <h6>Learning Park</h6>
                                Learning park menjadi satu dengan Angkringan Buku yang dilengkapi dengan hotspot area.
                                Pemustaka dapat memanfaatkan fasilitas perpustakaan di luar gedung untuk membaca,
                                berdiskusi, dan free wi-fi.
                            </li>

                            <li class="pt-3">
                                <h6>Angkringan Buku</h6>
                                Angkringan identik dengan tempat sederhana dan santal untuk menikmati. makanan dan
                                minuman yang dijual dengan harga ekonomis di Yogyakarta. Perpustakaan MAN 1 Yogyakarta
                                mengadopsi dan menjadikan icon angkringan yang dimodifikasi sehingga dapat menjadi display
                                buku dan dinamai Angkringan Buku Perpustakaan MAN 1 Yogyakarta. <br>
                                Layanan unggulan yang menjadi icon Perpustakaan MAN 1 Yogyakarta ini terletak di depan
                                perpustakaan
                                yang menjadikan pemustaka lebih mudah dalam memenuhi kebutuhan informasi, khususnya terbitan
                                daerah Yogyakarta,
                                koleksi terbitan berkala, koleksi yang bersifat hiburan dan bacaan ringan. Koleksi terbitan
                                berkala yang disediakan antara lain,
                                surat kabar, majalah, dan tabloid
                            </li>

                            <li class="pt-3">
                                <h6>Layanan Kitab Klasik</h6>
                                Salah satu kelebihan Perpustakaan MAN 1 Yogyakarta adalah memiliki koleksi kitab klasik yang
                                terdapat di Islamic Heritage Corner.
                                Kitab-kitab klasik berbahasa dan beraksara Arab tanpa harakat, yang berisi tentang tafsir
                                Quran, hadits, fiqih, akhlak, sejarah Islam,
                                dan Bahasa Arab.lsi dari kitab-kitab tersebut hanya orang tertentu yang dapat membaca dan
                                memahaminya. Dengan kondisi tersebut mendorong
                                perpustakaan membuat program unggulan berupa kajian kitab klasik, dengan harapan koleksi
                                kitab klasik dapat bermanfaat bagi pemustaka
                                khususnya, dan umat Islam pada umumnya.
                            </li>

                            <li class="pt-3">
                                <h6>Layanan Perpustakaan Digital</h6>
                                Penerapan teknologi informasi (TI) saat ini telah menyebar hampir di semua bidang tak
                                terkecuali di perpustakaan.
                                Teknologi informasi dan komunikasi atau information and communication technology (ICT) telah
                                membawa perubahan dalam
                                berbagai sektor, termasuk dunia perpustakaan. Pemanfaatan ICT sebagai sarana dalam
                                meningkatkan kualitas layanan dan
                                operasional telah membawa perubahan yang besar. Perkembangan dari penerapan itu dapat diukur
                                dengan telah diterapkannya s
                                istem informasi manajemen (SIM) perpustakaan dan perpustakaan digital (digital library) yang
                                memiliki keunggulan dalam
                                kecepatan akses karena berorientasi ke data digital dan jaringan komputer atau internet.
                                Perpustakaan digital memungkinan
                                akses dari mana saja, sehingga jarak bukan lagi menjadi penghalang untuk mendapatkan
                                informasi melalui perpustakaan digital. <br>
                                Perpustakaan Digital MAN 1 Yogyakarta bekerjasama dengan CV. Puncak Jaya (KUBUKU) dan
                                E-library Erlangga. Layanan ini dapat diakses
                                melalui link berikut. <a class="kubuku"
                                    href="https://kubuku.id/download/perpustakaan-mansa-yogyakarta/"
                                    target="_blank">Kubuku</a>
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
