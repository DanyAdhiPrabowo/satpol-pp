@extends('layouts.index')

@section('title', 'Dashboard')

@section('breadcrumbs', 'Dashboard')
  
@section('second-breadcrumb')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
    <li class="breadcrumb-item"><a href="#!">Dashboard</a></li>
  </ul>
@endsection

@section('content')
  <!-- Card -->
  <div class="col-md-12 col-xl-4">
    <div class="card flat-card widget-primary-card">
        <div class="row-table">
            <div class="col-sm-3 card-body">
                <i class="feather icon-star-on"></i>
            </div>
            <div class="col-sm-9">
                <h4>{{$userTotal}}</h4>
                <h6>Total Anggota</h6>
            </div>
        </div>
    </div>
  </div>
  <div class="col-md-12 col-xl-4">
    <div class="card flat-card widget-purple-card">
        <div class="row-table">
            <div class="col-sm-3 card-body">
                <i class="fas fa-users"></i>
            </div>
            <div class="col-sm-9">
                <h4>{{$userActive}}</h4>
                <h6>Anggota Aktif</h6>
            </div>
        </div>
    </div>
  </div>
  <div class="col-md-12 col-xl-4">
    <div class="card flat-card widget-danger-card">
        <div class="row-table">
            <div class="col-sm-3 card-body">
                <i class="fas fa-user"></i>
            </div>
            <div class="col-sm-9">
                <h4>{{$userInactive}}</h4>
                <h6>Anggota Non Aktif</h6>
            </div>
        </div>
    </div>
  </div>
  <!-- End Card -->

  <div class="col-xl-12 col-md-12">
      <div class="card table-card">
          <div class="card-header">
              <h5>Daftar kegiatan terbaru</h5>
              <div class="card-header-right">
                  <div class="btn-group card-option">
                      <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="feather icon-more-horizontal"></i>
                      </button>
                      <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                        <li class="dropdown-item full-card">
                          <a href="#!">
                            <span><i class="feather icon-maximize"></i> maximize</span>
                            <span style="display:none"><i class="feather icon-minimize"></i> Restore</span>
                          </a>
                        </li>
                      </ul>
                  </div>
              </div>
          </div>
          <div class="card-body p-0">
              <div class="table-responsive">
                  <table class="table table-hover mb-0">
                      <thead>
                          <tr>
                            <th>Kegiatan</th>
                            <th>Nama</th>
                            <th>Tempat</th>
                            <th class="text-right">Tanggal</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($activities as $data)
                        <tr>
                          <td>{{$data->name}}</td>
                          <td>{{$data->username}}</td>
                          <td>{{$data->place}}</td>
                          <td class="text-right">{{$data->date}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
@endsection