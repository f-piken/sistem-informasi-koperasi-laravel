@extends('layouts.app')

@section('title')
    Data | karyawan
@endsection

@section('page')
  Entry Data karyawan
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0 d-flex">
          <h6 class="flex-grow-1">@yield('page')</h6>
          <a href="{{ route('karyawan.index') }}" class="btn btn-primary">Data karyawan</a>
        </div>
        <form action="{{ route('karyawan.update', $karyawan->id) }}" method="post" class="p-4">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama', $karyawan->karyawan->nama) }}">
                @error('nama')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" id="alamat" value="{{ old('alamat', $karyawan->karyawan->alamat) }}">
                @error('alamat')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kelamin" class="form-label">Jenis Kelamin</label>
                <select id="kelamin" name="kelamin" class="form-select">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="laki-laki"{{ old('kelamin', $karyawan->karyawan->jenis_kelamin) == 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                    <option value="perempuan"{{ old('kelamin', $karyawan->karyawan->jenis_kelamin) == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('kelamin')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" name="lahir" id="lahir" value="{{ old('lahir', $karyawan->karyawan->tgl_lahir) }}">
                @error('lahir')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select id="role" name="role" class="form-select">
                    <option value="">Pilih Role</option>
                    <option value="admin"{{ old('role', $karyawan->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="pegawai"{{ old('role', $karyawan->role) == 'pegawai' ? 'selected' : '' }}>Pegawai</option>
                </select>
                @error('role')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $karyawan->email) }}">
                @error('email')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tlp" class="form-label">No Telepon</label>
                <input type="number" class="form-control" name="tlp" id="tlp" value="{{ old('tlp', $karyawan->karyawan->no_tlp) }}">
                @error('tlp')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="user" class="form-label">Username</label>
                <input type="text" class="form-control" name="user" id="user" value="{{ old('uuser', $karyawan->username) }}">
                @error('user')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Password</label>
                <input type="password" class="form-control" name="pass" id="pass">
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