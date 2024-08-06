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
        Schema::create('simpanan', function (Blueprint $table) {
            $table->id('id_simpan');
            $table->unsignedBigInteger('id_member')->index();
            $table->enum('jenis_simpanan',['pokok','wajib','sukarela']);
            $table->integer('jumlah_simpanan');
            $table->date('tgl_simpan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('simpanan');
    }
};
