<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pinjaman extends Model
{
    use HasFactory;
    protected $table = 'pinjaman';
    protected $primaryKey = 'id_pinjaman';
    public $incrementing = true;
    protected $fillable = ['id_member', 'jumlah_pinjaman', 'tgl_pinjam','tgl_jatuh_tempo','tenor','status_pinjaman'];
    public function anggota()
    {
        return $this->belongsTo(anggota::class, 'id_member', 'id_member');
    }
}
