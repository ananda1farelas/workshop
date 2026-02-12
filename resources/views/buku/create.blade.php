@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Buku</h2>

    <form action="{{ route('buku.store') }}" method="POST">
        @csrf

        <div>
            <label>Judul</label><br>
            <input type="text" name="judul">
        </div>

        <div>
            <label>Penulis</label><br>
            <input type="text" name="penulis">
        </div>

        <div>
            <label>Tahun Terbit</label><br>
            <input type="number" name="tahun_terbit">
        </div>

        <div>
            <label>Kategori</label><br>
            <select name="kategori_id">
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}">
                        {{ $kategori->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <br>
        <button type="submit">Simpan</button>
    </form>
</div>
@endsection
