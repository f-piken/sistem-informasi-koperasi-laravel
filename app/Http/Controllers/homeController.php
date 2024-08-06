<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use App\Models\pinjaman;
use App\Models\simpanan;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        // Menghitung total pengguna
        $totalanggota = anggota::count();
        $totalpinjaman = pinjaman::sum('jumlah_pinjaman');
        $totalsimpanan = simpanan::sum('jumlah_simpanan');

        // Mengirim data ke view
        return view('dashboard', compact('totalanggota','totalpinjaman','totalsimpanan'));
    }
}
