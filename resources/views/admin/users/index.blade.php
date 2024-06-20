@extends('layouts.index')

@section('title', 'Anggota')

@section('breadcrumbs', 'Anggota')
  
@section('second-breadcrumb')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="#"><i class="feather icon-users"></i></a></li>
    <li class="breadcrumb-item"><a href="#!">Anggota</a></li>
  </ul>
@endsection

@section('content')
  <div class="col-md-12">
    <div class="card">
        <div class="card-header">
          <div class="d-flex justify-content-between">
            <h5>Daftar Anggota</h5>
            <a href="{{url('admin/users/create')}}" class='btn btn-sm btn-info'>Tambah</a>
          </div>

        </div>
        <div class="card-body table-border-style">
            <div class="table-responsive">
                <table class="table" id="data-table">
                    <thead>
                        <tr>
                            <th width='10px'>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th width='150px'>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $index => $user) 
                        <tr>
                          <td>{{$index+1}}</td>
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          <td>
                            @if ($user->status=='active')
                              <a href="{{url('admin/users/'.$user->id.'/update-status')}}" class="badge badge-primary font-weight-bold">Active</a>
                            @else
                              <a href="{{url('admin/users/'.$user->id.'/update-status')}}" class="badge badge-danger font-weight-bold">Inactive</a>
                            @endif
                          </td>
                          <td>
                            <a href="{{url('admin/users/'.$user->id.'/edit')}}" class='btn btn-sm btn-warning '>Ubah</a>
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