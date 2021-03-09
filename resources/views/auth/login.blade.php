{{--@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection--}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/logo_site.png">
    <title>{{ env("APP_NAME") }}</title>
    <link rel="stylesheet" type="text/css" href="../../assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
    <link rel="stylesheet" type="text/css" href="../../assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/>
    <link rel="stylesheet" href="../../assets/css/style.css" type="text/css"/>
</head>
<body class="be-splash-screen">
<div class="be-wrapper be-login">
    <div class="be-content">
        <div class="main-content container-fluid">
            <div class="splash-container">
                <div class="panel panel-default panel-border-color panel-border-color-primary">
                    <div class="panel-heading">
                        <img src="images/logo_site.png" alt="logo" width="100" height="100" class="logo-img">
                        <span class="splash-description">Entre com suas informações de login</span>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input id="email" type="email" placeholder="Seu email"
                                       class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                {{--<input id="username" type="text" placeholder="Username" autocomplete="off" class="form-control">--}}

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="form-group">

                                <input id="password" type="password" placeholder="Senha" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row login-tools">
                                <div class="col-xs-6 login-remember">
                                    <div class="be-checkbox">
                                        {{--<input type="checkbox" id="remember">--}}
                                        {{--<label for="remember">Remember Me</label>--}}
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Lembrar-Me') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xs-6 login-forgot-password"><a href="{{ route('password.forgot') }}">Esqueceu sua senha?</a></div>
                            </div>
                            <div class="form-group login-submit">
                                <button data-dismiss="modal" type="submit" class="btn btn-primary btn-xl">Entrar</button>
                            </div>
                        </form>
                    </div>
                </div>
                {{--<div class="splash-footer"><span>Don't have an account? <a href="#">Sign Up</a></span></div>--}}
            </div>
        </div>
    </div>
</div>
<script src="../../assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
<script src="../../assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="../../assets/js/main.js" type="text/javascript"></script>
<script src="../../assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../js/common.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        //initialize the javascript
        App.init();
    });

</script>

@if(Session::has('success.msg'))
    <script>
        $(function (){
            sweet_alert_success('{!! Session::get('success.msg') !!}')
        });
    </script>

@elseif(Session::has('error.msg'))
    <script>
        $(function (){
            sweet_alert_error('{!! Session::get('error.msg') !!}')
        });
    </script>
@endif
</body>
</html>


