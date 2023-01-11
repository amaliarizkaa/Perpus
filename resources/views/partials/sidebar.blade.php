<div class="sidebar">
    <div class="logo-details">
        <i class='bx bxs-user'></i>
        <span class="logo_name">{{ Auth::user()->name }}</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="/dashboard">
                <i class='bx bx-grid-alt'></i>
                <span class="link_name">Dashboard</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="/dashboard">Dashboard</a></li>
            </ul>
        </li>

        <li>
            <div class="iocn-link">
                <a href="/artikel">
                    <i class='bx bx-book-alt'></i>
                    <span class="link_name">Artikel</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="/artikel">Artikel</a></li>
                <li><a href="/kategoriart">Kategori</a></li>
            </ul>
        </li>

        <li>
            <div class="iocn-link">
                <a href="/buku">
                    <i class='bx bx-collection'></i>
                    <span class="link_name">Koleksi</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="/buku">Koleksi</a></li>
                <li><a href="/buku/kategoribuk">Jenis Koleksi</a></li>
            </ul>
        </li>

        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-collection'></i>
                    <span class="link_name">Karya</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Karya</a></li>
                <li><a href="/admin/karya-buku">Karya Buku</a></li>
                <li><a href="/admin/karya-ilmiah">Karya Tulis Ilmiah</a></li>
                <li><a href="/admin/karya-publikasi">Karya Tulis Terpublikasi</a></li>
            </ul>
        </li>

        <li>
            <div class="iocn-link">
                <a href="/admin/klipping">
                    <i class='bx bx-collection'></i>
                    <span class="link_name">Kliping</span>
                </a>

            </div>

        </li>

        {{-- <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-plug'></i>
                    <span class="link_name">Pengaturan</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="/slide">Pengaturan</a></li>
                <li><a href="/admin/daftar-banner">Slide Banner</a></li>
            </ul>
        </li> --}}
        <li>
            <a href="/admin">
                <i class='bx bx-cog'></i>
                <span class="link_name">Kelola Admin</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="/admin">Kelola Admin</a></li>
            </ul>
        </li>
        <li>
            <div class="profile-details">
                <div class="profile-content"><a href="/logout">
                        <img src="{{ URL::asset('images/1.png') }}" alt="profileImg"></a>
                </div>
                <div class="name-job">
                    <div class="profile_name">Perpustakaan</div>
                    <div class="job">MAN 1 Yogyakarta</div>
                </div>
                <a href="/logout"><i class='bx bx-log-out'></i></a>
            </div>
        </li>
    </ul>
</div>
