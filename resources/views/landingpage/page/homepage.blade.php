@extends('landingpage.layouts.main')
@section('title', 'Beranda')
@section('navAdm', 'active')
@section('content')

<!-- HERO SECTION -->
<section class="hero-section w-100" style="background-color: #e6f7ff;">
    <div class="row align-items-center py-5 mx-0">
        <div class="col-lg-6 text-center text-lg-start">
            <h1 class="display-4 fw-bold">Selamat Datang di<br><span class="text-primary">A.W. Karya Bangunan</span></h1>
            <p class="lead text-muted">Solusi lengkap kebutuhan material dan peralatan bangunan Anda.</p>
            <a href="#kategori" class="btn btn-primary btn-lg rounded-pill px-4 mt-3">Lihat Kategori</a>
        </div>
        <div class="col-lg-6">
            <img src="{{ asset('storage/banner.png') }}" alt="Banner" class="img-fluid">
        </div>
    </div>
</section>

<!-- KATEGORI MATERIAL BANGUNAN -->
<section id="kategori" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Kategori Material Bangunan</h2>
        <div class="row g-4">
            @php
                $kategori = [
                    ['img' => 'semen.png', 'nama' => 'Material Struktural', 'deskripsi' => 'Contohnya semen, pasir, besi beton, dan batu bata.'],
                    ['img' => 'finishing.jpg', 'nama' => 'Material Finishing', 'deskripsi' => 'Contohnya cat, keramik, plesteran, dan granit.'],
                    ['img' => 'atap.jpg', 'nama' => 'Material Atap', 'deskripsi' => 'Seperti genteng, seng, dan talang air.'],
                    ['img' => 'plumbing.jpg', 'nama' => 'Plumbing & Sanitasi', 'deskripsi' => 'Pipa, keran, dan saluran air untuk sistem sanitasi.'],
                    ['img' => 'listrik.jpg', 'nama' => 'Material Listrik', 'deskripsi' => 'Kabel, saklar, stop kontak, dan lampu.'],
                    ['img' => 'pintu.jpg', 'nama' => 'Pintu & Jendela', 'deskripsi' => 'Daun pintu, engsel, kaca jendela dan rel.'],
                    ['img' => 'perlengkapan.jpg', 'nama' => 'Perlengkapan Bangunan', 'deskripsi' => 'Seperti paku, lem, pengunci dan lainnya.'],
                    ['img' => 'peralatan.jpg', 'nama' => 'Peralatan Bangunan', 'deskripsi' => 'Palu, sekop, tang, gergaji dan lainnya.'],
                ];
            @endphp
            @foreach($kategori as $item)
                <div class="col-md-3 col-sm-6">
                    <div class="card shadow-sm h-100 border-0">
                        <img src="{{ asset('storage/' . $item['img']) }}"
                             class="card-img-top"
                             alt="{{ $item['nama'] }}"
                             style="height: 180px; width: 100%; object-fit: cover; border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item['nama'] }}</h5>
                            <p class="card-text">{{ $item['deskripsi'] }}</p>
                            <a href="#" class="btn btn-outline-primary btn-sm">Lihat Produk</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- LOKASI TOKO -->
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
