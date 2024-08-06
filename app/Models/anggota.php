<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class anggota extends Model
{
    use HasFactory;
    protected $table = 'anggota';
    protected $primaryKey = 'id_member';
    public $incrementing = true;
    protected $fillable = ['nik', 'nama', 'jenis_kelamin','tgl_lahir','alamat','email','no_tlp'];
    public function simpanan()
    {
        return $this->hasMany(simpanan::class, 'id_member', 'id_member');
    }
    public function pinjaman()
    {
        return $this->hasMany(pinjaman::class, 'id_member', 'id_member');
    }
    public function transaksi()
    {
        return $this->hasMany(transaksi::class, 'id_member', 'id_member');
    }
}
