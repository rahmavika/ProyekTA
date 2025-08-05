@extends('landingpage.layouts.main')
@section('title', 'Kontak Kami')
@section('content')

<section class="hero-wrap hero-wrap-0 js-fullheight" style="background-color: #e6f7ff; background-image: url('{{ asset('storage/banner.png') }}'); height: 500px;">

    <div class="overlay" style="background-color: rgba(0, 0, 50, 0.5);"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center" style="height: 500px;">
        <div class="col-md-9 ftco-animate pb-5 text-center text-white">
          <p class="breadcrumbs">
            <span class="mr-2"><a href="/" class="text-dark">Home <i class="fa fa-chevron-right"></i></a></span>
            <span>Contact Us</span>
          </p>
          <h1 class="mb-0 bread">Hubungi Kami</h1>
        </div>
      </div>
    </div>
  </section>
  <section>
<div class="container my-5">
    <div class="row">
        <!-- Informasi Kontak -->
        <div class="col-md-6">
            <h4>Informasi Toko</h4>
            <p><strong>Alamat:</strong> Jl. Mesjid, Sungai Pua,<br>Jl. Mesjid, Sungai Pua,<br>
                Kec. Sungai Pua, Kab. Agam </p>
            <p><strong>Telepon:</strong> (0752) 691374</p>
            <p><strong>Jam Operasional:</strong> Senin - Sabtu, 08.00 - 17.00</p>
        </div>

        <!-- Formulir Kontak -->
        <div class="col-md-6">
            <h4>Kirim Pesan</h4>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('contact_us.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="pertanyaan" class="form-label">Pertanyaan</label>
                    <textarea class="form-control" id="pertanyaan" name="pertanyaan" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>
    </div>
</div>
  </section>

{{-- FAQ Section --}}
@if($faqs->count())
<div class="container my-5 d-flex justify-content-center">
    <div class="w-100" style="max-width: 700px;">
        <h4 class="mb-4 text-center">Pertanyaan Umum (FAQ)</h4>
        <div class="accordion" id="faqAccordion">
            @foreach ($faqs as $index => $faq)
            <div class="accordion-item mb-2 border rounded" style="border-radius: 10px; overflow: hidden;">
                <h2 class="accordion-header" id="heading{{ $index }}">
                    <button
                        class="accordion-button collapsed d-flex justify-content-between align-items-center"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapse{{ $index }}"
                        aria-expanded="false"
                        aria-controls="collapse{{ $index }}"
                        style="
                            width: 100%;
                            background-color: #f8f9fa;
                            border: 1px solid #dee2e6;
                            border-radius: 8px;
                            padding: 15px;
                            font-weight: bold;
                            font-size: 16px;
                            box-shadow: none;
                            color: #000;
                        ">
                        <span class="text-start w-100" style="text-align: left;">
                            {{ $faq->pertanyaan }}
                        </span>
                    </button>
                </h2>
                <div class="accordion-item mb-3 border-0">
                    <!-- header di sini -->
                    <div
                        id="collapse{{ $index }}"
                        class="accordion-collapse collapse"
                        aria-labelledby="heading{{ $index }}"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body" style="background-color: #fff; border: 1px solid #dee2e6; border-top: none; border-radius: 0 0 8px 8px; padding: 15px 20px; color: #6c757d;">
                            {{ $faq->jawaban }}
                        </div>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
    </div>
</div>
@else
<div class="container my-5">
    <p class="text-center text-muted">Belum ada FAQ yang tersedia.</p>
</div>
@endif


@endsection
