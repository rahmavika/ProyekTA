@extends('landingpage.layouts.main')
@section('title', 'Tentang Kami')
@section('navTentang', 'active')
@section('content')

<section class="hero-section w-100" style="background-color: #e6f7ff;">
    <div class="row align-items-center py-5 mx-0">
        <div class="col-lg-6 text-center text-lg-start">
            <h1 class="display-5">Tentang Kami</h1>
            <p class="lead">Membangun Masa Depan dengan Material Berkualitas</p>
        </div>
        <div class="col-lg-6">
            <img src="{{ asset('storage/banner.png') }}" alt="Banner" class="img-fluid">
        </div>
    </div>
</section>
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="{{ asset('storage/tentang.jpg') }}" class="img-fluid rounded shadow" alt="Tentang Kami">
            </div>
            <div class="col-md-6">
                <h3 class="mb-3">Profil Toko Bangunan A.W. Karya Bangunan</h3>
                <p class="text-muted">
                    Kami adalah penyedia material dan peralatan bangunan terlengkap di wilayah Anda. Sejak berdiri, <strong>A.W. Karya Bangunan</strong>
                    telah melayani kebutuhan pembangunan rumah, proyek properti, dan infrastruktur dengan harga terjangkau dan kualitas terbaik.
                </p>
                <ul class="list-unstyled text-muted">
                    <li>✔ Menyediakan lebih dari 500 produk bangunan</li>
                    <li>✔ Didukung oleh tim ahli berpengalaman</li>
                    <li>✔ Mitra terpercaya kontraktor dan developer lokal</li>
                    <li>✔ Pengiriman cepat dan aman</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <h3 class="text-center mb-4">Visi & Misi Kami</h3>
        <div class="row">
            <div class="col-md-6">
                <h5>Visi</h5>
                <p class="text-muted">Menjadi toko bangunan terdepan yang terpercaya dan inovatif dalam menyediakan solusi kebutuhan pembangunan di Indonesia.</p>
            </div>
            <div class="col-md-6">
                <h5>Misi</h5>
                <ul class="text-muted">
                    <li>✔ Menyediakan produk berkualitas dengan harga terbaik</li>
                    <li>✔ Memberikan pelayanan yang ramah dan profesional</li>
                    <li>✔ Berinovasi dalam layanan dan sistem pemesanan</li>
                    <li>✔ Menjalin kemitraan jangka panjang dengan pelanggan</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="py-4 bg-light">
    <div class="container text-center">
        <a href="{{ url('/') }}" class="btn btn-outline-primary btn-lg">Kembali ke Beranda</a>
    </div>
</section>

@endsection
