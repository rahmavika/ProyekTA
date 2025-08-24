@extends('landingpage.layouts.main')

@section('content')
<section class="mt-5">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-8 col-md-10">
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                    <div class="row g-0">
                        <div class="col-md-4 bg-light d-flex flex-column align-items-center justify-content-center p-4">
                            <div class="mb-3">
                                <i class="bi bi-person-circle" style="font-size: 80px; color: #1e3f66;"></i>
                            </div>
                            <h5 class="fw-bold text-dark mb-2">{{ session('name') }}</h5>
                            <a href="{{ route('edit-profile') }}" class="btn" style="background-color: #5dade2; color: white; font-weight: 500; border-radius: 50px; padding: 6px 20px;">
                                <i class="bi bi-pencil-square me-1"></i> Edit Profil
                            </a>
                        </div>
                        <div class="col-md-8 p-4">
                            <h5 class="fw-bold" style="color: #1e3f66; margin-bottom: 1.5rem;">Informasi Akun</h5>
                            <div class="mb-3">
                                <small class="text-muted">Username</small>
                                <p class="mb-1">{{ session('name') }}</p>
                            </div>
                            <hr>
                            <div class="mb-3">
                                <small class="text-muted">Email</small>
                                <p class="mb-1">{{ session('email') }}</p>
                            </div>
                            <hr>
                            <div>
                                <small class="text-muted">No HP</small>
                                <p class="mb-0">{{ session('phone') }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
