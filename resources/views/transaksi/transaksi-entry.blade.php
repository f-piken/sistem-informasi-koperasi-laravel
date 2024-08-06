@extends('layouts.app')

@section('title')
    Data | transaksi
@endsection

@section('page')
  Entry Data transaksi
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0 d-flex">
          <h6 class="flex-grow-1">@yield('page')</h6>
          <a href="{{ route('transaksi.index') }}" class="btn btn-primary">Data transaksi</a>
        </div>
        @if (session('error'))
    <div class="alert alert-success">
      {{ session('error') }}
    </div>
  @endif
        <form action="{{ route('transaksi.store') }}" method="POST" class="p-4">
            @csrf
            <div class=" form-group">
                <label for="id_member">Nama Anggota</label>
                <select name="id_member" id="id_member" class="form-select">
                    @foreach($anggota as $agg)
                        <option value="{{ $agg->id_member }}">{{ $agg->nama }}</option>
                    @endforeach
                </select>
            </div>
        
            <div class="form-group">
                <label for="id_karyawan">Nama Karyawan</label>
                <select name="id_karyawan" id="id_karyawan" class="form-select">
                    @foreach($karyawan as $kry)
                        <option value="{{ $kry->id_karyawan }}">{{ $kry->nama }}</option>
                    @endforeach
                </select>
            </div>
        
            <div class="form-group">
                <label for="tipe_transaksi">Tipe Transaksi</label>
                <select class="form-control" id="tipe_transaksi" name="tipe_transaksi" required onchange="toggleFields()">
                    <option value="">Pilih Tipe Transaksi</option>
                    <option value="simpanan">Simpanan</option>
                    <option value="peminjaman">Pinjaman</option>
                </select>
            </div>
        
            <div id="simpanan_fields" style="display: none;">
                <div class="form-group">
                    <label for="jenis_simpanan">Jenis Simpanan</label>
                    <select class="form-control" id="jenis_simpanan" name="jenis_simpanan">
                        <option value="">Pilih Jenis Simpanan</option>
                        <option value="pokok">Pokok</option>
                        <option value="wajib">Wajib</option>
                        <option value="sukarela">Sukarela</option>
                    </select>
                </div>
            </div>
        
            <div id="pinjaman_fields" style="display: none;">
                {{-- <div class="form-group">
                    <label for="jumlah_pinjaman">Jumlah Pinjaman</label>
                    <input type="number" class="form-control" id="jumlah_pinjaman" name="jumlah_pinjaman">
                </div> --}}
        
                {{-- <div class="form-group">
                    <label for="tgl_pinjam">Tanggal Pinjam</label>
                    <input type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam" readonly>
                </div>
        
                <div class="form-group">
                    <label for="tgl_jatuh_tempo">Tanggal Jatuh Tempo</label>
                    <input type="date" class="form-control" id="tgl_jatuh_tempo" name="tgl_jatuh_tempo" readonly>
                </div> --}}
        
                <div class="form-group">
                    <label for="tenor">Tenor</label>
                    <select class="form-control" id="tenor" name="tenor">
                        <option value="">Pilih Tenor</option>
                        <option value="1">1 Bulan</option>
                        <option value="3">3 Bulan</option>
                        <option value="6">6 Bulan</option>
                        <option value="12">12 Bulan</option>
                    </select>
                </div>
            </div>
        
            <div class="form-group">
                <label for="jumlah_transaksi">Jumlah Transaksi</label>
                <input type="number" class="form-control" id="jumlah_transaksi" name="jumlah_transaksi" required>
            </div>
        
            {{-- <div class="form-group">
                <label for="tgl_transaksi">Tanggal Transaksi</label>
                <input type="date" class="form-control" id="tgl_transaksi" name="tgl_transaksi" required onchange="updatePinjamanDates()">
            </div> --}}
        
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" required>
            </div>
        
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
</div>
@endsection