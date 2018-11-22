<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BeWallet - Inscription</title>
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
    <div id="login-page" data-success="{{ session('register-success') ? '1' : '0' }}">
        <div class="container">
            @if (session('register-success'))
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Compte Creé</h4>
                            </div>
                            <div class="modal-body" style="padding: 30px;">
                                Votre compte à été créé avec succès !
 Un lien de confirmation a été envoyé à votre adresse e-mail pour confirmer votre compte.
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <form class="form-login" method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                @csrf
                <h2 class="form-login-heading"> INSCRIPTION</h2>
                <div class="login-wrap">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                           name="name" value="{{ old('name') }}" placeholder="Ex: John DOE" required autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                    <br>
                    <input id="email" type="email"
                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                           value="{{ old('email') }}" placeholder="Ex: john.doe@yahoo.com" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <br/>
                    <input type="text" placeholder="telephone"
                           class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" required />
                    @if ($errors->has('phone'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                    <br/>
                    <input id="password" type="password" placeholder="Mot de passe"
                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required />

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <br/>
                    <input type="password" class="form-control" placeholder="confirmation mot de passe" name="password_confirmation" />
                    <br/>
                    <button class="btn btn-theme btn-block" type="submit">
                        <i class="fa fa-lock"></i> S'INSCRIRE
                    </button>
                    <hr>
                    <div class="registration">
                        Vous avez un compte ?<br/>
                        <a class="" href="{{ route('login') }}">CONNEXION</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <!--<script type="text/javascript" src="{{ asset('lib/jquery.backstretch.min.js') }}"></script>-->
    <script>
        // $.backstretch("img/login-bg.jpg", { speed: 500 });
        $(function(){
            const authSuccess = $('#login-page').data('success');
            if(authSuccess === 1) {
                $('#myModal').modal('show');
            }
        })
    </script>
</body>
</html>