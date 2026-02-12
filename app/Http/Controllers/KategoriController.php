<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = \App\Models\Kategori::all();
        return view('kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required'
        ]);

        \App\Models\Kategori::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->route('kategori.index')
                        ->with('success', 'Kategori berhasil ditambahkan');
    }

}

