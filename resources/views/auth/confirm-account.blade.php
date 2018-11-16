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
            <div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 mb">
                <div class="white-panel pn">
                    <div class="white-header">
                        <h5>ACCOUNT CONFIRMATION</h5>
                    </div>
                    <div class="row">
                        @if($valid == 1)
                            <div class="col-sm-12 col-lg-offset-1 col-lg-10 col-md-offset-1 col-md-10 account-msg-notice">
                                <div class="alert alert-success">{{ $message }}</div>
                                <br/>
                                @if(Auth::user() != null)
                                    <a href="#" onclick="window.location='/home';">Acceder à mon profil</a>
                                @else
                                    <p class="message" id="notify-login">
                                        <br/>
                                        <a class="btn btn-success" href="{{ route('login') }}">Login to your account</a>
                                    </p>
                                @endif
                            </div>
                        @else
                            <div class="col-sm-12 col-lg-offset-1 col-lg-10 col-md-offset-1 col-md-10 account-msg-notice">
                                <div class="alert alert-danger">{{ $message }}</div>
                                <br/>
                                <a class="btn btn-success" href="/">Go to home</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
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