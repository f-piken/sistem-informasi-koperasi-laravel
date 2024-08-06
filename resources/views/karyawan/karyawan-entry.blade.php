@extends('layouts.app')

@section('title')
    Data | Anggota
@endsection

@section('page')
  Entry Data Anggota
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0 d-flex">
          <h6 class="flex-grow-1">@yield('page')</h6>
          <a href="{{ route('anggota.index') }}" class="btn btn-primary">Data Anggota</a>
        </div>
        <form action="{{ route('karyawan.store') }}" method="post" class="p-4">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" >
                @error('nama')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" id="alamat" >
                @error('alamat')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kelamin" class="form-label">Jenis Kelamin</label>
                <select id="kelamin" name="kelamin" class="form-select">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="laki-laki">Laki-Laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
                @error('kelamin')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" name="lahir" id="lahir" >
                @error('lahir')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select id="role" name="role" class="form-select">
                    <option value="">Pilih Role</option>
                    <option value="admin">Admin</option>
                    <option value="pegawai">Pegawai</option>
                </select>
                @error('role')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" >
                @error('email')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tlp" class="form-label">No Telepon</label>
                <input type="number" class="form-control" name="tlp" id="tlp" >
                @error('tlp')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="user" class="form-label">Username</label>
                <input type="text" class="form-control" name="user" id="user" >
                @error('user')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Password</label>
                <input type="password" class="form-control" name="pass" id="pass" >
                @error('password')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary float-end" name="simpan" style="margin-right: 10px">Simpan</button>
        </form>
      </div>
    </div>
</div>
@endsection