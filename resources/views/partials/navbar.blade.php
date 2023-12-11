<nav class="navbar fixed-top navbar-expand-xl">
    <a class="navbar-brand d-flex flex-row mx-5" href="#">
        <div class="p-2">
            <img src="{{ URL::asset('images/logo.png') }}" width="40" height="40" class="d-inline-block align-center"
                alt="">
        </div>
        <div class="navbar-title fw-bold mx-3 d-flex justify-content-center align-items-center">Perpustakaan Sekolah
        </div>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i class="fas fa-bars" style="color:#fff; font-size:28px;"></i></span>
    </button>
    <div class="collapse navbar-collapse mx-5" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex justify-content-center aling-items-center">
            <li class="nav-item mx-2 {{ request()->is('/') ? 'nav-active' : '' }}">
                <a class="nav-link" aria-current="page" href="/">Beranda</a>
            </li>
            <li class="nav-item mx-2 {{ request()->is('profil') ? 'nav-active' : '' }}">
                <a class="nav-link" href="/profil">Profil</a>
            </li>
            <li class="nav-item mx-2 {{ request()->is('katalog') ? 'nav-active' : '' }}">
                <a class="nav-link" href="/katalog">Katalog</a>
            </li>

        </ul>

    </div>
</nav>
