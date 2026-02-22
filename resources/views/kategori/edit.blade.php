@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-6 mx-auto">

        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-warning text-white me-2">
                    <i class="mdi mdi-tag-edit"></i>
                </span> Edit Kategori
            </h3>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">

                <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-4">
                        <label>Nama Kategori</label>
                        <input type="text"
                               name="nama_kategori"
                               value="{{ $kategori->nama_kategori }}"
                               class="form-control"
                               required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('kategori.index') }}"
                           class="btn btn-light btn-sm">
                            Kembali
                        </a>

                        <button type="submit"
                                class="btn btn-gradient-warning btn-sm">
                            <i class="mdi mdi-content-save"></i> Update
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>
@endsection
