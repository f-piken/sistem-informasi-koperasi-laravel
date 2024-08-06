<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    public $incrementing = true;
    protected $fillable = ['id_member', 'id_karyawan', 'tipe_transaksi','jumlah_transaksi','keterangan'];
    public function anggota()
    {
        return $this->belongsTo(anggota::class, 'id_member', 'id_member');
    }
    public function karyawan()
    {
        return $this->belongsTo(karyawan::class, 'id_karyawan', 'id_karyawan');
    }
}
