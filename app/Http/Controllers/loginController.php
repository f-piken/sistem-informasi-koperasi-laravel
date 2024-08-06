<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login.login');
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
        // Validasi input
        $infologin = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username Wajib Di Isi!',
            'password.required' => 'Password Wajib Di Isi!'
        ]);

        // Simpan username untuk ditampilkan kembali jika validasi gagal
        Session::flash('username', $request->username);
        
        // Cek autentikasi
        if (Auth::attempt($infologin)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('Success', 'Berhasil Login!');
        }else{
            return redirect('login')->withErrors('login','masukan username dan pasword yang benar');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = User::all();
        $karyawan = karyawan::all();
        return view('login.profil',compact('user','karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function ganti()
    {
        return view('login.reset-pass');
    }

    /**
     * Update the specified resource in storage.
     */
    public function simpan(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|confirmed',
        ], [
            'current_password.required' => 'Password saat ini wajib diisi!',
            'new_password.required' => 'Password baru wajib diisi!',
            'new_password.min' => 'Password baru minimal 8 karakter!',
            'new_password.confirmed' => 'Konfirmasi password baru tidak sesuai!',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Cek apakah password saat ini cocok dengan password di database
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Password saat ini tidak cocok!'])->withInput();
        }

        // Ubah password
        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        // Redirect dengan pesan sukses
        return redirect()->route('home')->with('success', 'Password berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        Auth::logout();
        return redirect('login')->with('success','Berhasil Log Out!');
    }
}
