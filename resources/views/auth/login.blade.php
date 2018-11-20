<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BeWallet - Connexion</title>
    <link href={{ asset('img/favicon.png') }} rel="icon">
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
</head>
<body>
    <div id="login-page">
        <div class="container">
            <form class="form-login" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                @csrf
                <h2 class="form-login-heading">Sign in now</h2>
                @if(session('account_error'))
                    <div class="alert alert-danger">{{ session('account-error') }}</div>
                @endif
                @if ($errors->has('email'))
                    <div class="alert alert-danger">
                            <strong>{{ $errors->first('email') }}</strong>
                    </div>
                @endif
                <div class="login-wrap">
                    <input id="email" type="email" placeholder="Ex: username@yahoo.com"
                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                           value="{{ old('email') }}" required autofocus>
                    <br>
                    <input id="password" type="password"
                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <label class="checkbox">
                        <input class="form-check-input" type="checkbox" name="remember"
                               id="remember" {{ old('remember') ? 'checked' : '' }}>
                        {{ __('Remember me') }}
                    </label>
                    <span class="pull-right forgot-password">
                        <a data-toggle="modal" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </span>
                    <button class="btn btn-theme btn-block" href="index.html" type="submit">
                        <i class="fa fa-lock"></i> {{ __('Login') }}
                    </button>
                    <hr>

                    <div class="registration">
                        Don't have an account yet?<br/>
                        <a class="" href="{{ route('register') }}">
                            Create an account
                        </a>
                    </div>
                </div>
                <!-- Modal -->
                <!--<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Forgot Password ?</h4>
                            </div>
                            <div class="modal-body">
                                <p>Enter your e-mail address below to reset your password.</p>
                                <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                                <button class="btn btn-theme" type="button">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal -->
            </form>
        </div>
    </div>

    <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="{{ asset('lib/jquery.backstretch.min.js') }}"></script>
    <script>
        $.backstretch("img/login-bg.jpg", { speed: 500 });
    </script>
</body>
</html>