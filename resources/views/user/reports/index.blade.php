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
                <table class="table" id="data-table">
                    <thead>
                        <tr>
                            <th width='10px'>#</th>
                            <th>Nama</th>
                            <th width='80px'>Tanggal</th>
                            <th>Tempat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($activities as $index => $data) 
                        <tr>
                          <td>{{$index+1}}</td>
                          <td>{{$data->name}}</td>
                          <td>{{$data->date}}</td>
                          <td>{{$data->place}}</td>
                          <td> 
                            <button class='btn btn-sm btn-info' data-toggle="modal" data-target="#uploadModal" id='upload' data-id="{{$data->id}}">
                              Upload
                            </button>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>

  <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Select Foto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form id="uploadForm" action="" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="form-group">
              <label for="image" class="col-form-label">Foto</label>
              <input type="file" class="form-control" name='image' required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn  btn-primary">Upload</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', (event) => {
      const uploadButtons = document.querySelectorAll('#upload');

      uploadButtons.forEach(button => {
        button.addEventListener('click', function() {
          const dataId = this.getAttribute('data-id');
          const uploadForm = document.getElementById('uploadForm');

          const formActionUrl = `{{ url('report') }}/${dataId}/upload`;
          uploadForm.setAttribute('action', formActionUrl);
        });
      });
    });
  </script>
@endsection