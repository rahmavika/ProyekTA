@extends('landingpage.layouts.main')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg rounded">
        <div class="card-header text-center" style="background-color: #cce7ff; color: #1e3f66;">
            <h5>Edit Profil</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('update-profile') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label" style="color: #1e3f66;">Username</label>
                    <input type="text" class="form-control border-primary" id="name" name="name" value="{{ $user->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label" style="color: #1e3f66;">Email</label>
                    <input type="email" class="form-control border-primary" id="email" name="email" value="{{ $user->email }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label" style="color: #1e3f66;">No HP</label>
                    <input type="text" class="form-control border-primary" id="phone" name="phone" value="{{ $user->phone }}" required>
                </div>
                <div class="mb-3">
                    <label for="old_password" class="form-label" style="color: #1e3f66;">Password Lama</label>
                    <div class="input-group">
                        <input type="password" class="form-control @error('old_password') is-invalid @enderror border-primary"
                               name="old_password" id="old_password" placeholder="Masukkan Password Lama">
                        <span class="input-group-text" style="cursor: pointer; background-color: #e6f0fa; color: #1e3f66;">
                            <i class="bi bi-eye-slash toggle-password" toggle="#old_password"></i>
                        </span>
                    </div>
                    @error('old_password')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label" style="color: #1e3f66;">Kata Sandi Baru (Opsional)</label>
                    <div class="input-group">
                        <input type="password" class="form-control @error('password') is-invalid @enderror border-primary"
                               name="password" id="password" placeholder="Kata Sandi">
                        <span class="input-group-text" style="cursor: pointer; background-color: #e6f0fa; color: #1e3f66;">
                            <i class="bi bi-eye-slash toggle-password" toggle="#password"></i>
                        </span>
                    </div>
                    @error('password')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label" style="color: #1e3f66;">Konfirmasi Kata Sandi</label>
                    <div class="input-group">
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror border-primary"
                               name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Kata Sandi">
                        <span class="input-group-text" style="cursor: pointer; background-color: #e6f0fa; color: #1e3f66;">
                            <i class="bi bi-eye-slash toggle-password" toggle="#password_confirmation"></i>
                        </span>
                    </div>
                    @error('password_confirmation')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="d-flex justify-content-between">
                    <a href="/detailpelanggan" class="btn btn-secondary" style="background-color: #a3c1e1; border-color: #7da6d9; color: #1e3f66;">Batal</a>
                    <button type="submit" class="btn" style="background-color: #5dade2; border-color: #5dade2; color: white;">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<br>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.toggle-password').forEach(function (icon) {
            icon.addEventListener('click', function () {
                const input = document.querySelector(icon.getAttribute('toggle'));
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('bi-eye-slash');
                    icon.classList.add('bi-eye');
                } else {
                    input.type = 'password';
                    icon.classList.remove('bi-eye');
                    icon.classList.add('bi-eye-slash');
                }
            });
        });
    });
</script>

@endsection
