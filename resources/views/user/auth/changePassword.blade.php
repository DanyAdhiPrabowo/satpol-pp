@extends('layouts.index')

@section('title', 'Ganti Password')

@section('breadcrumbs', 'Ganti Password')
  
@section('second-breadcrumb')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="#"><i class="feather icon-list"></i></a></li>
    <li class="breadcrumb-item"><a href="#!">Ganti Password</a></li>
  </ul>
@endsection

@section('content')
  <div class="col-md-4">
    <div class="card">
        <div class="card-body">
            <div class="auth-content text-center">
              <div class="row">
                <div class="col-md-12">
                  <div class="card-body">
                    <h4 class="mb-3 f-w-400">Ganti Password</h4>
                    @if (session('error'))
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{session('error')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif

                    @if (session('success'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif
                    <hr>
                    <form method="POST" action="{{url('change-password')}}">
                      @csrf
                      @method('PUT')
                      <div class="form-group mb-4">
                        <input type="password" class="form-control" placeholder="Password" name='password' required>
                        <small class="form-text font-italic text-left text-danger">{{$errors->first('password')}}</small>
                      </div>
                      <div class="form-group mb-4">
                        <input type="password" class="form-control" placeholder="Password Baru" name='newPassword' required>
                        <small class="form-text font-italic text-left text-danger">{{$errors->first('newPassword')}}</small>
                      </div>
                      <div class="form-group mb-4">
                        <input type="password" class="form-control" placeholder="Konfirmasi Password Baru" name='confirmPassword' required>
                        <small class="form-text font-italic text-left text-danger">{{$errors->first('confirmPassword')}}</small>
                      </div>
                      <button type="submit" class="btn btn-block btn-primary mb-4">Simpan</button>
                    </form>
                    <hr>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
  </div>
@endsection