@extends('layouts.app')

@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-format-list-bulleted"></i>
        </span> Manajemen Kategori
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
                    <h4 class="card-title">Daftar Kategori Buku</h4>
                    <a href="{{ route('kategori.create') }}" class="btn btn-gradient-primary btn-fw btn-sm">
                        <i class="mdi mdi-plus"></i> Tambah Kategori
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="bg-light">
                            <tr>
                                <th class="font-weight-bold" style="width: 10%;"> No </th>
                                <th class="font-weight-bold"> Nama Kategori </th>
                                <th class="font-weight-bold text-center" style="width: 20%;"> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategoris as $kategori)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-tag text-primary me-2"></i>
                                        <span class="font-weight-medium">{{ $kategori->nama_kategori }}</span>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('kategori.edit', $kategori->id) }}"
                                        class="btn btn-inverse-warning btn-sm mx-1"
                                        title="Edit">
                                            <i class="mdi mdi-pencil"></i>
                                        </a>
                                        <form action="{{ route('kategori.destroy', $kategori->id) }}"
                                            method="POST"
                                            style="display:inline-block;"
                                            onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-inverse-danger btn-sm mx-1"
                                                    title="Hapus">
                                                <i class="mdi mdi-trash-can"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if($kategoris->isEmpty())
                <div class="text-center p-4">
                    <p class="text-muted">Belum ada data kategori.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection