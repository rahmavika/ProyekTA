@extends('landingpage.layouts.main')

@section('content')

<h5 class="mt-5 d-flex justify-content-between align-items-center">
    Semua Produk
    <form action="{{ route('semuaproduk') }}" method="GET" class="d-flex align-items-center">
        <select name="kategori" class="form-select custom-select" onchange="this.form.submit()">
            <option value="" class="placeholder">Semua Kategori</option>
            @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}"
                    {{ request('kategori') == $kategori->id ? 'selected' : '' }}>
                    {{ $kategori->nama_kategori }}
                </option>
            @endforeach
        </select>
    </form>
</h5>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
        <div class="product-grid row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-6">

        @forelse($produks as $produk)
            <div class="col mb-4">
                <div class="product-item position-relative">
                    <figure>
                        <a href="#" title="{{ $produk->nama_produk }}">
                            <img src="{{ asset('storage/' . $produk->gambar) }}" class="tab-image img-fluid" alt="{{ $produk->nama_produk }}">
                        </a>
                    </figure>

                    <h3 class="h6 text-center fw-bold" style="font-size: 14px; margin-top: 5px; color:#333;">
                        {{ $produk->nama_produk }} ({{ $produk->satuan->satuan ?? '-' }})
                    </h3>


                    <div style="display: flex; flex-direction: column; gap: 5px;">
                        <p style="margin: 0; line-height: normal; font-size: 12px; color: #666;">{{ $produk->keterangan }}</p>

                        @if(isset($produk->stok))
                            @if($produk->stok->jumlah_stok > 0)
                                {{-- <span class="qty" style="line-height: normal; font-size: 12px; color: #0B773D;">
                                    Stok: {{ $produk->stok->jumlah }}
                                </span> --}}
                            @else
                                <span class="qty" style="line-height: normal; font-size: 12px; color: red; font-weight: bold;">
                                    Habis
                                </span>
                            @endif
                        @else
                            <span class="qty" style="line-height: normal; font-size: 12px; color: red; font-weight: bold;">
                                Stok tidak tersedia
                            </span>
                        @endif
                    </div>

                    <span class="price" style="font-size: 14px;">Rp {{ number_format($produk->harga, 2) }}</span>

                    <div class="d-flex align-items-center justify-content-between">
                        <div class="input-group product-qty" data-stock="{{ $produk->stok->jumlah_stok ?? 0 }}">
                            <span class="input-group-btn">
                                <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus"
                                    @if(!Auth::check() || (isset($produk->stok) && $produk->stok->jumlah_stok == 0))
                                        data-bs-toggle="modal" data-bs-target="#loginModal"
                                    @endif
                                    @if(isset($produk->stok) && $produk->stok->jumlah_stok == 0)
                                        disabled
                                    @endif>
                                    <i class="bi bi-dash"></i>
                                </button>
                            </span>
                            <span id="quantity-display-{{ $produk->id }}" class="form-control input-number text-center">1</span>
                            <span class="input-group-btn">
                                <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus"
                                    data-max-stock="{{ $produk->stok->jumlah_stok ?? 0 }}"
                                    @if(!Auth::check())
                                        data-bs-toggle="modal" data-bs-target="#loginModal"
                                    @else
                                        @if(isset($produk->stok) && $produk->stok->jumlah_stok == 0)
                                            disabled
                                        @endif
                                    @endif>
                                    <i class="bi bi-plus"></i>
                                </button>
                            </span>
                        </div>

                        <form action="{{ route('keranjangs.store') }}" method="POST" class="d-inline" id="form-{{ $produk->id }}" onsubmit="return addToCart(event, {{ $produk->id }})">
                            @csrf
                            <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                            <input type="hidden" name="jumlah" value="1" class="jumlah_stok-input" id="jumlah_stok-{{ $produk->id }}">
                            <button type="submit" class="nav-link text-green fs-6"
                                @if(!Auth::check() || (isset($produk->stok) && $produk->stok->jumlah_stok == 0))
                                    data-bs-toggle="modal" data-bs-target="#loginModal"
                                @endif
                                @if(isset($produk->stok) && $produk->stok->jumlah_stok == 0)
                                    style="pointer-events: none; color: grey;"
                                @else
                                    style="color: #07582d;"
                                @endif
                            >
                                <span class="small-text">+Keranjang</span>
                            </button>

                        </form>

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
                <a href="/login" class="btn btn-primary">Masuk</a>
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
                <a href="/keranjang" class="btn btn-primary">Lihat Keranjang</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Lanjut Belanja</button>
            </div>
        </div>
    </div>
