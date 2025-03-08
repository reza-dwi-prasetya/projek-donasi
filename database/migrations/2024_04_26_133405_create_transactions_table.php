<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('products_id'); // Foreign key ke tabel products
            $table->unsignedBigInteger('users_id'); // Foreign key ke tabel users
            $table->string('username');
            $table->string('email');
            $table->text('description')->nullable();
            $table->integer('donate_price'); // Jumlah donasi
            $table->timestamps();
            $table->softDeletes(); // Jika menggunakan soft deletes
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
