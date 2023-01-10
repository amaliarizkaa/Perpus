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

                    <h1 class="text-judul-profil mt-4 lh-md">Sejarah</h1>
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img  mb-3"></div>
                            <div></div>
                </div>


                    <div class="profil col-md-20 animate-box">
                        <p class=" mt-2">
                            Perpustakaan MAN  1 Yogyakarta , sebagai sumber ilmu pengetahuan penunjang pendidikan terletak di komplek 
                            Madrasah Aliyah Negeri  1 Yogyakarta yang beralamat di Jalan C. Simanjuntak 60 Yogyakarta.
                        </p>
                        <p>Bersamaan dengan berdirinya MAN 1 Yogyakata pada tahun 1950 di JI. C. Simanjuntak 60 Yogyakarta, salah satu fasilitas yang 
                            disediakan adalah perpustakaan. Pada awalnya, perpustakaan menempati sebuah ruangan yang sekarang digunakan sebagai ruang guru. 
                            Semakin bertambahnya koleksi beraneka ragam, akhirnya perpustakaan memiliki gedung sendiri berlantai dua yang diresmikan pada 13 
                            April 1991 oleh Drs. H. Abdurrosyad selaku Kepala Kantor Wilayah Departemen Agama Daerah Istimewa Yogyakarta.
                        </p>
                        <p>Perpustakaan MAN  1 Yogyakarta, mulai menggunakan otomasi perpustakaan yaitu software CDS/ISIS pada tahun 2003. 
                            Software ini baru dipergunakan sebatas pada bagian pengolahan koleksi. Mulai tahun 2010 perpustakaan beralih 
                            menggunakan software IBRA V.4 yang meliputi pengolahan koleksi, administrasi, layanan sirkulasi, dan OPAC 
                            (Online Public Access Catalogue) secara terpadu. Pada tahun 2019 versi ini diperbaharui menjadi IBRA V.8. 
                            Pelayanan menggunakan software ini sangat efektif, proses sirkulasi dapat dilakukan dengan cepat, tepat dan 
                            terkoordinir. Penelusuran buku-buku yang dibutuhkan oleh pengguna dilakukan dengan mempergunakan komputer yang 
                            sudah terhubung dengan yang lain secara local (Local Area Network). 
                        </p>
                        <p>
                            Pada tanggal 12 Desember 2019, perpustakaan memiliki ruang tambahan yaitu di gedung SBSN lantai satu, menjadi 
                            satu dengan laboratorium dan perpustakaan terpadu, yang diresmikan oleh Menteri Agama Republik Indonesia Jenderal 
                            Purnawirawan Fachrul Razi
                        </p>
                        <p>
                            Dengan adanya penambahan ruang baru ini, maka penempatan koleksi perpustakaan dibagi menjadi 2, 
                            yaitu koleksi buku pelajaran, pengayaan, dan referensi di gedung sebelah barat, dan koleksi non 
                            fiksi dan buku penunjang di gedung perpustakaan terpadu. 
                        </p>



                    </div>

                    
                        <h1 class="text-judul-profil mt-4 lh-md">Slogan</h1>
                            <div class="fh5co_hover_news_img">
                                <div class="fh5co_news_img  mb-3"></div>
                                <div></div>
                            </div>


                            <div class="profil col-md-20 animate-box">
                                <h6 class="text-center mt-2">
                                    ENHANCE INTELLECTUALITY, CREATIVITY AND SPIRITUALITY ( Meningkatkan Intelektualitas, Kreativitas, dan Spiritualitas)
                                </h6>
                                <p>Dengan slogan ini diharapkan perpustakaan MAN 1 Yogyakarta dapat menumbuhkembangkan semangat belajar, 
                                    berkresasi dan meningkatkan ketaqwaan kepada Allah SWT.</p>

                            </div>




                            <h1 class="text-judul-profil mt-4 lh-md">Tugas dan Fungsi <br>Perpustakaan MAN 1 Yogyakarta</h1>
                            <div class="fh5co_hover_news_img">
                                <div class="fh5co_news_img  mb-3"></div>
                                <div></div>
                            </div>


                            <div class="profil col-md-20 animate-box">
                                <p>Tugas :</p>
                                <p>Perpustakaan MAN 1 Yogyakarta  mempunyai tugas memberikan pelayanan bagi siswa, guru,
                                     dan karyawan sesuai dengan tata tertib pengunjung perpustakaan.</p>

                                     <p>Fungsi</p>
                                     <dl>
                                     <li>Pusat kegiatan belajar mengajar untuk mencapai tujuan pendidikan </li>
                                        <li>Pusat penelitian sederhana yang memungkinkan para siswa mengembangkan kreatifitas dan imajinasi</li>
                                    </dl> 
                                        

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
