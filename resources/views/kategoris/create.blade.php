{{-- @extends('layouts.main')

@section('content')
<div class="d-flex justify-content-center align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h3 text-center">Input Kategori Produk</h2>
</div>
<div class="row">
  <div class="col-lg-8 col-md-10 mx-auto">
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="/dashboard-kategori" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama Kategori</label>
                    <input type="text" class="form-control  @error('nama_kategori') is-invalid @enderror"
                    name="nama_kategori" id="nama_kategori" value="{{ old('nama_kategori') }}" placeholder="Nama Kategori">
                    @error('nama_kategori')
                        <div class=invalid-feedback>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                              name="deskripsi" id="deskripsi" placeholder="Masukkan Deskripsi">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
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
@endsection --}}
