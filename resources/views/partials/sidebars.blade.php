<div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="{{ route('home') }}" >
        <img src="{{ asset('tamplate/assets/img/logo-ct-dark.png')}}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">SI Koperasi</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('home') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ route('simpanan.index') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-money-coins text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Simpanan</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ route('pinjaman.index') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Pinjaman</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ route('transaksi.index') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Transaksi</span>
          </a>
        </li>
        @if(auth()->user()->role == 'admin')
          <li class="nav-item">
            <a class="nav-link " href="{{ route('anggota.index') }}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-world text-danger text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Anggota</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ route('karyawan.index') }}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Karyawan</span>
            </a>
          </li>
        @endif
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ url('/login/show') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <form class="dropdown-item d-flex align-items-center nav-link collapsed" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="nav-link text-dark text-sm opacity-10" style="background-color: transparent; border: none; padding: 0;">
              <div>
                <i class="material-icons">logout</i>
              </div>
              Sign Out
            </button>
          </form>
        </li>
      </ul>
    </div>
  </aside>