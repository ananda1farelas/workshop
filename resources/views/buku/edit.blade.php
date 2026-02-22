@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-warning text-white me-2">
                    <i class="mdi mdi-pencil"></i>
                </span> Edit Buku
            </h3>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-8 grid-margin stretch-card mx-auto">
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="card-title mb-4">Form Edit Buku</h4>

                <form action="{{ route('buku.update', $buku->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label>Judul Buku</label>
                        <input type="text" 
                               name="judul" 
                               value="{{ $buku->judul }}" 
                               class="form-control"
                               required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Penulis</label>
                        <input type="text" 
                               name="penulis" 
                               value="{{ $buku->penulis }}" 
                               class="form-control"
                               required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Tahun Terbit</label>
                        <input type="number" 
                               name="tahun_terbit" 
                               value="{{ $buku->tahun_terbit }}" 
                               class="form-control"
                               required>
                    </div>

                    <div class="form-group mb-4">
                        <label>Kategori</label>
                        <select name="kategori_id" class="form-control" required>
                            @foreach($kategoris as $kategori)
                                <option value="{{ $kategori->id }}"
                                    {{ $kategori->id == $buku->kategori_id ? 'selected' : '' }}>
                                    {{ $kategori->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('buku.index') }}" 
                           class="btn btn-light btn-sm">
                            Kembali
                        </a>

                        <button type="submit" 
                                class="btn btn-gradient-warning btn-sm">
                            <i class="mdi mdi-content-save"></i> Update Buku
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
