@php
  $url = request()->segment(2);
@endphp

<nav class="pcoded-navbar  ">
  <div class="navbar-wrapper  ">
    <div class="navbar-content scroll-div " >
      <div class="">
        <div class="main-menu-header">
          <img class="img-radius" src="{{asset('assets/images/user/admin.png')}}" alt="User-Profile-Image">
          <div class="user-details">
            <span>{{session()->get('admin')['name']}}</span>
            <div>Admin</div>
          </div>
        </div>
      </div>
      
      <ul class="nav pcoded-inner-navbar ">
        <li class="nav-item pcoded-menu-caption">
          <label>Navigation</label>
        </li>
        <li class="nav-item {{$url=='dashboard'?'active':''}}">
            <a href="{{url('admin/dashboard')}}" class="nav-link ">
              <span class="pcoded-micon">
                <i class="feather icon-home"></i>
              </span>
              <span class="pcoded-mtext">Dashboard</span>
            </a>
        </li>
        <li class="nav-item {{$url=='users'?'active':''}}">
          <a href="{{url('admin/users')}}" class="nav-link ">
            <span class="pcoded-micon">
              <i class="feather icon-users"></i>
            </span>
            <span class="pcoded-mtext">Anggota</span>
          </a>
        </li>
        <li class="nav-item {{$url=='activities'?'active':''}}">
          <a href="{{url('admin/activities')}}" class="nav-link ">
            <span class="pcoded-micon">
              <i class="feather icon-list"></i>
            </span>
            <span class="pcoded-mtext">Daftar Kegiatan</span>
          </a>
        </li>
        <li class="nav-item {{$url=='reports'?'active':''}}">
          <a href="{{url('admin/reports')}}" class="nav-link ">
            <span class="pcoded-micon">
              <i class="feather icon-sidebar"></i>
            </span>
            <span class="pcoded-mtext">Laporan Kegiatan</span>
          </a>
        </li>
      </ul>          
    </div>
  </div>
</nav>