@extends('layouts.app')

@section('title')
    Data | pinjaman
@endsection

@section('page')
  Entry Data pinjaman
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0 d-flex">
          <h6 class="flex-grow-1">@yield('page')</h6>
          <a href="{{ route('pinjaman.index') }}" class="btn btn-primary">Data pinjaman</a>
        </div>
        <div class="p-4">
            <h4>Ingin Menghapus Data ?</h4>
            <form action="{{ route('pinjaman.destroy', $pinjaman->id_pinjaman) }}" method="POST">
                @csrf
                @method('patch')
                <button type="submit" class="btn btn-success btn-sm" name="lunas">Yes</button>
                <a class="btn btn-danger btn-sm " href="{{ route('pinjaman.index') }}">No</a>
            </form>
          </div>
      </div>
    </div>
</div>
@endsection