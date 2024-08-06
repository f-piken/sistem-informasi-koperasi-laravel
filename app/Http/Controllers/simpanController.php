<?php

namespace App\Http\Controllers;

use App\Models\simpanan;
use Illuminate\Http\Request;

class simpanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $simpan = simpanan::all();
        return view('simpanan.simpanan-pilih', compact('simpan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('simpanan.simpan-entry');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=> 'required',
            'jenis' => 'required',
        ]);

        $carinama = $request->input('nama');
        $carijenis = $request->input('jenis');
        $nama = simpanan::where('id_member', 'like', '%' . $carinama . '%')
            ->get();
        $jenis = simpanan::where('jenis_simpanan', 'like', '%' . $carijenis . '%')
            ->get();

        // Tampilkan hasil pencarian
        return view('simpanan.simpanan', compact('nama', 'jenis'));
    }

    /**
     * Display the specified resource.
     */
    public function cari(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_member)
    {
        $simpan = simpanan::find($id_member);
        return view('simpan.simpan-edit', compact('simpan'));
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

        $simpan = simpanan::find($id_member);
        $simpan->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->kelamin,
            'tgl_lahir' => $request->lahir,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_tlp' => $request->tlp,
        ]);
        return redirect('/simpan')->with('success','Data Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id_member)
    {
        $simpan = simpanan::find($id_member);
        return view('simpan.simpan-hapus', compact('simpan'));
    }
    public function destroy(string $id_member)
    {
        $simpan = simpanan::find($id_member);
        $simpan -> delete();

        return redirect('/simpan')->with('success','Data Berhasil Di Hapus');
    }
}
