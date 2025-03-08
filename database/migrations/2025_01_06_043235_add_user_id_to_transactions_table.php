<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            // Menambahkan kolom user_id
            $table->unsignedBigInteger('users_id')->nullable()->after('id');

            // Menambahkan foreign key ke tabel users
            $table->foreign('users_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            // Hapus foreign key
            $table->dropForeign(['user_id']);

            // Hapus kolom user_id
            $table->dropColumn('user_id');
        });
    }
}
