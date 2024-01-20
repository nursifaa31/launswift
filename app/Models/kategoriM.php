<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategoriM extends Model
{
    use HasFactory;
    protected $table = "kategori";
    protected $fillable = ['nama_kategori'];

    public function produk()
    {
        return $this->hasMany(produkM::class, 'id_kategori');
    }
}
