<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class simpanan extends Model
{
    use HasFactory;
    protected $table = 'simpanan';
    protected $primaryKey = 'id_simpan';
    public $incrementing = true;
    protected $fillable = ['id_member', 'jenis_simpanan', 'jumlah_simpanan','tgl_simpan'];
    public function anggota()
    {
        return $this->belongsTo(anggota::class, 'id_member', 'id_member');
    }
}
