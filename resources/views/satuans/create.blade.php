{{-- @extends('layouts.main')

@section('content')
<div class="d-flex justify-content-center align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h3 text-center">Input Satuan Produk</h2>
</div>
<div class="row">
  <div class="col-lg-8 col-md-10 mx-auto">
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="/dashboard-satuan" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Satuan Produk</label>
                    <input type="text" class="form-control  @error('satuan') is-invalid @enderror"
                    name="satuan" id="satuan" value="{{ old('satuan') }}" placeholder="Satuan Produk" required>
                    @error('satuan')
                        <div class=invalid-feedback>
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
