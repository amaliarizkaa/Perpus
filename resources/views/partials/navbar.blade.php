<div class="navbar fixed-top">

    <!-- Navbar logo -->
    <div class="nav-header">
        <div class="nav-logo  mb-4s mx-5">
            <a href="#">
                <img class="logoman" src="{{ URL::asset('images/cropped-logo 1.png') }}" width="100px" alt="logo">
            </a>
            <div class="Webnama text-center pt-3"> Perpustakaan MAN 1 Yogyakarta</div>
        </div>

    </div>




    <!-- responsive navbar toggle button -->
    <input type="checkbox" id="nav-check">
    <div class="nav-btn">
        <label for="nav-check">
            <span></span>
            <span></span>
            <span></span>
        </label>
    </div>


    <!-- Navbar items -->

    <div class="nav-links ">
        <ul class="nav  ">

            <li class="nav-item ">
                <a class="nav-link pill-1 {{ Request::is('/') ? 'active' : '' }} fs-6 me-3" href="/">Beranda</a>
            </li>

            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Profil
                </a>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item" href="/profil">Profil Perpustakaan</a></li>
                    <li><a class="dropdown-item" href="/visimisi">Visi & Misi</a></li>
                    <li><a class="dropdown-item" href="/prestasi">Prestasi</a></li>
                    <li><a class="dropdown-item" href="/layanan">Layanan</a></li>
                    <li><a class="dropdown-item" href="/fasilitas">Fasilitas</a></li>
                    <li><a class="dropdown-item" href="/promosi">Promosi</a></li>
                    <li><a class="dropdown-item" href="/tatatertib">Tata Tertib</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('katalog') ? 'active' : '' }} fs-6 me-3" href="/katalog">Katalog
                    Perpustakaan</a>
            </li>
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Karya
                </a>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item" href="/karya-buku">Karya Buku</a></li>
                    <li><a class="dropdown-item" href="/karya-ilmiah">Karya Tulis Ilmiah</a></li>
                    <li><a class="dropdown-item" href="/karya-publikasi">Karya Tulis Terpublikasi</a></li>

                </ul>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('kliping') ? 'active' : '' }} fs-6 me-3" href="/kliping">Kliping</a>
            </li>

            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Aplikasi
                </a>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item"
                            href="https://kubuku.id/download/perpustakaan-mansa-yogyakarta/">Kubuku</a></li>
                    <li><a class="dropdown-item" href="#">E-Libary<br>Erlangga</a></li>

            </li>



        </ul>


    </div>
</div>
