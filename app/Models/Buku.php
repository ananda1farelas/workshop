<?php

namespace App\Models;
use App\Models\Kategori;


use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    protected $fillable = [
    'judul',
    'penulis',
    'tahun_terbit',
    'kategori_id'
];

}
