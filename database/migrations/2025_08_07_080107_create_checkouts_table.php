<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('alamat_pengiriman');
            $table->decimal('total_harga', 10, 2);
            $table->json('produk_details');
            $table->timestamp('tanggal_pemesanan')->useCurrent();
            $table->enum('metode_pembayaran', ['transfer', 'cod']); // ✅ metode pembayaran
            $table->enum('status_pembayaran', ['belum_lunas', 'lunas']); // ✅ status bayar
            $table->enum('status', ['menunggu konfirmasi','diproses', 'dikirim', 'selesai']);
            $table->string('bukti_transfer')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkouts');
    }
};