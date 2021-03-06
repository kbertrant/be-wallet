<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bewallet') }} @yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('lib/bootstrap4/css/bootstrap.min.css') }}" rel="stylesheet">

    @yield('stylesheets')
</head>
<body>
    <header>
        <nav role="navigation" class="navbar navbar-expand-xl navbar-white fixed-top bg-white">
            <a class="navbar-brand logo" href="#"><img src="{{ asset('img/logo_bewallet.png') }}"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link logo" href="#">ACCUEIL<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">TRANSFERT D'ARGENT</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">DEPOT</a>
                            <a class="dropdown-item" href="#">TRANSFER MONEY</a>
                            <a class="dropdown-item" href="#">PAYER UN COMPTE BEWALLET</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">PAIEMENT EN LIGNE</a>
                    </li>
                </ul>
                <a href="{{ route('login') }}" class="btn btn-outline-warning my-2 my-sm-0" type="submit">CONNEXION</a>
                <a href="{{ route('register') }}" class="btn btn-outline-success my-2 my-sm-0" type="submit">INSCRIPTION</a>
            </div>
        </nav>
    </header>

    @yield('content')

    <script src="{{ asset('lib/jquery-slim.min.js') }}"></script>
    <script src="{{ asset('lib/popper.min.js') }}"></script>
    <script src="{{ asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('lib/holder.min.js') }}"></script>
    @yield('scripts')
</body>
</html>
