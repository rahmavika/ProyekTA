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
                    Daftar Akun Baru
                </h4>
                <form method="POST" action="/register">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label small">Nama Pengguna</label>
                        <input type="text"
                               class="form-control rounded-3 shadow-sm @error('name') is-invalid @enderror"
                               name="name"
                               placeholder="Masukkan nama"
                               value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback small">{{ $message }}</div>
                        @enderror
                    </div>
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
                        <label class="form-label small">No HP</label>
                        <input type="text"
                               class="form-control rounded-3 shadow-sm @error('phone') is-invalid @enderror"
                               name="phone"
                               placeholder="08xxxxxxxxxx"
                               value="{{ old('phone') }}">
                        @error('phone')
                            <div class="invalid-feedback small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 position-relative">
                        <label class="form-label small">Kata Sandi</label>
                        <input type="password"
                               class="form-control rounded-3 shadow-sm pe-5 @error('password') is-invalid @enderror"
                               name="password"
                               id="password"
                               placeholder="••••••••">
                        <button type="button"
                                class="position-absolute top-50 end-0 translate-middle-y me-2 p-0 border-0 bg-transparent"
                                onclick="togglePassword('password', this)">
                            <i class="bi bi-eye"></i>
                        </button>
                        @error('password')
                            <div class="invalid-feedback small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 position-relative">
                        <label class="form-label small">Konfirmasi Kata Sandi</label>
                        <input type="password"
                               class="form-control rounded-3 shadow-sm pe-5 @error('password_confirmation') is-invalid @enderror"
                               name="password_confirmation"
                               id="password-confirm"
                               placeholder="••••••••">
                        <button type="button"
                                class="position-absolute top-50 end-0 translate-middle-y me-2 p-0 border-0 bg-transparent"
                                onclick="togglePassword('password-confirm', this)">
                            <i class="bi bi-eye"></i>
                        </button>
                        @error('password_confirmation')
                            <div class="invalid-feedback small">{{ $message }}</div>
                        @enderror
                    </div>
                    <script>
                        function togglePassword(inputId, btn) {
                            const input = document.getElementById(inputId);
                            const icon = btn.querySelector('i');
                            if (input.type === "password") {
                                input.type = "text";
                                icon.classList.replace('bi-eye', 'bi-eye-slash');
                            } else {
                                input.type = "password";
                                icon.classList.replace('bi-eye-slash', 'bi-eye');
                            }
                        }
                    </script>
                    <button class="btn w-100 py-2 rounded-3 text-white fw-bold"
                            style="background-color: #1e3f66; border: none;"
                            type="submit">
                        Daftar
                    </button>
                    <p class="mt-3 mb-0 text-center small">
                        Sudah punya akun?
                        <a href="/login" style="color: #1e3f66; text-decoration: none; font-weight: 500;">
                            Masuk
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
