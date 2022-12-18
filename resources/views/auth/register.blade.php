
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>Register</title>
  <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/css/ruang-admin.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-12 col-md-6">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                    <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Register</h1>
                    </div>

                    <form action="{{ route('register') }}" class="user" method="POST">
                    @csrf

                    <div class="form-group">
                      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" 
                        value="{{ old('name') }}" id="name" placeholder="Name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                      <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" 
                        value="{{ old('email') }}" id="email" aria-describedby="emailHelp" placeholder="Email Address">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                      <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" 
                        id="password" placeholder="Password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                      <input type="password" class="form-control" name="password_confirmation" id="password-confirm" 
                      placeholder="Confirm Password" required autocomplete="new-password">
                    </div>
                    
                    <div class="form-group">
                      <button class="btn btn-primary btn-block" type="submit">Register</button>
                    </div>
                    
                  </form>
                  <div class="text-center">
                  <p>Already have an account ? <a class="font-weight-bold" href="{{ route('login') }}">Login</a></p>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('assets/js/ruang-admin.min.js') }}"></script>
</body>

</html>
