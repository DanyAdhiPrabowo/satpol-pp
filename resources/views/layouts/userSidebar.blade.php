@php
  $url = request()->segment(1);
@endphp
<nav class="pcoded-navbar  ">
  <div class="navbar-wrapper  ">
    <div class="navbar-content scroll-div " >
      <div class="">
        <div class="main-menu-header">
          <img class="img-radius" src="{{asset('assets/images/user/admin.png')}}" alt="User-Profile-Image">
          <div class="user-details">
            <span>{{session()->get('user')['name']}}</span>
            <div>User</div>
          </div>
        </div>
      </div>
      
      <ul class="nav pcoded-inner-navbar ">
        <li class="nav-item pcoded-menu-caption">
          <label>Navigation</label>
        </li>
        <li class="nav-item {{$url=='dashboard'?'active':''}}">
            <a href="{{url('dashboard')}}" class="nav-link ">
              <span class="pcoded-micon">
                <i class="feather icon-home"></i>
              </span>
              <span class="pcoded-mtext">Dashboard</span>
            </a>
        </li>
        <li class="nav-item {{$url=='activities'?'active':''}}">
          <a href="{{url('activities')}}" class="nav-link ">
            <span class="pcoded-micon">
              <i class="feather icon-list"></i>
            </span>
            <span class="pcoded-mtext">Daftar Kegiatan</span>
          </a>
        </li>
        <li class="nav-item {{$url=='report'?'active':''}}">
          <a href="{{url('report')}}" class="nav-link ">
            <span class="pcoded-micon">
              <i class="feather icon-sidebar"></i>
            </span>
            <span class="pcoded-mtext">Lapor Kegiatan</span>
          </a>
        </li>
      </ul>          
    </div>
  </div>
</nav>