</div>

<script>
    function addToCart(event, productId) {
        event.preventDefault();
        const form = document.getElementById(`form-${productId}`);

        fetch(form.action, {
            method: 'POST',
            body: new FormData(form),
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
            }
        })
        .then(response => {
            if (response.ok) {
                const confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
                confirmModal.show();
            } else {
                alert('Gagal menambahkan produk ke keranjang.');
            }
        })
        .catch(error => console.error('Error:', error));
    }

    minusButtons.forEach(button => {
        button.addEventListener('click', function() {
            const quantityDisplay = button.closest('.input-group').querySelector('span[id^="quantity-display-"]');
            let quantity = parseInt(quantityDisplay.innerText);

            if (quantity > 1) {
                quantity--;
                quantityDisplay.innerText = quantity;
                const productId = quantityDisplay.id.split('-')[2];
                document.getElementById(`jumlah-${productId}`).value = quantity;
            }
        });
    });

    plusButtons.forEach(button => {
        button.addEventListener('click', function() {
            const quantityDisplay = button.closest('.input-group').querySelector('span[id^="quantity-display-"]');
            let quantity = parseInt(quantityDisplay.innerText);
            const maxStock = parseInt(button.getAttribute('data-max-stock'));

            if (quantity < maxStock) {
                quantity++;
                quantityDisplay.innerText = quantity;
                const productId = quantityDisplay.id.split('-')[2];
                document.getElementById(`jumlah-${productId}`).value = quantity;
            }
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.quantity-left-minus').forEach(btn => {
            btn.addEventListener('click', function () {
                let parent = btn.closest('.product-qty');
                let display = parent.querySelector('.input-number');
                let hiddenInput = parent.parentElement.querySelector('input[name="jumlah"]');
                let current = parseInt(display.innerText);
                if (current > 1) {
                    current--;
                    display.innerText = current;
                    hiddenInput.value = current;
                }
            });
        });

        document.querySelectorAll('.quantity-right-plus').forEach(btn => {
            btn.addEventListener('click', function () {
                let maxStock = parseInt(btn.getAttribute('data-max-stock'));
                let parent = btn.closest('.product-qty');
                let display = parent.querySelector('.input-number');
                let hiddenInput = parent.parentElement.querySelector('input[name="jumlah"]');
                let current = parseInt(display.innerText);
                if (current < maxStock) {
                    current++;
                    display.innerText = current;
                    hiddenInput.value = current;
                }
            });
        });
    });
    </script>


<style>
    .custom-select {
    background-color: #f8f9fa;
    border: 2px solid #0d6efd;
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
        border-color: #0d6efd;
        background-color: #e9ecef;
    }

    .placeholder {
        color: #6c757d;
    }

    .custom-select option {
        background-color: #fff;
        padding: 8px 15px;
        transition: background-color 0.3s;
    }

    .custom-select option:hover {
        background-color: #f1f1f1;
    }

    .custom-select option:checked {
        background-color: #0d6efd;
        color: #fff;
    }

</style>
<style>
    .product-item {
        border: 1px solid #c7c7c7;
        border-radius: 0;
        background: linear-gradient(to bottom, #ffffff, #f4f4f4);
        padding: 10px;
    }

    .product-item h3,
    .product-item p,
    .product-item span.price {
        margin: 0;
    }
    .product-item figure img {
        border-radius: 0 !important;
    }

    .product-grid .col {
        padding: 8px;
    }
    .product-item figure {
        margin-bottom: 8px;
    }
</style>

<style>
    /* Card Produk */
    .product-item {
        border: 1px solid #c7c7c7;
        border-radius: 0;
        background: linear-gradient(to bottom, #ffffff, #f4f4f4);
        padding: 12px;
        min-height: 280px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .product-item figure {
        margin: 0 0 8px 0;
        height: 150px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .product-item figure img {
        border-radius: 0 !important;
        max-height: 100%;
        object-fit: cover;
    }

    .product-item h3,
    .product-item p,
    .product-item span.price {
        margin: 0;
        font-size: 14px;
    }

    .product-grid .col {
        padding: 10px;
    }
</style>

@endsection
