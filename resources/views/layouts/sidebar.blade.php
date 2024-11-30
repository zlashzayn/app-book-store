<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
        <img src="{{ asset('RuangAdmin-master') }}/img/logo/logo2.png">
        </div>
        <div class="sidebar-brand-text mx-3">Bookstore</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Features
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('book.index') }}">
        <i class="fas fa-fw fa-palette"></i>
        <span>Buku</span>
        </a>
    </li>
    @auth
        <li class="nav-item">
            <a class="nav-link" href="{{ route('genre.index') }}">
            <i class="fas fa-fw fa-palette"></i>
            <span>Genre Buku</span>
            </a>
        </li>
    @endauth
    <hr class="sidebar-divider">
    <div class="version" id="version-ruangadmin"></div>
</ul>