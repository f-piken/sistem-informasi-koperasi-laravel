@extends('layouts.app')

@section('title')
    Data | transaksi
@endsection

@section('page')
  Data transaksi
@endsection

@section('cari')
  "{{ route('transaksi.index') }}"
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
          <a href="{{ route('transaksi.create') }}" class="btn btn-primary">Add</a>
          <a href="" class="btn btn-primary" style="margin-left: 8px">Cetak</a>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                  <tr>
                      <th class="text-center">No.</th>
                      <th class="text-center">Nama Anggota</th>
                      <th class="text-center">Nama Karyawan</th>
                      <th class="text-center">Tipe Transaksi</th>
                      <th class="text-center">Jumlah Transaksi</th>
                      <th class="text-center">Tanggal Transaksi</th>
                      <th class="text-center">Keterangan</th>
                      {{-- <th class="text-center">Action</th> --}}
                  </tr>
              </thead>
              <tbody>
                  @forelse ($transaksi as $trx)
                      <tr>
                          <td class="text-center">{{ $loop->iteration }}</td>
                          <td class="text-center">{{ $trx->anggota->nama }}</td>
                          <td class="text-center">{{ $trx->karyawan->nama }}</td>
                          <td class="text-center">{{ $trx->tipe_transaksi }}</td>
                          <td class="text-center">{{ $trx->jumlah_transaksi }}</td>
                          <td class="text-center">{{ $trx->tgl_transaksi }}</td>
                          <td class="text-center">{{ $trx->keterangan }}</td>
                          {{-- <td class="text-center">
                              <a class='btn btn-success btn-sm' href="{{ route('transaksi.edit', $trx->id_transaksi) }}">Edit</a>
                              <a class='btn btn-danger btn-sm' href="/transaksi/hapus/{{ $trx->id_transaksi }}">Hapus</a>
                          </td> --}}
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
{{ $transaksi->links() }}          
@endsection