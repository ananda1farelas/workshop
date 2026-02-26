<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    // 1. Kasih tahu nama tabelnya
    protected $table = 'barang'; 

    // 2. Kasih tahu nama Primary Key-nya
    protected $primaryKey = 'id_barang'; 

    // 3. WAJIB: Kasih tahu kalau ID lu BUKAN angka (karena varchar)
    public $incrementing = false;

    // 4. WAJIB: Kasih tahu kalau tipe ID lu adalah String
    protected $keyType = 'string';

    protected $fillable = [
        'id_barang', // Tambahkan ini juga kalau ID diisi manual saat input
        'nama_barang', 
        'harga', 
        'stok'
    ];
}