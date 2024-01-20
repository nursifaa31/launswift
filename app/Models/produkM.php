<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produkM extends Model
{
    use HasFactory;

    protected $table = "produk";
    protected $fillable = ['id', 'nama_produk', 'harga_produk', 'id_kategori'];

    public function kategori()
    {
        return $this->belongsTo(kategoriM::class, 'id_kategori', 'id');
    }
}
