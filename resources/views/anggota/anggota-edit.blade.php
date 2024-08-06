@extends('layouts.app')

@section('title')
    Data | Anggota
@endsection

@section('page')
  Edit Data Anggota
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0 d-flex">
          <h6 class="flex-grow-1">@yield('page')</h6>
          <a href="{{ route('anggota.index') }}" class="btn btn-primary">Data Anggota</a>
        </div>
        <form action="{{ route('anggota.update',$anggota->id_member) }}" method="post" class="p-4">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="number" class="form-control" name="nik" id="nik" value="{{ old('nik', $anggota->nik) }}">
                @error('nik')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama', $anggota->nama) }}">
                @error('nama')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kelamin" class="form-label">Jenis Kelamin</label>
                <select id="kelamin" name="kelamin" class="form-select">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="laki-laki" {{ old('kelamin', $anggota->jenis_kelamin) == 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                    <option value="perempuan" {{ old('kelamin', $anggota->jenis_kelamin) == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('kelamin')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" name="lahir" id="lahir" value="{{ old('lahir', $anggota->tgl_lahir) }}">
                @error('lahir')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" id="alamat" value="{{ old('alamat', $anggota->alamat) }}">
                @error('alamat')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $anggota->email) }}">
                @error('email')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tlp" class="form-label">No Telepon</label>
                <input type="number" class="form-control" name="tlp" id="tlp" value="{{ old('tlp', $anggota->no_tlp) }}">
                @error('tlp')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary float-end" name="simpan" style="margin-right: 10px">Simpan Perubahan</button>
        </form>
      </div>
    </div>
</div>
@endsection