@extends('landingpage.layouts.main')

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
<section class="py-5" style="background-color: #f7f9fb;">
  <div class="container">
    <div class="row justify-content-center g-4">

      <div class="col-lg-6">
        <div class="bg-white p-4 rounded-4 shadow-sm h-100">
          <h4 class="fw-bold text-dark mb-4 border-bottom pb-2">Kirim Pertanyaan</h4>

          @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
          @endif

          <form action="{{ route('contact_us.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label class="form-label fw-semibold">Nama</label>
              <input type="text" name="nama" class="form-control rounded-3" placeholder="Masukkan nama Anda" required>
            </div>
            <div class="mb-3">
              <label class="form-label fw-semibold">Email</label>
              <input type="email" name="email" class="form-control rounded-3" placeholder="Contoh: email@example.com" required>
            </div>
            <div class="mb-3">
              <label class="form-label fw-semibold">Pertanyaan</label>
              <textarea name="pertanyaan" rows="4" class="form-control rounded-3" placeholder="Tuliskan pertanyaan Anda..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary px-4 rounded-pill">Kirim Pertanyaan</button>
          </form>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="bg-white p-4 rounded-4 shadow-sm h-100">
          <h4 class="fw-bold text-dark mb-4 border-bottom pb-2">Pertanyaan Umum (FAQ)</h4>

          @if($faqs->count())
            <div class="accordion" id="faqAccordion">
              @foreach ($faqs as $index => $faq)
                <div class="accordion-item mb-2 border rounded">
                  <h2 class="accordion-header" id="heading{{ $index }}">
                    <button class="accordion-button collapsed fw-bold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="false" aria-controls="collapse{{ $index }}">
                      {{ $faq->pertanyaan }}
                    </button>
                  </h2>
                  <div id="collapse{{ $index }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $index }}" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                      {{ $faq->jawaban ?? '-' }}
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          @else
            <p class="text-muted">Belum ada FAQ yang tersedia.</p>
          @endif
        </div>
      </div>

    </div>
  </div>
</section>

<style>
  .form-control:focus {
    box-shadow: 0 0 0 0.2rem rgba(13,110,253,.25);
    border-color: #86b7fe;
  }

  .btn-primary {
    background-color: #0d6efd;
    border-color: #0d6efd;
    transition: all 0.3s ease;
  }

  .btn-primary:hover {
    background-color: #0b5ed7;
    border-color: #0a58ca;
  }
</style>

@endsection
