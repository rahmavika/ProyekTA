@extends('layouts.main')
@section('title', 'Satuan Produk')
@section('navSatuan', 'active')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex--md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Satuan Produk</h1>
</div>
<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
        + Satuan Produk
</button>
<table id="satuanTable" class="table table-dashboard">
    <thead>
        <tr>
            <th>No</th>
            <th>Satuan Produk</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($satuans as $satuan)
        <tr>
            <td>{{ $satuans->firstItem() + $loop->index }}</td>
            <td>{{ $satuan->satuan }}</td>
            <td class="text-nowrap">
                <button
                    type="button"
                    class="btn btn-sm btn-primary btn-edit"
                    data-id="{{ $satuan->id }}"
                    data-satuan="{{ $satuan->satuan }}"
                    data-bs-toggle="modal"
                    data-bs-target="#editModal">
                    <i class="bi bi-pencil-square"></i>
                </button>
                <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="{{ $satuan->id }}">
                    <i class="bi bi-trash-fill"></i>
                </button>
                <form id="form-delete-{{ $satuan->id }}" action="/dashboard-satuan/{{ $satuan->id }}" method="POST" class="d-none">
                    @csrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $satuans->links() }}

<!-- Modal Create -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createModalLabel">Tambah Satuan Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action="/dashboard-satuan" method="post">
            @csrf
            <div class="mb-3">
                <label for="satuan" class="form-label">Satuan Produk</label>
                <input type="text" class="form-control" name="satuan" id="satuan" required>
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
        <h5 class="modal-title">Edit Satuan Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="editForm" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="editSatuan" class="form-label">Satuan Produk</label>
                <input type="text" class="form-control" name="satuan" id="editSatuan" required>
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
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function () {
                const satuanId = this.dataset.id;
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
                        document.getElementById('form-delete-' + satuanId).submit();
                    }
                });
            });
        });

        // Edit
        document.querySelectorAll('.btn-edit').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.dataset.id;
                const satuan = this.dataset.satuan;
                document.getElementById('editSatuan').value = satuan;
                document.getElementById('editForm').action = "/dashboard-satuan/" + id;
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
        $('#satuanTable').DataTable({
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
