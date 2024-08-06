<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use Illuminate\Http\Request;

class anggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggota = anggota::all();
        return view('anggota.anggota', compact('anggota'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('anggota.anggota-entry');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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

        anggota::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->kelamin,
            'tgl_lahir' => $request->lahir,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_tlp' => $request->tlp,
        ]);

        return redirect('/anggota')->with('success','Data Berhasil Di Tambahkan');
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
        $anggota = anggota::find($id_member);
        return view('anggota.anggota-edit', compact('anggota'));
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

        $anggota = anggota::find($id_member);
        $anggota->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->kelamin,
            'tgl_lahir' => $request->lahir,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_tlp' => $request->tlp,
        ]);
        return redirect('/anggota')->with('success','Data Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id_member)
    {
        $anggota = anggota::find($id_member);
        return view('anggota.anggota-hapus', compact('anggota'));
    }
    public function destroy(string $id_member)
    {
        $anggota = anggota::find($id_member);
        $anggota -> delete();

        return redirect('/anggota')->with('success','Data Berhasil Di Hapus');
    }
}
