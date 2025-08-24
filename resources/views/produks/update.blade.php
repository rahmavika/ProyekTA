@extends('layouts.main')

@section('content')
<div class="d-flex justify-content-center align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h3 text-center">Edit Data Produk</h2>
</div>
<div class="row">
  <div class="col-lg-8 col-md-10 mx-auto">
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="/dashboard-produk/{{ $produk->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Produk</label>
                <input type="text" class="form-control @error('nama_produk') is-invalid @enderror"
                name="nama_produk" id="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}" placeholder="Nama Produk">
                @error('nama_produk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kategori_id" class="form-label">Kategori</label>
                <select class="form-select" name="kategori_id" id="kategori_id">
                    <option value="">--Pilih Kategori--</option>
                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ (old('kategori_id', $produk->kategori_id) == $kategori->id) ? 'selected' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </option>
                    @endforeach
                </select>
                @error('kategori_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="satuan_id" class="form-label">Satuan Produk</label>
                <select class="form-select" name="satuan_id" id="satuan_id">
                    <option value="">--Pilih Satuan Produk--</option>
                    @foreach($satuans as $satuan)
                        <option value="{{ $satuan->id }}" {{ (old('satuan_id', $produk->satuan_id) == $satuan->id) ? 'selected' : '' }}>
                            {{ $satuan->satuan }}
                        </option>
                    @endforeach
                </select>
                @error('satuan_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" step="0.01" class="form-control @error('harga') is-invalid @enderror"
                name="harga" id="harga" value="{{ old('harga', $produk->harga) }}" placeholder="Harga">
                @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar" id="gambar">

                @if ($produk->gambar)
                    <img src="{{ asset('images/produk/' . $produk->gambar) }}" alt="Gambar Produk" class="img-thumbnail mt-2" width="150">
                @endif

                @error('gambar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="supplier_id" class="form-label">Supplier</label>
                <select class="form-select" name="supplier_id" id="supplier_id">
                    <option value="">--Pilih Supplier--</option>
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ (old('supplier_id', $produk->supplier_id) == $supplier->id) ? 'selected' : '' }}>
                            {{ $supplier->nama_supplier }}
                        </option>
                    @endforeach
                </select>
                @error('supplier_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100">Update</button>
            </form>
            <br>
        </div>
    </div>
  </div>
</div>
@endsection
