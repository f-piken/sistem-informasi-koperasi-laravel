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
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id('id_karyawan');
            $table->string('nama');
            $table->text('alamat');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->date('tgl_lahir');
            $table->string('no_tlp')->unique();
            $table->rememberToken();
            $table->timestamps();
        });
        
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karyawan_id')->nullable()->constrained('karyawan','id_karyawan')->index();
            $table->string('name');
            $table->enum('role', ['pegawai', 'admin']);
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan');
        Schema::dropIfExists('users');
    }
};
