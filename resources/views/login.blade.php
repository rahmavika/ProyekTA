@extends('landingpage.layouts.main')

@section('content')
<section class="vh-100 d-flex align-items-center justify-content-center" style="background: #f8f9fa;">
    <div class="col-md-6 col-lg-4">
        <div class="card shadow border-0 rounded-4">
            <div class="card-body p-4">

                <div class="text-center mb-3">
                    <img src="{{ asset('images/sayurkeren.png') }}" class="img-fluid" alt="Logo" style="width: 120px;">
                </div>
                <h4 class="text-center mb-4" style="font-family: 'Poppins', sans-serif; font-weight: 600; color: #1e3f66;">
                    Masuk ke Akun Anda
                </h4>
                @if (session('pesan'))
                    <div class="alert alert-success small py-2">{{ session('pesan') }}</div>
                @endif

                <form method="POST" action="/login">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label small">Email</label>
                        <input type="email"
                               class="form-control rounded-3 shadow-sm @error('email') is-invalid @enderror"
                               name="email"
                               placeholder="name@example.com"
                               value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label small">Kata Sandi</label>
                        <input type="password"
                               class="form-control rounded-3 shadow-sm @error('password') is-invalid @enderror"
                               name="password"
                               placeholder="••••••••">
                        @error('password')
                            <div class="invalid-feedback small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="remember" id="rememberMe">
                        <label class="form-check-label small" for="rememberMe">
                            Ingatkan saya
                        </label>
                    </div>
                    <button class="btn w-100 py-2 rounded-3 text-white fw-bold"
                            style="background-color: #1e3f66; border: none;"
                            type="submit">
                        Masuk
                    </button>
                    <p class="mt-3 mb-0 text-center small">
                        Belum punya akun?
                        <a href="/register" style="color: #1e3f66; text-decoration: none; font-weight: 500;">
                            Daftar
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
