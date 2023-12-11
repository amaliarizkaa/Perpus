<div class="navbar fixed-top">

    <!-- Navbar logo -->
    <div class="nav-header">
        <div class="nav-logo  mb-4s mx-5">
            <a href="#">
                <img class="logo" src="{{ URL::asset('images/cropped-logo 1.png') }}" width="100px" alt="logo">
            </a>
            <div class="Webnama text-center pt-3"> Perpustakaan Sekolah</div>
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
            <li class="nav-item ">
                <a class="nav-link pill-1 {{ Request::is('/') ? 'active' : '' }} fs-6 me-3" href="/profil">Profil</a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('katalog') ? 'active' : '' }} fs-6 me-3" href="/katalog">Katalog
                    Buku</a>
            </li>
        </ul>


    </div>
</div>
