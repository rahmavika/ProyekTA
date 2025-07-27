<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    /** @use HasFactory<\Database\Factories\ProdukFactory> */
    use HasFactory;
    protected $fillable = [
        'nama_produk',
        'kategori_id',
        'satuan_id',
        'harga',
        'gambar',
        'supplier_id',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'satuan_id');
    }

}