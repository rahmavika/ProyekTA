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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->unsignedBigInteger('kategori_id')->nullable();
            $table->unsignedBigInteger('satuan_id')->nullable();
            $table->decimal('harga', 15, 2);
            $table->string('gambar')->nullable();
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->timestamps();

            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('set null');
            $table->foreign('satuan_id')->references('id')->on('satuans')->onDelete('set null');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};