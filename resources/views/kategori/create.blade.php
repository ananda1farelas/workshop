@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Kategori</h2>

    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf

        <div>
            <label>Nama Kategori</label><br>
            <input type="text" name="nama_kategori">
        </div>

        <br>
        <button type="submit">Simpan</button>
    </form>
</div>
@endsection
