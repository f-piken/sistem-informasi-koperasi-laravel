<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class karyawan extends Model 
{
    use HasFactory;
    protected $table = 'karyawan';
    protected $primaryKey = 'id_karyawan';
    public $incrementing = true;
    protected $fillable = ['nama','alamat','jenis_kelamin','tgl_lahir','no_tlp',];
    public function transaksi()
    {
        return $this->hasMany(transaksi::class, 'id_karyawan', 'id_karyawan');
    }
    public function user()
    {
        return $this->hasMany(User::class, 'karyawan_id', 'id_karyawan');
    }
}
