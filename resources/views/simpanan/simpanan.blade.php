@extends('layouts.app')

@section('title')
    Data | simpanan
@endsection

@section('page')
  Data simpanan
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
          <a href="" class="btn btn-primary" style="margin-left: 8px">Cetak</a>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                  <tr>
                      <th class="text-center">No.</th>
                      <th class="text-center">ID Member</th>
                      <th class="text-center">Jenis Simpanan</th>
                      <th class="text-center">Jumlah Simpanan</th>
                      <th class="text-center">Tanggal Simpan</th>
                      <th class="text-center">Action</th>
                  </tr>
              </thead>
              <tbody>
                  @forelse ($jenis as $simp)
                      <tr>
                          <td class="text-center">{{ $loop->iteration }}</td>
                          <td class="text-center">{{ $simp->id_member }}</td>
                          <td class="text-center">{{ $simp->jenis_simpanan }}</td>
                          <td class="text-center">{{ $simp->jumlah_simpanan }}</td>
                          <td class="text-center">{{ $simp->tgl_simpan }}</td>
                          <td class="text-center">
                              <a class='btn btn-success btn-sm' href="{{ route('simpanan.edit', $simp->id_simpan) }}">Edit</a>
                              <a class='btn btn-danger btn-sm' href="/simpanan/hapus/{{ $simp->id_simpan }}">Hapus</a>
                          </td>
                      </tr>
                  @empty
                      <tr>
                          <td colspan="6" align="center">Tidak ada data</td>
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