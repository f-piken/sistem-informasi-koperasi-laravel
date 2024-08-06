<?php

namespace App\Http\Controllers;

use App\Models\pinjaman;
use App\Models\simpanan;
use Illuminate\Http\Request;

class pinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has("search")) {
            $pinjaman = pinjaman::select('pinjaman.*')
            ->join('anggota', 'pinjaman.id_member', '=', 'anggota.id_member')
            ->where(function($query) use ($request) {
                      $query->Where('pinjaman.jumlah_pinjaman', 'like', "%".$request->search."%")
                      ->orWhere('pinjaman.status_pinjaman', 'like', "%".$request->search."%")
                      ->orWhere('anggota.nama', 'like', "%".$request->search."%");
            })
            ->paginate(15);
        }else {
            $pinjaman = pinjaman::paginate(15);
        }

        return view('pinjaman.pinjaman', compact('pinjaman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id_pinjaman)
    {
        $pinjaman = pinjaman::find($id_pinjaman);
        return view('pinjaman.pinjaman-status', compact('pinjaman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_pinjaman)
    {
        $pinjaman = pinjaman::find($id_pinjaman);
        $pinjaman->update([
            'status_pinjaman' => 'lunas',
        ]);
        return redirect('/pinjaman')->with('success','Data Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id_member)
    {
        //
    }
    public function destroy(string $id_member)
    {
        //
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        $pinjaman = pinjaman::where('nama', 'like', "%{$query}%")
            ->orWhere('id_member', 'like', "%{$query}%")
            ->orWhere('status_pinjaman', 'like', "%{$query}%")
            ->orWhere('jumlah_pinjaman', 'like', "%{$query}%")
            ->get();

        return view('pinjaman.pinjaman', compact('pinjaman'));
    }
}
