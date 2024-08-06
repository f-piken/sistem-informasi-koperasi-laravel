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
        Schema::create('pinjaman', function (Blueprint $table) {
            $table->id('id_pinjaman');
            $table->unsignedBigInteger('id_member')->index();
            $table->integer('jumlah_pinjaman');
            $table->date('tgl_pinjam');
            $table->date('tgl_jatuh_tempo');
            $table->integer('tenor');
            $table->integer('jumlah_bayar');
            $table->enum('status_pinjaman',['lunas','belum lunas']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjaman');
    }
};
