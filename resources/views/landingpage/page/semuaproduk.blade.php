@extends('landingpage.layouts.main')

@section('content')

<h5 class="mt-5 d-flex justify-content-between align-items-center">
    Semua Produk
    <!-- Dropdown Filter -->
    <form action="{{ route('semuaproduk') }}" method="GET" class="d-flex align-items-center">
        <div class="dropdown-wrapper">
            <select name="kategori" class="form-select kategori-dropdown" onchange="this.form.submit()">
                <option value="" disabled {{ request('kategori') ? '' : 'selected' }}>Semua Kategori</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}"
                        {{ request('kategori') == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

    </form>
</h5>


<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
        <!-- Disini: 1 kolom di xs, 2 di sm, 3 di md, 4 di lg+ -->
        <div class="product-grid">


        @forelse($produks as $produk)
        <div class="product-item-wrapper">

                <div class="card h-100 product-item shadow-sm">
                    <div class="card-img-top product-figure">
                        <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}">
                    </div>

                    <div class="card-body d-flex flex-column p-2">
                        <h6 class="card-title mb-1 text-truncate">{{ $produk->nama_produk }}</h6>

                        <p class="card-text text-muted mb-1 small text-truncate-2">{{ $produk->keterangan }}</p>

                        @if(isset($produk->stok))
                            @if($produk->stok->jumlah_stok > 0)
                                <span class="badge bg-success mb-2">Stok: {{ $produk->stok->jumlah_stok }}</span>
                            @else
                                <span class="badge bg-danger mb-2">Habis</span>
                            @endif
                        @else
                            <span class="badge bg-warning text-dark mb-2">Stok tidak tersedia</span>
                        @endif

                        <div class="fw-bold text-primary mb-2">Rp {{ number_format($produk->harga, 2) }}</div>

                        <div class="d-flex align-items-center justify-content-between mt-auto">
                            <div class="input-group input-group-sm product-qty" style="width: 95px;"
                                 data-stock="{{ $produk->stok->jumlah_stok ?? 0 }}">
                                <button type="button" class="btn btn-outline-secondary quantity-left-minus"
                                    @if(!Auth::check() || (isset($produk->stok) && $produk->stok->jumlah_stok == 0))
                                        data-bs-toggle="modal" data-bs-target="#loginModal"
                                    @endif
                                    @if(isset($produk->stok) && $produk->stok->jumlah_stok == 0) disabled @endif>
                                    <i class="bi bi-dash"></i>
                                </button>

                                <span id="quantity-display-{{ $produk->id }}" class="form-control text-center">1</span>

                                <button type="button" class="btn btn-outline-secondary quantity-right-plus"
                                        data-max-stock="{{ $produk->stok->jumlah_stok ?? 0 }}"
                                    @if(!Auth::check())
                                        data-bs-toggle="modal" data-bs-target="#loginModal"
                                    @else
                                        @if(isset($produk->stok) && $produk->stok->jumlah_stok == 0) disabled @endif
                                    @endif>
                                    <i class="bi bi-plus"></i>
                                </button>
                            </div>

                            <button class="btn btn-sm btn-success ms-2"
                                @if(!Auth::check() || (isset($produk->stok) && $produk->stok->jumlah_stok == 0))
                                    data-bs-toggle="modal" data-bs-target="#loginModal"
                                    @if(isset($produk->stok) && $produk->stok->jumlah_stok == 0) disabled @endif
                                @endif>
                                +Keranjang
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center" style="color: red">Produk tidak tersedia</p>
        @endforelse

        </div>
    </div>
</div>

<!-- Modal untuk Login -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Silahkan Masuk Terlebih Dahulu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Anda harus masuk untuk menambahkan produk ke keranjang.
            </div>
            <div class="modal-footer">
                <a href="/login" class="btn btn-success">Masuk</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk Konfirmasi -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Berhasil Menambahkan Produk ke Keranjang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <a href="/keranjang" class="btn btn-success">Lihat Keranjang</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Lanjut Belanja</button>
            </div>
        </div>
    </div>
</div>

<script>
    const minusButtons = document.querySelectorAll('.quantity-left-minus');
    const plusButtons = document.querySelectorAll('.quantity-right-plus');

    minusButtons.forEach(button => {
        button.addEventListener('click', function() {
            const group = button.closest('.product-qty');
            const quantityDisplay = group.querySelector('span[id^="quantity-display-"]');
            let quantity = parseInt(quantityDisplay.innerText);
            if (quantity > 1) {
                quantity--;
                quantityDisplay.innerText = quantity;
            }
        });
    });

    plusButtons.forEach(button => {
        button.addEventListener('click', function() {
            const group = button.closest('.product-qty');
            const quantityDisplay = group.querySelector('span[id^="quantity-display-"]');
            let quantity = parseInt(quantityDisplay.innerText);
            const maxStock = parseInt(button.getAttribute('data-max-stock')) || 0;
            if (quantity < maxStock) {
                quantity++;
                quantityDisplay.innerText = quantity;
            }
        });
    });
</script>

<style>
    .custom-select {
        background-color: #f8f9fa;
        border: 2px solid #0e6336;
        border-radius: 5px;
        padding: 8px 15px;
        font-size: 16px;
        color: #333;
        transition: background-color 0.3s, border-color 0.3s;
        appearance: none;
        cursor: pointer;
    }

    .custom-select:focus {
        outline: none;
        border-color: #0e6336;
        background-color: #e9ecef;
    }

    .placeholder { color: #6c757d; }

    /* Card / product styles */
    .product-item { border-radius: 8px; overflow: hidden; }
    .product-figure { width: 100%; height: 160px; overflow: hidden; display:flex; align-items:center; justify-content:center; background:#f8f9fa; }
    .product-figure img { width: 100%; height: 100%; object-fit: cover; display:block; }

    .text-truncate-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .product-qty .form-control {
        border-left: 0;
        border-right: 0;
        padding: .275rem .4rem;
    }

    /* Spacing kecil agar tombol dan qty tidak mepet */
    .product-qty .btn { padding: .275rem .5rem; }

    @media (max-width: 575px) {
        /* Sesuaikan tinggi gambar di layar kecil jika perlu */
        .product-figure { height: 140px; }
    }
    .product-item {
        border-radius: 8px;
        overflow: hidden;
        max-width: 280px;
        margin-left: auto;
        margin-right: auto;
    }
    .product-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr); /* default 5 per baris */
    gap: 1rem;
}
@media (max-width: 1200px) {
    .product-grid {
        grid-template-columns: repeat(4, 1fr); /* Layar besar ke medium: 4 per baris */
    }
}

@media (max-width: 992px) {
    .product-grid {
        grid-template-columns: repeat(3, 1fr); /* Tablet: 3 per baris */
    }
}

@media (max-width: 768px) {
    .product-grid {
        grid-template-columns: repeat(2, 1fr); /* HP sedang: 2 per baris */
    }
}

@media (max-width: 480px) {
    .product-grid {
        grid-template-columns: repeat(1, 1fr); /* HP kecil: 1 per baris */
    }
}



</style>

@endsection