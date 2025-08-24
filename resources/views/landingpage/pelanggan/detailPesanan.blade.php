@extends('landingpage.layouts.main')

@section('content')
<section class="mt-5">
    <div class="container" style="max-width: 900px;">
        <div class="mb-3 text-end no-print">
            <button onclick="window.print()" class="btn btn-success btn-sm">
                🖨 Cetak Invoice
            </button>
        </div>
        <div id="invoiceArea" class="invoice-box">
            <div class="d-flex justify-content-between align-items-start mb-4">
                <div>
                    <h3 class="fw-bold text-success m-0">TB AW Karya Bangunan</h3>
                    <small>
                        Jl. Mesjid, Sungai Pua, Kec. Sungai Pua <br>
                        Kabupaten Agam, Sumatera Barat 26181 <br>
                        Telp: (0752) 123456 <br>
                    </small>
                </div>
                <div class="text-end">
                    <h5 class="fw-bold m-0">INVOICE</h5>
                    <small>
                        No: {{ $checkout->id }} <br>
                        Tanggal: {{ \Carbon\Carbon::parse($checkout->tanggal_pemesanan)->format('d F Y') }}
                    </small>
                </div>
            </div>
            <hr style="border-top: 2px solid #0B773D; margin-bottom: 20px;">

            <table class="table table-borderless small mb-4">
                <tr>
                    <th style="width: 25%">Nama</th>
                    <td>{{ $checkout->user->name ?? '-' }}</td>
                </tr>
                <tr>
                    <th>No. HP</th>
                    <td>{{ $checkout->user->phone ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $checkout->alamat_pengiriman }}</td>
                </tr>
            </table>

            <table class="table table-bordered small align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Produk</th>
                        <th class="text-center" style="width: 12%">Jumlah</th>
                        <th class="text-end" style="width: 15%">Harga</th>
                        <th class="text-end" style="width: 15%">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produkDetails as $produk)
                    <tr>
                        <td>{{ $produk['nama'] }}</td>
                        <td class="text-center">{{ $produk['jumlah'] }}</td>
                        <td class="text-end">Rp {{ number_format($produk['harga'], 0, ',', '.') }}</td>
                        <td class="text-end">Rp {{ number_format($produk['total'], 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="ms-auto" style="width: 40%;">
                <table class="table table-sm table-borderless small">
                    <tr>
                        <th>Subtotal</th>
                        <td class="text-end">Rp {{ number_format($totalHargaAkhir, 0, ',', '.') }}</td>
                    </tr>
                    <tr class="fw-bold table-light">
                        <th>Total Bayar</th>
                        <td class="text-end">Rp {{ number_format(($totalHargaAkhir + ($checkout->ongkir ?? 0)), 0, ',', '.') }}</td>
                    </tr>
                </table>
            </div>

            @if(strtolower($checkout->metode_pembayaran) === 'transfer')
            <div class="border p-2 small mt-3">
                <strong>Pembayaran Transfer:</strong> <br>
                Bank Mandiri a/n Kelompok B <br>
                No Rekening: 1120290091890
            </div>
            @endif
            <div class="small mt-4">
                <strong>Catatan:</strong>
                <ul class="mb-4">
                    @if ($checkout->metode_pembayaran === 'transfer')
                        <li>Pesanan akan diproses setelah pembayaran terkonfirmasi.</li>
                     @endif
                    <li>Pembayaran belum termasuk biaya pengiriman.</li>
                    <li>Harap melakukan pembayaran sesuai jumlah total yang tertera.</li>
                    <li>Simpan bukti pembayaran sebagai arsip Anda.</li>
                </ul>

                <div class="d-flex justify-content-between mt-5">
                    <div class="text-center">
                        <p>Penerima</p>
                        <br><br>
                        <p>_________________</p>
                    </div>
                    <div class="text-center">
                        <p>Hormat Kami</p>
                        <br><br>
                        <p>_________________</p>
                    </div>
                </div>
            </div>

            <p class="text-center mt-4 fw-bold small mb-0">
                Terima kasih atas kepercayaan Anda berbelanja di TB AW Karya Bangunan.
            </p>
            <p class="text-center fst-italic text-muted small">
                Kami berkomitmen memberikan pelayanan dan produk terbaik untuk Anda.
            </p>
        </div>
    </div>
</section>

<style>
.invoice-box {
    border: 1px solid #ccc;
    background: #fff;
    font-family: 'Poppins', sans-serif;
    font-size: 12px;
    padding: 20px;
}
@media print {
    body * {
        visibility: hidden;
    }
    #invoiceArea, #invoiceArea * {
        visibility: visible;
    }
    #invoiceArea {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        font-size: 12px;
    }
    .no-print {
        display: none !important;
    }
}
</style>
@endsection
