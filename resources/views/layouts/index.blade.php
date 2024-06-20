<!DOCTYPE html>
<html lang="en">

  <head>
      <title>Admin - @yield('title')</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="" />
      <meta name="keywords" content="">
      <meta name="author" content="Phoenixcoded" />
      <!-- Favicon icon -->
      <link rel="icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon">

      <!-- vendor css -->
      <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
      
      <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
  </head>
  <body class="">
    @php
      $isAdmin = request()->segment(1) === 'admin';
    @endphp

    <!-- Start Left Bar -->
    @if($isAdmin) 
      @include('layouts.adminSidebar')
    @else
      @include('layouts.usuerSidebar')
    @endif
    <!-- End left Bar -->

    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
      <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
        <a href="#!" class="b-brand">
          <h5 class="m-b-10 text-light">SATPOL-PP</h5>
        </a>
        <a href="#!" class="mob-toggler">
          <i class="feather icon-more-vertical"></i>
        </a>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li>
            <span data-toggle="modal" data-target="#logoutModal" style="cursor: pointer;">
              Logout 
              <i class="feather icon-log-out ml-2"></i>
            </span>
          </li>

        </ul>
      </div>
    </header>
    
    <div class="pcoded-main-container">
      <div class="pcoded-content">
          <div class="page-header">
              <div class="page-block">
                  <div class="row align-items-center">
                      <div class="col-md-12">
                        <div class="page-header-title">
                          <h5 class="m-b-10">@yield('breadcrumbs')</h5>
                        </div>
                        @yield('second-breadcrumb')
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
            
            @yield('content')

          </div>
      </div>
    </div>



    <!-- Start Logut modal -->
    <div id="logoutModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="logoutModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="logoutModal">Logout</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            Apakah anda yakin ingin keluar?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn  btn-secondary" data-dismiss="modal">Tutup</button>
            <a href="{{url('admin/logout')}}" type="button" class="btn  btn-primary">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- End Logut modal -->


    <!-- Required Js -->
    <script src="{{asset('assets/js/vendor-all.min.js')}}"></script>

    <script src="{{asset('assets/js/vendor-all.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/pcoded.min.js')}}"></script>

    <!-- Apex Chart -->
    <script src="{{asset('assets/js/plugins/apexcharts.min.js')}}"></script>

    <!-- custom-chart js -->
    <script src="{{asset('assets/js/pages/dashboard-main.js')}}"></script>

    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>

    <script>
      new DataTable('#data-table', {
        ordering: true,
        lengthChange: false,
      });
    </script>
  </body>
</html>
