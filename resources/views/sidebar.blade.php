<!-- Sidebar -->
      <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="/dashboard" style="color:white"; class="logo"> Inventory
              <!-- <img src="{{ asset('kaiadmin/assets/img/kaiadmin/logo_light.svg') }}"
                alt="navbar brand"
                class="navbar-brand"
                height="20"
              /> -->
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
             <!-- Menu untuk Admin -->
                @if(Auth::user()->role === 'admin')
                    <li class="nav-item">
                        <a href="{{route('dashboard.dashboardAdmin')}}">
                            <i class="fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/users">
                            <i class="fas fa-users"></i>
                            <p>Kelola User</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/laporan">
                            <i class="fas fa-file-alt"></i>
                            <p>Laporan</p>
                        </a>
                    </li>

                <!-- Menu untuk Super Admin -->
                @elseif(Auth::user()->role === 'super')
                    <li class="nav-item">
                        <a href="{{route('dashboard.dashboardSuper')}}">
                            <i class="fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/managemen-pengguna">
                            <i class="fas fa-user-shield"></i>
                            <p>Manajemen Pengguna</p>
                        </a>
                    </li>

                <!-- Menu untuk User -->
                @else
                    <li class="nav-item">
                        <a href="{{route('dashboard.dashboardUser')}}">
                            <i class="fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/profile">
                            <i class="fas fa-user"></i>
                            <p>Profil Saya</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/aktivitas">
                            <i class="fas fa-list"></i>
                            <p>Aktivitas</p>
                        </a>
                    </li>
                @endif
            </ul>
          </div>
        </div>
      </div>
      <!-- End Sidebar -->