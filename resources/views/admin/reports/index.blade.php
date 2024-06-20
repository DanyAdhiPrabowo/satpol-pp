@extends('layouts.admin')

@section('title', 'Laporan Kegiatan')

@section('breadcrumbs', 'Laporan Kegiatan')
  
@section('second-breadcrumb')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="#"><i class="feather icon-list"></i></a></li>
    <li class="breadcrumb-item"><a href="#!">Laporan Kegiatan</a></li>
  </ul>
@endsection

@section('content')
  <div class="col-md-12">
    <div class="card">
        <div class="card-header">
          <div class="d-flex justify-content-between">
            <h5>Laporan Kegiatan</h5>
          </div>

        </div>
        <div class="card-body table-border-style">
            <div class="table-responsive">
                <table class="table" id="data-table">
                    <thead>
                        <tr>
                            <th width='10px'>#</th>
                            <th>Nama</th>
                            <th>Petugas</th>
                            <th width='80px'>Tanggal</th>
                            <th>Tempat</th>
                            <th>Foto</th>
                            <!-- <th>Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($activities as $index => $data) 
                        <tr>
                          <td>{{$index+1}}</td>
                          <td>{{$data->name}}</td>
                          <td>{{$data->username}}</td>
                          <td>{{$data->date}}</td>
                          <td>{{$data->place}}</td>
                          <td>
                            @if($data->image)
                              <img src="{{asset('reports/'.$data->image)}}" alt="" width="120px">
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