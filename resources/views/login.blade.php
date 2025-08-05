<!-- Modal Login -->
<div class="modal fade @if ($errors->any()) show d-block @endif" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true" @if ($errors->any()) style="background: rgba(0,0,0,0.5);" @endif>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
            <div class="modal-body p-4">
                <div class="text-center">
                    <img src="{{ asset('images/sayurkeren.png') }}" class="img-fluid mb-3" alt="Logo" style="width: 45%">
                    <div style="height: 2px; background-color: #0B773D; width: 50%; margin: 10px auto;"></div>
                    <h4 style="font-family: 'Poppins', sans-serif; font-weight: 600; color: #0B773D;">MASUK</h4>
                </div>
                @if ($errors->has('email'))
                    <div class="alert alert-danger mt-3">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}" class="mt-3">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password" placeholder="Masukkan kata sandi">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn w-100 py-2">
                        <i class="fas fa-sign-in-alt me-1"></i> Masuk
                    </button>
                    <div class="text-center mt-3">
                        Belum punya akun?
                        <a href="#" style="color: #3047f7; font-weight: 500;" data-bs-toggle="modal" data-bs-target="#registerModal" data-bs-dismiss="modal">
                            Daftar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
  <!-- Script Validasi Form saat tombol diklik -->
  <script>
    (() => {
      'use strict';
      const forms = document.querySelectorAll('.needs-validation');
      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    })();
  </script>
@include('register')