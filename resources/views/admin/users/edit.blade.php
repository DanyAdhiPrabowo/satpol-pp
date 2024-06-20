@extends('layouts.admin')

@section('title', 'Ubah Anggota')

@section('breadcrumbs', 'Ubah Anggota')
  
@section('second-breadcrumb')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="#"><i class="feather icon-user"></i></a></li>
    <li class="breadcrumb-item"><a href="#!">Anggota</a></li>
  </ul>
@endsection

@section('content')
  <div class="col-md-12">
    <div class="card">
        <div class="card-header">
          <div class="d-flex justify-content-between">
            <h5>Ubah Anggota</h5>
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
            <form method="POST" action="{{url('admin/users/'.$user->id)}}">
              @csrf
              @method('PUT')
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="Nama Anggota...." required name='name' value="{{ old('name', $user->name) }}">
                  <small class="form-text font-italic text-danger">{{$errors->first('name')}}</small>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                  <input type="email" class="form-control" placeholder="Email Anggota...." required name='email' value="{{ old('email', $user->email)}}">
                  <small class="form-text font-italic text-danger">{{$errors->first('email')}}</small>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Status</label>
                <div class="col-sm-9">
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="status" value="active" {{ (old("status", $user->status) == 'active') ? 'checked' : '' }}>
                      <label class="form-check-label">Aktif</label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="status" value="inactive" {{ (old("status", $user->status) == 'inactive') ? 'checked' : '' }}>
                      <label class="form-check-label">Tidak Aktif</label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                  <div class="col-sm-10">
  									<a href="{{route('admin.users.index')}}" class="btn btn-md btn-secondary">Kembali</a>
                    <button type="submit" class="btn  btn-primary">Simpan</button>
                  </div>
              </div>
            </form>
          </div>
        </div>
    </div>
  </div>
@endsection