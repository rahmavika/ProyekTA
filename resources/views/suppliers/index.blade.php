@extends('layouts.main')
@section('title', 'Data Supplier')
@section('navSupplier', 'active')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex--md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Supplier</h1>
</div>

<a href="/dashboard-supplier/create" class="btn btn-primary mb-3">+Supplier</a>
<a href="/cetak/supplier" target="_blank" class="btn btn-success mb-3">Cetak PDF</a>
<table id=supplierTable class="table table-dashboard">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Supplier</th>
            <th>No Telepon</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($suppliers as $supplier)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $supplier->nama_supplier }}</td>
            <td>{{ $supplier->telepon }}</td>
            <td>{{ $supplier->email }}</td>
            <td>{{ $supplier->alamat }}</td>
            <td>{{ $supplier->status }}</td>
            <td class="text-nowrap">
                <button type="button"
                        class="btn btn-info btn-sm btn-detail"
                        data-nama="{{ $supplier->nama_supplier }}"
                        data-telepon="{{ $supplier->telepon }}"
                        data-email="{{ $supplier->email }}"
                        data-alamat="{{ $supplier->alamat }}"
                        data-status="{{ $supplier->status }}">
                    <i class="bi bi-eye"></i>
                </button>
                <a href="/dashboard-supplier/{{ $supplier->id }}/edit" class="btn btn-sm btn-primary">
                    <i class="bi bi-pencil-square"></i>
                </a>
                <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="{{ $supplier->id }}">
                    <i class="bi bi-trash-fill"></i>
                </button>

                <form id="form-delete-{{ $supplier->id }}" action="/dashboard-supplier/{{ $supplier->id }}" method="POST" class="d-none">
                    @csrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal Detail Supplier -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content shadow-lg">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">
                    <i class="bi bi-person-lines-fill"></i> Detail Supplier
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-muted">Nama Supplier</label>
                                <div class="p-2 border rounded bg-light" id="detailNama"></div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-muted">No Telepon</label>
                                <div class="p-2 border rounded bg-light" id="detailTelepon"></div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-muted">Email</label>
                                <div class="p-2 border rounded bg-light" id="detailEmail"></div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-muted">Status</label>
                                <div class="p-2 border rounded bg-light" id="detailStatus"></div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold text-muted">Alamat</label>
                            <div class="p-2 border rounded bg-light" id="detailAlamat"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tutup
                </button>
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
                const supplierId = this.getAttribute('data-id');

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
                        document.getElementById('form-delete-' + supplierId).submit();
                    }
                });
            });
        });

        document.querySelectorAll('.btn-detail').forEach(button => {
            button.addEventListener('click', function () {
                document.getElementById('detailNama').innerText = this.dataset.nama;
                document.getElementById('detailTelepon').innerText = this.dataset.telepon;
                document.getElementById('detailEmail').innerText = this.dataset.email;
                document.getElementById('detailAlamat').innerText = this.dataset.alamat;
                document.getElementById('detailStatus').innerText = this.dataset.status;

                let modal = new bootstrap.Modal(document.getElementById('detailModal'));
                modal.show();
            });
        });

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
        $('#supplierTable').DataTable({
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
