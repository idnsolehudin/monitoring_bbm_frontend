<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="index.html" class="site_title">
        <img src="../public/images/wings-logo.png" alt="logo wings" class="w-25">
        <span>Wings Group</span>
      </a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        @if (session('user')['image'] == "")
          <img src="../public/images/user.png" alt="..." class="img-circle profile_img">
          @else
          <img src="https://monitoringbbm.com/files/{{ session('user')['image'] }}" alt="..." class="img-circle profile_img">
        @endif
      </div>
      <div class="profile_info">
        <span>Welcome,</span>
        <h2>{{ session('user')['name'] }}</h2>
        <p>{{ session('user')['nik'] }}</p>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>MENU</h3>
          <ul class="nav side-menu">
          <li><a><i class="fa fa-table"></i> LAPORAN <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ route('show.currentreports') }}">LAPORAN HARIAN</a></li>
              <li><a href="{{ route('show.reports') }}">DATA LAPORAN</a></li>
              <li><a href="{{ route('form.filtered.reports') }}">LAPORAN PER TANGGAL</a></li>
              <li><a href="{{ route('form.create.reports') }}">INPUT LAPORAN</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-truck"></i> KENDARAAN <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ route("show.vehicle") }}">List Data Kendaraan</a></li>
              <li><a href="{{ route("create.vehicle") }}">Tambah Kendaraan</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-van-shuttle"></i> TIPE KENDARAAN <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ route("show.vehicletype") }}">List Tipe Data Kendaraan</a></li>
              <li><a href="{{ route("create.vehicletype") }}">Tambah Tipe Kendaraan</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-user-group"></i> PERSONIL <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ route("show.user") }}">List Data Personil</a></li>
              <li><a href="{{ route("create.user") }}">Tambah Personil</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-map-location"></i> RUTE PENGIRIMAN <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ route("show.route") }}">List Rute Pengiriman</a></li>
              <li><a href="{{ route("create.route") }}">Tambah Rute Pengiriman</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <!-- /sidebar menu -->
  </div>
</div>
