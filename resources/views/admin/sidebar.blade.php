 <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
        </div>
        <img src="{{url('img/foto/logo1.png')}}" style="width: 30%" rel="icon">
        <div class="sidebar-brand-text mx-3">SI Laundry</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/administrator')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Fitur
      </div>
<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Master Data</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{url('/customer')}}">Data Customer</a>
            <a class="collapse-item" href="{{url('/karyawan')}}">Data Karyawan</a>
            <a class="collapse-item" href="{{url('/jenis')}}">Jenis Laundry</a>
          </div>
        </div>
      </li>
      </li>

      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Riwayat
      </div>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/transaksi')}}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Riwayat Transaksi</span>
        </a>

      <hr class="sidebar-divider">
       <li class="nav-item">
        <a class="nav-link" href="{{ asset('/home') }}">
          <i class="bi bi-box-arrow-right"></i>
          <span>Logout</span>
        </a>
      </li>
    </ul>