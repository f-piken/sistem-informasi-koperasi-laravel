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
            <form action="{{ route('simpanan.store') }}" method="POST" class="p-4">
              @csrf
              <div class=" form-group">
                  <label for="nama">Nama Anggota</label>
                  <select name="nama" id="nama" class="form-select">
                      @foreach($simpan as $agg)
                          <option value="{{ $agg->anggota->id_member }}">{{ $agg->anggota->nama }}</option>
                      @endforeach
                  </select>
              </div>
          
              <div class="form-group">
                <label for="jenis">Jenis Simpanan</label>
                <select class="form-control" id="jenis" name="jenis">
                    <option value="">Pilih Jenis Simpanan</option>
                    <option value="pokok">Pokok</option>
                    <option value="wajib">Wajib</option>
                    <option value="sukarela">Sukarela</option>
                </select>
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection