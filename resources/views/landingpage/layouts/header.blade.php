<header class="header-custom">

    <div class="top-bar d-flex justify-content-end align-items-center" style="background-color: #cce7ff; padding: 5px 15px;">
        <div class="header-right d-flex align-items-center">
            @if (session('name'))
                <a href="/detailpelanggan" class="me-3" style="font-size: 14px; text-decoration: none; color: #1e3f66;">
                    <i class="bi bi-person-fill me-1" style="color: #1e3f66;"></i> {{ session('name') }}
                </a>
                <form action="/logout" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-primary">
                        <i class="bi bi-power"></i> Keluar
                    </button>
                </form>
            @else
                <button class="btn btn-sm btn-primary" style="border-color: #1e3f66; background-color: #1e3f66; transition: background-color 0.3s, color 0.3s;" onclick="window.location.href='/login';">
                    <i class="bi bi-person-fill"></i> Login
                </button>
            @endif
        </div>
    </div>

    <div class="main-header">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="m-header" style="
                background: linear-gradient(to right, #d0eaff, #ffffff);
                padding: 10px 15px;
                border-radius: 4px;
            ">
                <link href="https://fonts.googleapis.com/css2?family=Marcellus&display=swap" rel="stylesheet">

                <a href="/" class="b-brand" style="text-decoration: none;">
                    <span style="
                        font-family: 'Marcellus', serif;
                        font-size: 1rem;
                        font-weight: normal;
                        color: #1e3f66;
                        letter-spacing: 2px;
                    ">
                        A.W. KARYA BANGUNAN
                    </span>
                </a>
            </div>
            <nav class="main-nav d-none d-md-block">
                <ul class="d-flex mb-0" style="list-style: none;">
                    <li><a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}">HOME</a></li>
                    <li><a href="/semuaproduk" class="nav-link {{ Request::is('semuaproduk') ? 'active' : '' }}">ALL PRODUCTS</a></li>
                    <li><a href="/tentang" class="nav-link {{ Request::is('tentang') ? 'active' : '' }}">ABOUT US</a></li>
                    <li><a href="/contactus" class="nav-link {{ Request::is('contactus') ? 'active' : '' }}">CONTACT US</a></li>
                </ul>
            </nav>

            <div class="header-icons d-flex align-items-center">
                <form action="{{ route('semuaproduk') }}" method="GET" class="d-none d-md-flex align-items-center">
                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari produk..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-sm btn-success ms-2"><i class="bi bi-search"></i></button>
                </form>

                @if(session('name'))
                    <a href="{{ url('/keranjang') }}" title="Keranjang">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                    <a href="{{ url('/riwayat-belanja') }}" title="Riwayat Belanja" class="ms-3 {{ Request::is('riwayat-belanja') ? 'active' : '' }}">
                        <i class="fas fa-history"></i>
                    </a>
                @else
                    <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                @endif
                <button class="btn ms-2 d-md-none" data-bs-toggle="modal" data-bs-target="#searchModal" style="background-color: #07582d; border-color: #07582d; color: #ffffff;">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>
    </div>
</header>

<style>
.header-custom .main-header {
    padding: 10px 0;
    background: linear-gradient(to right, #cce7ff, #ffffff);
    border-bottom: 2px solid #a3d0ff;
}

.header-custom .main-nav .nav-link {
    font-size: 14px;
    padding: 5px 10px;
    color: #1e3f66;
    transition: 0.3s;
}

.header-custom .main-nav .nav-link:hover,
.header-custom .main-nav .nav-link.active {
    color: #ffffff;
    background: linear-gradient(to right, #5dade2, #85c1e9);
    border-radius: 5px;
}

.header-custom .header-icons i {
    font-size: 18px;
    color: #1e3f66;
}

.header-custom .btn {
    font-size: 13px;
    padding: 6px 10px;
    background-color: #5dade2;
    border-color: #5dade2;
    color: white;
}

.header-custom .btn:hover {
    background-color: #3498db;
    border-color: #3498db;
}
.offcanvas {
    background-color: #f8f9fa;
}
.offcanvas .nav-link {
    padding: 10px;
    border-radius: 5px;
    transition: 0.3s;
    color: #1e3f66;
}
.offcanvas .nav-link:hover {
    background-color: #d6eaf8;
    color: #1e3f66;
}
.offcanvas .nav-link.active {
    background-color: #5dade2;
    color: white;
}
.offcanvas-header {
    background: linear-gradient(to right, #5dade2, #85c1e9);
    color: white;
}
.top-bar {
    font-size: 14px;
    padding: 5px 15px;
    background-color: #cce7ff;
    border-bottom: 1px solid #a3d0ff;
}
.top-bar .btn-outline-primary {
    color: #1e3f66;
    border-color: #1e3f66;
}
.top-bar .btn-outline-primary:hover {
    background-color: #1e3f66;
    color: white;
}

</style>
