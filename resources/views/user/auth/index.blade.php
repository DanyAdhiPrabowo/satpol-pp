<!DOCTYPE html>
<html lang="en">

  <head>

    <title>Flat Able - Premium Admin Template by Phoenixcoded</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />

    <link rel="icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon">


    <!-- vendor css -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    

  </head>

<body>
  <div class="auth-wrapper">
    <div class="auth-content text-center">
      <div class="card borderless">
        <div class="row align-items-center ">
          <div class="col-md-12">
            <div class="card-body">
              <h4 class="mb-3 f-w-400">User Login</h4>
              @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>{{session('error')}}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif
              <hr>
              <form method="POST" action="{{url('login')}}">
                @csrf
                <div class="form-group mb-3">
                  <input type="text" class="form-control" placeholder="Email address" name='email' required>
                  <small class="form-text font-italic text-left text-danger">{{$errors->first('email')}}</small>
                </div>
                <div class="form-group mb-4">
                  <input type="password" class="form-control" placeholder="Password" name='password' required>
                  <small class="form-text font-italic text-left text-danger">{{$errors->first('password')}}</small>
                </div>
                <button type="submit" class="btn btn-block btn-primary mb-4">Login</button>
              </form>
              <hr>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="{{asset('assets/js/vendor-all.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/js/pcoded.min.js')}}"></script>
</body>

</html>
