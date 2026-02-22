@extends('layouts.app')

@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-book-open-page-variant"></i>
        </span> Manajemen Buku
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
            </li>
        </ul>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="card-title">Daftar Koleksi Buku</h4>
                    <a href="{{ route('buku.create') }}" class="btn btn-gradient-primary btn-fw btn-sm">
                        <i class="mdi mdi-plus"></i> Tambah Buku
                    </a>
                </div>

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
                                <td class="py-1">
                                    <strong>{{ $buku->judul }}</strong>
                                </td>
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
                                    <a href="{{ route('buku.edit', $buku->id) }}" 
                                    class="btn btn-inverse-warning btn-sm">
                                        <i class="mdi mdi-pencil"></i>
                                    </a>
                                    <form action="{{ route('buku.destroy', $buku->id) }}" 
                                        method="POST" 
                                        style="display:inline-block;"
                                        onsubmit="return confirm('Yakin mau hapus buku ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-inverse-danger btn-sm">
                                            <i class="mdi mdi-trash-can"></i>
                                        </button>
                                    </form>
                                </td
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
@endsection