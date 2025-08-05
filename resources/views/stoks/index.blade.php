@extends('layouts.main')
@section('title', 'Data Produk')
@section('navProduk', 'active')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex--md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Produk</h1>
</div>

<a href="/dashboard-stok/create" class="btn btn-primary mb-3">+Produk</a>
<table id=stokTable class="table table-dashboard">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Jumlah Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($stoks as $stok)
        <tr>
            <td>{{ $stoks->firstItem() + $loop->index }}</td>
            <td>{{ $stok->nama_produk }}</td>
            <td>{{ $stok->jumlah_stok }}</td>
            <td class="text-nowrap">
                <!-- Tombol Tambah Stok (trigger modal) -->
<button type="button"
class="btn btn-success btn-sm"
data-bs-toggle="modal"
data-bs-target="#modalTambahStok-{{ $stok->produk_id }}">
<i class="bi bi-plus-circle"></i>
</button>


                <a href="/dashboard-create/{{ $stok->produk_id }}/edit" class="btn btn-sm btn-primary">
                    <i class="bi bi-pencil-square"></i>
                </a>

                <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="{{ $stok->produk_id }}">
                    <i class="bi bi-trash-fill"></i>
                </button>

                <form id="form-delete-{{ $stok->produk_id }}" action="/dashboard-produk/{{ $stok->produk_id }}" method="POST" class="d-none">
                    @csrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $stoks->links() }}

<!-- Modal Tambah Stok -->
<div class="modal fade" id="modalTambahStok-{{ $stok->produk_id }}" tabindex="-1" aria-labelledby="modalLabel{{ $stok->produk_id }}" aria-hidden="true">
    <div class="modal-dialog">
      <form action="/dashboard-stok/{{ $stok->produk_id }}/tambah" method="POST">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel{{ $stok->produk_id }}">Tambah Stok - {{ $stok->nama_produk }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="jumlah_tambah_{{ $stok->produk_id }}" class="form-label">Jumlah Tambah</label>
              <input type="number" name="jumlah_tambah" class="form-control" id="jumlah_tambah_{{ $stok->produk_id }}" min="1" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          </div>
        </div>
      </form>
    </div>
  </div>


@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Delete
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function () {
                const produkId = this.getAttribute('data-id');
                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: "Data yang dihapus tidak bisa dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('form-delete-' + produkId).submit();
                    }
                });
            });
        });

        // Detail
        document.querySelectorAll('.btn-detail').forEach(button => {
            button.addEventListener('click', function () {
                let nama = this.dataset.nama;
                let kategori = this.dataset.kategori;
                let satuan = this.dataset.satuan;
                let harga = this.dataset.harga;
                let supplier = this.dataset.supplier;
                let gambar = this.dataset.gambar;

                document.getElementById('detailNama').innerText = nama;
                document.getElementById('detailKategori').innerText = kategori;
                document.getElementById('detailSatuan').innerText = satuan;
                document.getElementById('detailHarga').innerText = harga;
                document.getElementById('detailSupplier').innerText = supplier;
                document.getElementById('detailGambar').src = gambar;

                let modal = new bootstrap.Modal(document.getElementById('detailModal'));
                modal.show();
            });
        });

        // Sweetalert success
        @if (session('pesan'))
            Swal.fire({
                title: 'Berhasil!',
                text: "{{ session('pesan') }}",
                icon: 'success',
                confirmButtonColor: '#0B773D'
            });
        @endif
    });
</script>
<script>
    $(document).ready(function() {
        $('#stokTable').DataTable({
            paging: true,
            searching: true,
            ordering:  true,
            lengthChange: true,
            language: {
                "sSearch": "Cari:",
                "lengthMenu": "Tampilkan _MENU_ data per halaman",
                "zeroRecords": "Data tidak ditemukan",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "infoEmpty": "Tidak ada data",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Berikutnya",
                    "previous": "Sebelumnya"
                }
            }
        });
    });
</script>
@endpush
@endsection
