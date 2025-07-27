<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    /** @use HasFactory<\Database\Factories\SupplierFactory> */
    use HasFactory;
    protected $fillable = [
        'nama_supplier',
        'telepon',
        'email',
        'alamat',
        'status',
    ];

    public function produks()
    {
        return $this->hasMany(Produk::class, 'supplier_id');
    }

}