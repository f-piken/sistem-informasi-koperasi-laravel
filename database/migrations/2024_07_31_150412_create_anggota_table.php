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
        Schema::create('anggota', function (Blueprint $table) {
            $table->id('id_member');
            $table->string('nik',18);
            $table->string('nama');
            $table->enum('jenis_kelamin',['laki-laki','perempuan']);
            $table->date('tgl_lahir');
            $table->text('alamat');
            $table->string('email')->unique();
            $table->string('no_tlp')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota');
    }
};
