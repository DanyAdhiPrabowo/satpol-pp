@extends('layouts.index')

@section('title', 'Tambah Kegiatan')

@section('breadcrumbs', 'Tambah Kegiatan')
  
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
            <h5>Tambah Kegiatan</h5>
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
          <div class="col-6">
            <form method="POST" action="{{url('admin/activities')}}">
              @csrf
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama Kegiatan</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="Nama kegiatan...." required name='name' value="{{old('name')}}">
                  <small class="form-text font-italic text-danger">{{$errors->first('name')}}</small>
                </div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Petugas</label>
                  <div class="col-sm-9 form-group">
                    <select class="custom-select" name='user_id' required>
                      <option value="">--Pilih Petugas--</option>
                      @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                      @endforeach
                    </select>
                    <small class="form-text font-italic text-danger">{{$errors->first('user_id')}}</small>
                  </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tempat Kegiatan</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" rows="3" name='place' required>{{old('place')}}</textarea>
                    <small class="form-text font-italic text-danger">{{$errors->first('place')}}</small>
                  </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tanggal Kegiatan</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" lang="fr-CA" name='date' required>
                    <small class="form-text font-italic text-danger">{{$errors->first('date')}}</small>
                  </div>
              </div>
              <div class="form-group row">
                  <div class="col-sm-10">
  									<a href="{{route('admin.activities.index')}}" class="btn btn-md btn-secondary">Kembali</a>
                    <button type="submit" class="btn  btn-primary">Simpan</button>
                  </div>
              </div>
            </form>
          </div>
        </div>
    </div>
  </div>
@endsection