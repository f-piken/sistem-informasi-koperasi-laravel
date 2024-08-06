<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use App\Models\karyawan;
use App\Models\pinjaman;
use App\Models\simpanan;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class transaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has("search")) {
            $transaksi = Transaksi::select('transaksi.*')
            ->join('anggota', 'transaksi.id_member', '=', 'anggota.id_member')
            ->join('karyawan', 'transaksi.id_karyawan', '=', 'karyawan.id_karyawan')
            ->where(function($query) use ($request) {
                $query->where('transaksi.tipe_transaksi', 'like', "%".$request->search."%")
                      ->orWhere('transaksi.jumlah_transaksi', 'like', "%".$request->search."%")
                      ->orWhere('transaksi.keterangan', 'like', "%".$request->search."%")
                      ->orWhere('anggota.nama', 'like', "%".$request->search."%")
                      ->orWhere('karyawan.nama', 'like', "%".$request->search."%");
            })
            ->paginate(15);
        }else { 
            $transaksi = transaksi::paginate(15);
        }
        return view('transaksi.transaksi', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $anggota = anggota::all();
        $karyawan = karyawan::all();
        
        return view('transaksi.transaksi-entry', compact('anggota', 'karyawan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_member' => 'required',
            'id_karyawan' => 'required',
            'tipe_transaksi' => 'required|in:simpanan,peminjaman',
            'jumlah_transaksi' => 'required|integer',
            'keterangan' => 'required|string',
        ]);


        // Simpan data transaksi
        $transaksi = new transaksi();
        $transaksi->id_member = $request->id_member;
        $transaksi->id_karyawan = $request->id_karyawan;
        $transaksi->tipe_transaksi = $request->tipe_transaksi;
        $transaksi->jumlah_transaksi = $request->jumlah_transaksi;
        $transaksi->tgl_transaksi = now();
        $transaksi->keterangan = $request->keterangan;
        $transaksi->save();

        // Jika tipe transaksi adalah 'simpanan'
        if ($request->tipe_transaksi == 'simpanan') {
            $request->validate([
                'jenis_simpanan' => 'required|in:pokok,wajib,sukarela',
            ]);

            $simpanan = new simpanan();
            $simpanan->id_member = $request->id_member;
            $simpanan->jenis_simpanan = $request->jenis_simpanan;
            $simpanan->jumlah_simpanan = $request->jumlah_transaksi;
            $simpanan->tgl_simpan = now();
            $simpanan->save();
        }

        // Jika tipe transaksi adalah 'pinjaman'
        else if ($request->tipe_transaksi == 'peminjaman') {
            $request->validate([
                'tenor' => 'required|integer',
            ]);

            $tglPinjam = now();
            $tglJatuhTempo = date('Y-m-d', strtotime($tglPinjam . ' + 30 days'));
            $tnr = $request->tenor;
            $bayar = ($request->jumlah_transaksi+($request->jumlah_transaksi*20/100))/$tnr;

            $pinjaman = new pinjaman();
            $pinjaman->id_member = $request->id_member;
            $pinjaman->jumlah_pinjaman = $request->jumlah_transaksi;
            $pinjaman->tgl_pinjam = now();
            $pinjaman->tgl_jatuh_tempo = $tglJatuhTempo;
            $pinjaman->tenor = $request->tenor;
            $pinjaman->jumlah_bayar = $bayar;
            $pinjaman->status_pinjaman = 'belum lunas'; // Asumsi status awal "belum lunas"
            $pinjaman->save();
        }

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_member)
    {
        $transaksi = transaksi::find($id_member);
        return view('transaksi.transaksi-edit', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_member)
    {
        $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'kelamin' => 'required',
            'lahir' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'tlp' => 'required',
        ]);

        $transaksi = transaksi::find($id_member);
        $transaksi->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->kelamin,
            'tgl_lahir' => $request->lahir,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_tlp' => $request->tlp,
        ]);
        return redirect('/transaksi')->with('success','Data Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id_member)
    {
        $transaksi = transaksi::find($id_member);
        return view('transaksi.transaksi-hapus', compact('transaksi'));
    }
    public function destroy(string $id_member)
    {
        $transaksi = transaksi::find($id_member);
        $transaksi -> delete();

        return redirect('/transaksi')->with('success','Data Berhasil Di Hapus');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $transaksi = transaksi::where('tipe_transaksi', 'like', "%{$query}%")
            ->orWhere('id_member', 'like', "%{$query}%")
            ->orWhere('id_karyawan', 'like', "%{$query}%")
            ->orWhere('jumlah_transaksi', 'like', "%{$query}%")
            ->orWhere('keterangan', 'like', "%{$query}%")
            ->get();

        return view('transaksi.transaksi', compact('transaksi'));
    }
}
