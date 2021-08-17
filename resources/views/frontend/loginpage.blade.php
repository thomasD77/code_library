<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Divemaster - Login</title>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/front_koolskampkoers-app.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-dark">
<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center mt-5">
        <div class="col-xl-10 col-lg-12 col-md-9 mt-5">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6">
                            <img class="img-fluid" src="{{'images/frontend/diving.jpeg'}}" alt="">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Divemaster ! </h1>
                                </div>
                                <form method="POST" action="{{route('login')}}" class="user">
                                    @csrf
                                    <div class="form-group row d-flex flex-column">
                                        <label for="email" class="col-12 col-form-label ">{{ __('E-Mail Address') }}</label>
                                        <div class="col-12">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row d-flex flex-column">
                                        <label for="password" class="col-12 col-form-label text-md-left">{{ __('Password') }}</label>
                                        <div class="col-12">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-12 d-flex flex-column">
                                            <button type="submit" class="btn btn-dark">
                                                {{ __('Login') }}
                                            </button>
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link text-md-left" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    <hr>
                                    @if(Session::has('login_message'))
                                        <p class="alert alert-dark my-3">{{session('login_message')}}</p>
                                    @endif
                                   {{-- <a href="{{route('login.social', 'google')}}" class="btn btn-danger btn-google btn-user btn-block">
                                        <i class="fab fa-google fa-fw"></i> Login with Google
                                    </a>
                                    <a href="{{route('login.social', 'facebook')}}" class="btn btn-primary btn-facebook btn-user btn-block">
                                        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                    </a>--}}
                                </form>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <div class="form-check d-flex">
                                            <p class="">Don't have a account yet? </p>
                                            <a href="{{ route('register') }}" class="ml-2 text-sm text-gray-700 underline">Register Here</a>
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
</div>
<script src="{{asset('js/front_koolskampkoers-app.js')}} defer"></script>
</body>
</html>
