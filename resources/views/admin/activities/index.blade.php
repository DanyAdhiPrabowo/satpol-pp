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
            <a href="{{url('admin/activities/create')}}" class='btn btn-sm btn-info'>Tambah</a>
          </div>

        </div>
        <div class="card-body table-border-style">
          @if (session('success'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
              <strong>{{session('success')}}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
          @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>{{session('error')}}</strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
						</div>
          @endif
            <div class="table-responsive">
                <table class="table" id="data-table">
                    <thead>
                        <tr>
                            <th width='10px'>#</th>
                            <th>Nama</th>
                            <th>Petugas</th>
                            <th>Tanggal</th>
                            <th>Tempat</th>
                            <th>Status</th>
                            <th width='150px'>Aksi</th>
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
                            @if ($data->status=='active')
                              <span class="badge badge-pill badge-primary font-weight-bold">Active</span>
                            @elseif($data->status=='done')
                              <span class="badge badge-pill badge-info font-weight-bold">Done</span>
                            @else
                              <span  class="badge badge-pill badge-danger font-weight-bold">Expired</span>
                            @endif
                          </td>
                          <td>
                            <form class="d-inline" method="POST" action="{{route('admin.activities.destroy', [$data->id])}}" >
                              @method('delete')
                              @csrf
                              <button type="submit" class='btn btn-sm btn-danger '>Hapus</button>
                            </form>
                            <a href="{{url('admin/activities/'.$data->id.'/edit')}}" class='btn btn-sm btn-warning '>Ubah</a>
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