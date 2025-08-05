<!-- Modal Register -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content shadow">
        <div class="modal-header border-0">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <div class="modal-body p-4">
          <div class="text-center">
            <img src="{{ asset('images/sayurkeren.png') }}" class="img-fluid mb-3" alt="Logo" style="width: 45%">
            <div style="height: 2px; background-color: #0B773D; width: 50%; margin: 10px auto;"></div>
            <h4 style="font-family: 'Poppins', sans-serif; font-weight: 600; color: #0B773D;">DAFTAR</h4>
          </div>
          <form method="POST" action="/register" class="needs-validation mt-4" novalidate>
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Nama Pengguna</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror"
                id="name" name="name" value="{{ old('name') }}" placeholder="Masukkan nama pengguna" required>
              <div class="invalid-feedback">
                Nama pengguna wajib diisi.
              </div>
              @error('name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror"
                id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email" required>
              <div class="invalid-feedback">
                Masukkan email yang valid.
              </div>
              @error('email')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">No HP</label>
              <input type="text" class="form-control @error('phone') is-invalid @enderror"
                id="phone" name="phone" value="{{ old('phone') }}" placeholder="Masukkan nomor HP" required>
              <div class="invalid-feedback">
                Nomor HP wajib diisi.
              </div>
              @error('phone')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Kata Sandi</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror"
                id="password" name="password" placeholder="Masukkan kata sandi" required minlength="4">
              <div class="invalid-feedback">
                Kata sandi minimal 4 karakter.
              </div>
              @error('password')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
              <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                id="password_confirmation" name="password_confirmation" placeholder="Ulangi kata sandi" required>
              <div class="invalid-feedback">
                Konfirmasi sandi wajib diisi.
              </div>
              @error('password_confirmation')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>
            <button type="submit" class="btn w-100 py-2">
              <i class="fas fa-user-plus me-1"></i> Daftar
            </button>
            <div class="text-center mt-3">
              Sudah punya akun?
              <a href="#" style="color: #3047f7; font-weight: 500;" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">
                Masuk
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