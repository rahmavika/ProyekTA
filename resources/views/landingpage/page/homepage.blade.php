@extends('landingpage.layouts.main')
@section('title', 'Beranda')
@section('navAdm', 'active')
@section('content')

<section class="hero-section w-100" style="background-color: #e6f7ff;">
    <div class="row align-items-center py-5 mx-0">
        <div class="col-lg-6 text-center text-lg-start">
            <h1 class="display-4 fw-bold">Selamat Datang di<br><span class="text-primary">A.W. Karya Bangunan</span></h1>
            <p class="lead text-muted">Solusi lengkap kebutuhan material dan peralatan bangunan Anda.</p>
            <a href="/semuaproduk" class="btn btn-primary btn-lg rounded-pill px-4 mt-3">Belanja Sekarang</a>
        </div>
        <div class="col-lg-6">
            <img src="{{ asset('storage/banner.png') }}" alt="Banner" class="img-fluid">
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Layanan Kami</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card shadow-sm h-100 border-0 text-center p-4">
                    <i class="bi bi-truck fs-1 text-primary"></i>
                    <h5 class="mt-3">Pengiriman Cepat</h5>
                    <p>Kami menyediakan layanan pengiriman cepat langsung ke lokasi proyek Anda.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm h-100 border-0 text-center p-4">
                    <i class="bi bi-person-lines-fill fs-1 text-primary"></i>
                    <h5 class="mt-3">Konsultasi Gratis</h5>
                    <p>Dapatkan saran dan solusi terbaik untuk kebutuhan bangunan Anda dari tim kami.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm h-100 border-0 text-center p-4">
                    <i class="bi bi-credit-card fs-1 text-primary"></i>
                    <h5 class="mt-3">Pembayaran Mudah</h5>
                    <p>Berbagai metode pembayaran tersedia untuk kenyamanan transaksi Anda.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Lokasi Toko Kami</h2>
        <div class="row">
            <div class="col-md-6 mb-3">
                <h5>Alamat:</h5>
                <p>
                    Toko Bangunan A.W. Karya Bangunan<br>
                    Jl. Mesjid, Sungai Pua,<br>
                    Kec. Sungai Pua, Kab. Agam<br>
                    Sumatera Barat 26181<br>
                    Telp: (0752) 691374
                </p>
            </div>
            <div class="col-md-6">
                <div class="shadow rounded overflow-hidden" style="height: 300px;">
                    <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d249.3587790546019!2d100.40926834651084!3d-0.35793679118343125!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd53991b6bf141f%3A0x429d3ff91fa3850b!2sTB.%20A.W.%20Karya%20Bangunan!5e0!3m2!1sid!2sid!4v1754235724854!5m2!1sid!2sid"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
