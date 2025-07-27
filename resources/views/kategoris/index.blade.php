@extends('layouts.main')
@section('title', 'Data Kategori')
@section('navKategori', 'active')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex--md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Kategori Produk</h1>
</div>
<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
    + Kategori
</button>
<table id=kategoriTable class="table table-dashboard">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kategoris as $kategori)
        <tr>
            <td>{{ $kategoris->firstItem() + $loop->index }}</td>
            <td>{{ $kategori->nama_kategori }}</td>
            <td>{{ $kategori->deskripsi }}</td>
            <td class="text-nowrap">
                <button
                    type="button"
                    class="btn btn-sm btn-primary btn-edit"
                    data-id="{{ $kategori->id }}"
                    data-nama="{{ $kategori->nama_kategori }}"
                    data-deskripsi="{{ $kategori->deskripsi }}"
                    data-bs-toggle="modal"
                    data-bs-target="#editModal">
                    <i class="bi bi-pencil-square"></i>
                </button>
                <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="{{ $kategori->id }}">
                    <i class="bi bi-trash-fill"></i>
                </button>
                <form id="form-delete-{{ $kategori->id }}" action="/dashboard-kategori/{{ $kategori->id }}" method="POST" class="d-none">
                    @csrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $kategoris->links() }}

<!-- Modal Create -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createModalLabel">Tambah Kategori Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action="/dashboard-kategori" method="post">
            @csrf
            <div class="mb-3">
                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Kategori Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="editForm" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="editNamaKategori" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" name="nama_kategori" id="editNamaKategori" required>
            </div>
            <div class="mb-3">
                <label for="editDeskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" id="editDeskripsi"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Delete
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function () {
                const kategoriId = this.dataset.id;
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
                        document.getElementById('form-delete-' + kategoriId).submit();
                    }
                });
            });
        });

        // Edit
        document.querySelectorAll('.btn-edit').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.dataset.id;
                const nama = this.dataset.nama;
                const deskripsi = this.dataset.deskripsi;

                document.getElementById('editNamaKategori').value = nama;
                document.getElementById('editDeskripsi').value = deskripsi;
                document.getElementById('editForm').action = "/dashboard-kategori/" + id;
            });
        });

        // SweetAlert success
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
        $('#kategoriTable').DataTable({
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
