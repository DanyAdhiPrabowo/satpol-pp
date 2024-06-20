@extends('layouts.index')

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
              <form action="{{url('admin/reports/'.$activity->id.'/upload')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name='image' required>
                  <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                  <div class="invalid-feedback">Example invalid custom file feedback</div>
                </div>
                <button type="submit">Upload</button>
              </form>
            </div>
        </div>
    </div>
  </div>
@endsection