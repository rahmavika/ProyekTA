<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    /** @use HasFactory<\Database\Factories\CheckoutFactory> */
    use HasFactory;
    protected $fillable = [
    'user_id',
    'alamat_pengiriman',
    'total_harga',
    'produk_details',
    'tanggal_pemesanan',
    'metode_pembayaran',
    'status_pembayaran',
    'status',
    'bukti_transfer'
    ];
    protected $casts = [
        'tanggal_pemesanan' => 'datetime',
        'produk_details' => 'array',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function keranjangs()
    {
        return $this->hasMany(Keranjang::class);
    }
    protected $attributes = [
        'status_pembayaran' => 'belum_lunas',
        'status' => 'menunggu_konfirmasi'  // Default status
    ];


    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }

}