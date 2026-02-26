@extends('layouts.app')

@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-book-open-page-variant"></i>
        </span> Manajemen Buku
    </h3>
    <nav aria-label="breadcrumb">
        <button type="button" class="btn btn-gradient-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambahBuku">
            <i class="mdi mdi-plus"></i> Tambah Buku
        </button>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card shadow-sm">
            <div class="card-body">
                
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="bg-light">
                            <tr>
                                <th class="font-weight-bold"> No </th>
                                <th class="font-weight-bold"> Judul </th>
                                <th class="font-weight-bold"> Penulis </th>
                                <th class="font-weight-bold text-center"> Tahun </th>
                                <th class="font-weight-bold"> Kategori </th>
                                <th class="font-weight-bold text-center"> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bukus as $buku)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="py-1"><strong>{{ $buku->judul }}</strong></td>
                                <td>{{ $buku->penulis }}</td>
                                <td class="text-center">
                                    <label class="badge badge-info">{{ $buku->tahun_terbit }}</label>
                                </td>
                                <td>
                                    <span class="text-muted">
                                        <i class="mdi mdi-tag-outline small"></i> 
                                        {{ $buku->kategori->nama_kategori ?? '-' }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <button type="button" 
                                        class="btn btn-inverse-warning btn-sm btn-edit" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#modalEditBuku"
                                        data-id="{{ $buku->id }}"
                                        data-judul="{{ $buku->judul }}"
                                        data-penulis="{{ $buku->penulis }}"
                                        data-tahun="{{ $buku->tahun_terbit }}"
                                        data-kategori="{{ $buku->id_kategori }}">
                                        <i class="mdi mdi-pencil"></i>
                                    </button>

                                    <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin mau hapus buku ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-inverse-danger btn-sm">
                                            <i class="mdi mdi-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if($bukus->isEmpty())
                <div class="text-center p-4">
                    <p class="text-muted">Belum ada data Buku.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTambahBuku" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Buku Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('buku.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label>Judul Buku</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Penulis</label>
                        <input type="text" name="penulis" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Tahun Terbit</label>
                        <input type="number" name="tahun_terbit" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-gradient-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditBuku" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formEditBuku" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label>Judul Buku</label>
                        <input type="text" name="judul" id="edit_judul" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Penulis</label>
                        <input type="text" name="penulis" id="edit_penulis" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Tahun Terbit</label>
                        <input type="number" name="tahun_terbit" id="edit_tahun" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-gradient-warning text-dark">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).on('click', '.btn-edit', function() {
        let id = $(this).data('id');
        let judul = $(this).data('judul');
        let penulis = $(this).data('penulis');
        let tahun = $(this).data('tahun');

        $('#edit_judul').val(judul);
        $('#edit_penulis').val(penulis);
        $('#edit_tahun').val(tahun);

        // Arahkan form action ke route update sesuai ID buku
        $('#formEditBuku').attr('action', '/buku/' + id);
    });
</script>
@endsection