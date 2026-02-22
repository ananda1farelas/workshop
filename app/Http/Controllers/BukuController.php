<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = \App\Models\Buku::with('kategori')->get();
        return view('buku.index', compact('bukus'));
    }

    public function create()
    {
        $kategoris = \App\Models\Kategori::all();
        return view('buku.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'tahun_terbit' => 'required',
            'kategori_id' => 'required'
        ]);

        \App\Models\Buku::create($request->all());

        return redirect()->route('buku.index')
                        ->with('success', 'Buku berhasil ditambahkan');
    }

    public function edit($id)
    {
        $buku = \App\Models\Buku::findOrFail($id);
        $kategoris = \App\Models\Kategori::all();

        return view('buku.edit', compact('buku', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'tahun_terbit' => 'required',
            'kategori_id' => 'required'
        ]);

        $buku = \App\Models\Buku::findOrFail($id);
        $buku->update($request->all());

        return redirect()->route('buku.index')
                        ->with('success', 'Buku berhasil diupdate');
    }

    public function destroy($id)
    {
        $buku = \App\Models\Buku::findOrFail($id);
        $buku->delete();

        return redirect()->route('buku.index')
                        ->with('success', 'Buku berhasil dihapus');
    }
}
