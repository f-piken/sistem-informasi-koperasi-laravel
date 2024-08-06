<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use App\Models\karyawan;
use App\Models\User;
use Illuminate\Http\Request;

class karyawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawan = User::all();
        return view('karyawan.karyawan', compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('karyawan.karyawan-entry');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'kelamin' => 'required',
            'lahir' => 'required',
            'role' => 'required',
            'email' => 'required',
            'tlp' => 'required',
            'user' => 'required',
            'pass' => 'required',
        ]);

        $user = karyawan::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->kelamin,
            'tgl_lahir' => $request->lahir,
            'no_tlp' => $request->tlp,
        ]);
         User::create([
            'karyawan_id' => $user->id_karyawan,
            'name' => $request->nama,
            'role' => $request->role,
            'email' => $request->email,
            'username' => $request->user,
            'password' => Hash::make($request->pass),
        ]);


        return redirect('/karyawan')->with('success','Data Berhasil Di Tambahkan');
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
    public function edit(string $id)
    {
        $karyawan = User::find($id);
        return view('karyawan.karyawan-edit', compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id,string $id_karyawan)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'kelamin' => 'required',
            'lahir' => 'required',
            'role' => 'required',
            'email' => 'required|email',
            'tlp' => 'required',
            'user' => 'required',
        ]);
    
        $karyawan = karyawan::find($id_karyawan);
        $user = User::find($id);
    
        $karyawan->nama = $request->nama;
        $karyawan->alamat = $request->alamat;
        $karyawan->jenis_kelamin = $request->kelamin;
        $karyawan->tgl_lahir = $request->lahir;
        $user->role = $request->role;
        $user->email = $request->email;
        $karyawan->no_tlp = $request->tlp;
        $user->username = $request->user;
    
        if ($request->filled('pass')) {
            $request->validate([
                'pass' => 'required',
            ]);
            $user->password = Hash::make($request->pass);
        }
    
        $user->save();
        $karyawan->save();
    
        return redirect('/karyawan')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id_karyawan)
    {
        $karyawan = karyawan::find($id_karyawan);
        return view('karyawan.karyawan-hapus', compact('karyawan'));
    }
    public function destroy(string $id_karyawan)
    {
        $karyawan = karyawan::find($id_karyawan);
        $karyawan -> delete();

        return redirect('/karyawan')->with('success','Data Berhasil Di Hapus');
    }
}
