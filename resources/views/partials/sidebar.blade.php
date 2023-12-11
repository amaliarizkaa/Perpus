<div class="sidebar">
    <div class="logo-details">
        <i class='bx bxs-user'></i>
        <span class="logo_name">{{ Auth::user()->name }}</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="/dashboard">
                <i class='bx bx-grid-alt'></i>
                <span class="link_name">Beranda Admin</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="/dashboard">Beranda Admin</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="/berita">
                    <i class='bx bx-book-alt'></i>
                    <span class="link_name">Kelola Berita</span>
                </a>
            </div>
        </li>
        <li>
            <div class="iocn-link">
                <a href="/admin/profil">
                    <i class='bx bx-collection'></i>
                    <span class="link_name">Kelola Profil</span>
                </a>

            </div>
        </li>
        <li>
            <div class="iocn-link">
                <a href="/buku">
                    <i class='bx bx-collection'></i>
                    <span class="link_name">Kelola Katalog</span>
                </a>
            </div>
        </li>
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
                </div>
                <div class="name-job">
                    <div class="profile_name">Log Out</div>
                </div>
                <a href="/logout"><i class='bx bx-log-out'></i></a>
            </div>
        </li>
    </ul>
</div>
