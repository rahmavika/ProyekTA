@extends('layouts.main')

@section('content')
<div class="d-flex justify-content-center align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h3 text-center">Input Data Supplier</h2>
</div>
<div class="row">
  <div class="col-lg-8 col-md-10 mx-auto">
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="/dashboard-supplier" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="nama_supplier" class="form-label">Nama Supplier</label>
                    <input type="text" class="form-control @error('nama_supplier') is-invalid @enderror" name="nama_supplier" id="nama_supplier" value="{{ old('nama_supplier') }}" placeholder="Nama Supplier">
                    @error('nama_supplier')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="telepon" class="form-label">No Telepon</label>
                    <input type="text" class="form-control @error('telepon') is-invalid @enderror" name="telepon" id="phone" value="{{ old('telepon') }}" placeholder="08xxxxxxxxxx">
                    @error('telepon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="name@example.com">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror"
                              name="alamat" id="alamat" placeholder="Masukkan Alamat">{{ old('alamat') }}</textarea>
                    @error('alamat')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select @error('status') is-invalid @enderror" name="status" id="status">
                        <option value="">-- Pilih Status --</option>
                        <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection



