@extends('layouts.app')

@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-success text-white me-2">
            <i class="mdi mdi-tag"></i>
        </span> Manajemen & Cetak Label
    </h3>
    <button type="button" class="btn btn-gradient-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambahBarang">
        <i class="mdi mdi-plus"></i> Tambah Barang
    </button>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="card-title">Daftar Buku / Barang</h4>
                </div>

                @if(session('success'))
                <div class="alert alert-success mt-2">
                    {{ session('success') }}
                </div>
                @endif

                <form method="POST" action="{{ route('barang.cetak') }}">
                    @csrf
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="bg-light">
                                <tr>
                                    <th>Pilih</th>
                                    <th>ID</th>
                                    <th>Nama Buku</th>
                                    <th>Harga</th>
                                    <th class="text-center">Aksi</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($barang as $b)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="barang[]" value="{{ $b->id_barang }}">
                                    </td>
                                    <td>
                                        <span class="badge badge-secondary">{{ $b->id_barang }}</span>
                                    </td>
                                    <td>
                                        <strong>{{ $b->nama_barang }}</strong>
                                    </td>
                                    <td>
                                        <label class="badge badge-info">
                                            Rp {{ number_format($b->harga) }}
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" 
                                            class="btn btn-inverse-warning btn-sm btn-edit" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#modalEditBarang"
                                            data-id="{{ $b->id_barang }}"
                                            data-nama="{{ $b->nama_barang }}"
                                            data-harga="{{ $b->harga }}"
                                            data-stok="{{ $b->stok }}">
                                            <i class="mdi mdi-pencil"></i>
                                        </button>

                                        <button type="button" class="btn btn-inverse-danger btn-sm" onclick="hapusBarang('{{ $b->id_barang }}')">
                                            <i class="mdi mdi-trash-can"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <hr>
                    <div class="row mt-3">
                        <div class="col-md-2">
                            <label>Posisi X (1-5)</label>
                            <input type="number" name="x" min="1" max="5" value="1" class="form-control" required>
                        </div>
                        <div class="col-md-2">
                            <label>Posisi Y (1-8)</label>
                            <input type="number" name="y" min="1" max="8" value="1" class="form-control" required>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-gradient-success btn-fw">
                            <i class="mdi mdi-printer"></i> CETAK LABEL TERPILIH
                        </button>
                    </div>
                </form>

                @if($barang->isEmpty())
                <div class="text-center p-4">
                    <p class="text-muted">Belum ada data barang.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTambahBarang" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Barang Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('barang.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label>Nama Barang / Buku</label>
                        <input type="text" name="nama_barang" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Harga</label>
                        <input type="number" name="harga" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Stok</label>
                        <input type="number" name="stok" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-gradient-primary">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditBarang" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formEditBarang" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label>Nama Barang / Buku</label>
                        <input type="text" name="nama_barang" id="edit_nama" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Harga</label>
                        <input type="number" name="harga" id="edit_harga" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Stok</label>
                        <input type="number" name="stok" id="edit_stok" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-gradient-warning text-dark">Update Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<form id="form-hapus-global" method="POST" style="display:none;">
    @csrf
    @method('DELETE')
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Handler Modal Edit
    $('.btn-edit').on('click', function() {
        // Ambil data dari attribute data-
        const id = $(this).data('id');
        const nama = $(this).data('nama');
        const harga = $(this).data('harga');
        const stok = $(this).data('stok');

        // Isi field modal
        $('#edit_nama').val(nama);
        $('#edit_harga').val(harga);
        $('#edit_stok').val(stok); 

        // Set action form dengan URL absolute
        let url = window.location.origin + "/barang/" + id;
        $('#formEditBarang').attr('action', url);
    });
});

// Fungsi Hapus
function hapusBarang(id) {
    if (confirm('Yakin mau hapus barang ini?')) {
        let form = document.getElementById('form-hapus-global');
        form.action = window.location.origin + "/barang/" + id;
        form.submit();
    }
}
</script>
@endsection