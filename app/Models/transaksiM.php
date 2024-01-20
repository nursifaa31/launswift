<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksiM extends Model
{
    use HasFactory;
    protected $table = "transaksi";
    protected $fillable = [
        'nomor_unik',
        'nama_pelanggan',
        'qty',
        'total_harga',
        'bayar',
        'kembali',
        'status',
        'tgl_ambil'
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function kategori()
    {
        return $this->belongsTo(kategoriM::class, 'id_kategori', 'id');
    }
    public function produk()
    {
        return $this->belongsTo(produkM::class, 'id_produk', 'id');
    }

}
