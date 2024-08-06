@extends('layouts.app')

@section('title')
    Data | Anggota
@endsection

@section('page')
  Data Anggota
@endsection

@section('content')
<div class="row">
  @if (session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0 d-flex">
          <h6 class="flex-grow-1">@yield('page')</h6>
          <a href="{{ route('anggota.create') }}" class="btn btn-primary">Add</a>
          <a href="" class="btn btn-primary" style="margin-left: 8px">Cetak</a>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-center">No.</th>
                  <th class="text-center">NIK</th>
                  <th class="text-center">Nama</th>
                  <th class="text-center">Jenis Kelamin</th>
                  <th class="text-center">Tgl lahir</th>
                  <th class="text-center">Alamat</th>
                  <th class="text-center">No Telepon</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($anggota as $agg)
                    <tr>
                      <td class="text-center">{{ $loop->iteration }}</td>
                      <td>{{ $agg->nik }}</td>
                      <td>{{ $agg->nama }}</td>
                      <td>{{ $agg->jenis_kelamin }}</td>
                      <td>{{ $agg->tgl_lahir }}</td>
                      <td>{{ $agg->alamat }}</td>
                      <td>{{ $agg->email }}</td>
                      <td>{{ $agg->no_tlp }}</td>
                      <td>
                        <a class='btn btn-success btn-sm' href="{{ route('anggota.edit',$agg->id_member) }}">Edit</a>
                        <a class='btn btn-danger btn-sm' href="/anggota/hapus/{{ $agg->id_member }}">Hapus</a>
                      </td>
                    </tr>
                @empty
                    <tr>
                      <td colspan="9" align="center">Tidak ada data</td>
                    </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection