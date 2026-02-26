<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Barryvdh\DomPDF\Facade\Pdf;

class BarangController extends Controller
{
    // 1. Tampilkan List Barang
    public function index()
    {
        $barang = Barang::all();
        return view('barang.index', compact('barang'));
    }

    // 2. Simpan Barang Baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'harga'       => 'required|numeric',
            'stok'        => 'nullable|numeric',
        ]);

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'harga'       => $request->harga,
            'stok'        => $request->stok ?? 0,
        ]);

        return redirect()->back()->with('success', 'Barang berhasil ditambahkan!');
    }

    // 3. Update Data Barang
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required',
            'harga'       => 'required|numeric',
            'stok'        => 'required|numeric',
        ]);

        // Cari pakai id_barang (sesuai primary key di model)
        $barang = Barang::findOrFail($id);
        $barang->update($request->all());

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diupdate!');
    }

    // 4. Hapus Barang
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus!');
    }

    // 5. Fitur Cetak Label
    public function cetak(Request $request)
    {
        $selected = $request->barang; // Array ID dari checkbox
        $x = (int)($request->x ?? 1);
        $y = (int)($request->y ?? 1);

        if (!$selected) {
            return redirect()->back()->with('error', 'Pilih barang dulu, Bang!');
        }

        // Ambil data barang yang dipilih
        $barang = Barang::whereIn('id_barang', $selected)->get();

        // Hitung index awal (0-39) berdasarkan koordinat X dan Y
        // X (1-5), Y (1-8)
        $startIndex = (($y - 1) * 5) + ($x - 1);
        
        // Siapkan array isi 40 slot kosong
        $labels = array_fill(0, 40, null);

        foreach ($barang as $i => $b) {
            $posisi = $startIndex + $i;
            if ($posisi < 40) {
                $labels[$posisi] = $b;
            }
        }

        $pdf = Pdf::loadView('barang.pdf', compact('labels'))
                  ->setPaper('a4', 'portrait');

        return $pdf->stream('label_barang.pdf');
    }
}