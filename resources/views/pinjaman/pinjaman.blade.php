@extends('layouts.app')

@section('title')
    Data | pinjaman
@endsection

@section('page')
  Data pinjaman
@endsection

@section('cari')
  "{{ route('pinjaman.index') }}"
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
                      <th class="text-center">Nama</th>
                      <th class="text-center">Jumlah Pinjaman</th>
                      <th class="text-center">Tanggal Pinjam</th>
                      <th class="text-center">Tanggal Jatuh Tempo</th>
                      <th class="text-center">Tenor</th>
                      <th class="text-center">Jumlah Bayar</th>
                      <th class="text-center">Status Pinjaman</th>
                  </tr>
              </thead>
              <tbody>
                  @forelse ($pinjaman as $pjm)
                      <tr>
                          <td class="text-center">{{ $loop->iteration }}</td>
                          <td class="text-center">{{ $pjm->anggota->nama }}</td>
                          <td class="text-center">{{ $pjm->jumlah_pinjaman }}</td>
                          <td class="text-center">{{ $pjm->tgl_pinjam }}</td>
                          <td class="text-center">{{ $pjm->tgl_jatuh_tempo }}</td>
                          <td class="text-center">{{ $pjm->tenor }}</td>
                          <td class="text-center">{{ $pjm->jumlah_bayar }}</td>
                          <!-- Kondisi untuk status pinjaman -->
                          @if ($pjm->status_pinjaman == "lunas")
                            <td class="text-center">
                                <a class="btn btn-success btn-sm">
                                    {{ $pjm->status_pinjaman }}
                                </a>
                            </td>
                          @else
                            <td class="text-center">
                              <a class="btn btn-danger btn-sm" href="{{ route('pinjaman.edit', $pjm->id_pinjaman) }}">
                                  {{ $pjm->status_pinjaman }}
                              </a>
                            </td>
                          @endif
                      </tr>
                  @empty
                      <tr>
                          <td colspan="8" align="center">Tidak ada data</td>
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