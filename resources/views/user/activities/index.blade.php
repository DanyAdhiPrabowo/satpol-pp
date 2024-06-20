@extends('layouts.index')

@section('title', 'Kegiatan')

@section('breadcrumbs', 'Kegiatan')
  
@section('second-breadcrumb')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="#"><i class="feather icon-list"></i></a></li>
    <li class="breadcrumb-item"><a href="#!">Kegiatan</a></li>
  </ul>
@endsection

@section('content')
  <div class="col-md-12">
    <div class="card">
        <div class="card-header">
          <div class="d-flex justify-content-between">
            <h5>Daftar Kegiatan</h5>
          </div>

        </div>
        <div class="card-body table-border-style">
            <div class="table-responsive">
                <table class="table" id="data-table">
                    <thead>
                        <tr>
                            <th width='10px'>#</th>
                            <th>Nama</th>
                            <th class='text-left'>Tanggal</th>
                            <th>Tempat</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($activities as $index => $data) 
                        <tr>
                          <td>{{$index+1}}</td>
                          <td>{{$data->name}}</td>
                          <td class='text-left'>{{$data->date}}</td>
                          <td>{{$data->place}}</td>
                          <td>
                            @if ($data->status=='active')
                              <span class="badge badge-pill badge-primary font-weight-bold">Active</span>
                            @elseif($data->status=='done')
                              <span class="badge badge-pill badge-info font-weight-bold">Done</span>
                            @else
                              <span  class="badge badge-pill badge-danger font-weight-bold">Expired</span>
                            @endif
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
@endsection