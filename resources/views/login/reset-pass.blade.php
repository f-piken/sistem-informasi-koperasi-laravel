@extends('layouts.app')

@section('title')
    Reset Password
@endsection

@section('page')
  Reset Password
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0 d-flex">
          <h6 class="flex-grow-1">@yield('page')</h6>
        </div>
        <form action="{{ route('login.simpan') }}" method="POST" class="p-4">
            @csrf
            <div class="form-group">
                <label for="current_password">Password Saat Ini</label>
                <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" required>
                @error('current_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="new_password">Password Baru</label>
                <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" required>
                @error('new_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="new_password_confirmation">Konfirmasi Password Baru</label>
                <input type="password" name="new_password_confirmation" class="form-control" id="new_password_confirmation" required>
            </div>

            <button type="submit" class="btn btn-primary">Ubah Password</button>
        </form>
      </div>
    </div>
</div>

@endsection