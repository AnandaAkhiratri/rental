<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">RENT CAR</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">RC</a>
    </div>
    <ul class="sidebar-menu">

      <li class="menu-header">Master Data</li>
      <li class="{{ Request::is('car*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('car.index') }}"><i class="fas fa-car"></i> <span>Data Mobil</span></a></li>
      @if (auth()->user()->role == "ADM")
        <li class="{{ Request::is('user*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('user.index') }}"><i class="fas fa-users"></i> <span>Data Pengguna</span></a></li>          
      @endif
      <li class="menu-header">Transaksi</li>
      <li class="{{ Request::is('rent*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('rent.index') }}"><i class="fas fa-clipboard"></i> <span>Peminjaman  Mobil</span></a></li>
      <li class="{{ Request::is('return*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('return.index') }}"><i class="fas fa-clipboard-list"></i> <span>Pengembalian  Mobil</span></a></li>
    </ul>

  </aside>
</div>