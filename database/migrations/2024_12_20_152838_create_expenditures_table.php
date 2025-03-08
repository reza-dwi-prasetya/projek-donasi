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
        // Pastikan tabel categories sudah ada sebelum membuat expenditures
        Schema::create('expenditures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_id')->constrained()->onDelete('cascade'); // ID transaksi donasi
            $table->foreignId('products_id',)->nullable()->constrained('products')->onDelete('set null'); // Kategori pengeluaran
            $table->string('activity_name'); // Nama kegiatan
            $table->decimal('amount', 15, 2); // Nominal pengeluaran
            $table->string('photo_proof')->nullable(); // Foto bukti pengeluaran
            $table->text('description')->nullable(); // Keterangan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenditures');
    }
};
