@extends('layouts.app')

@section('title', ' - Accueil')

@section('stylesheets')
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">
@endsection

@section('content')
    <main role="main">

        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="first-slide" src="{{ asset('img/carousel/carousel_bewallet1.png') }}" alt="First slide">
                    <div class="container">
                        <div class="carousel-caption text-left">
                            <h1>TRANSFERT D'ARGENT</h1>
                            <h2>GRATUITEMENT</h2>
                            <p><h5>Aucun frais de transfert lorsque vous envoyez directement à un compte bancaire. Pas de frais cachés. Aucun frais du tout. Oui vraiment.</h5></p>
                            <p><a class="btn btn-lg btn-success" href="{{ route('register') }}" role="button">Inscrivez-vous</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="second-slide" src="{{ asset('img/carousel/img2.png') }}" alt="Second slide">
                    <div class="container">
                        <div class="carousel-caption text-left">
                            <h1>PAIEMENT EN LIGNE.</h1>
                            <p></p>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">Plus</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


        <!-- Marketing messaging and featurettes
        ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->

        <div class="container marketing">

            <!-- Three columns of text below the carousel -->
            <div class="row">
                <div class="col-lg-4">
                    <img class="rounded-circle" src="{{ asset('img/carousel/confidence.png') }}" alt="Generic placeholder image" width="200" height="200">
                    <h2>INSTANTANEE</h2>
                    <p>Les détenteurs de portefeuilles Bewallet peuvent facilement envoyer et recevoir de l’argent - vous avez simplement besoin d’une adresse électronique. Et avec des frais de seulement 1%, plus d’argent arrive.</p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="rounded-circle" src="{{ asset('img/carousel/convinence.png') }}" alt="Generic placeholder image" width="200" height="200">
                    <h2>CONFIDENTIALITE</h2>
                    <p>Votre sécurité est une priorité. Nous gardons toujours vos paiements et vos informations personnelles en sécurité, et notre équipe anti-fraude protège chaque transaction.</p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="rounded-circle" src="{{ asset('img/carousel/secure.png') }}" alt="Generic placeholder image" width="200" height="200">
                    <h2>COMMODITE</h2>
                    <p>Envoyez et recevez de l'argent, stockez des cartes, établissez des liens sur des comptes bancaires et payez confortablement à tout moment et n'importe où avec votre adresse email et votre mot de passe.</p>
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
            <hr class="featurette-divider">
            <!-- Three columns of text below the carousel -->
            <div class="text-center"><h1>Comment ça marche ?</h1></div>
            <div class="row">
                <div class="col-lg-4">
                    <img class="rounded-circle" src="{{ asset('img/carousel/user.png') }}" alt="Generic placeholder image" width="200" height="200">
                    <h2>CREER UN COMPTE</h2>
                    <p>Quelques minutes suffisent pour créer un portefeuille BWallet et regrouper toutes vos informations de paiement au même endroit. Vous pouvez choisir parmi 3 devises.</p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="rounded-circle" src="{{ asset('img/carousel/make_payment.png') }}" alt="Generic placeholder image" width="200" height="200">
                    <h2>EFFECTUER UN PAIEMENT</h2>
                    <p>Gardez le contrôle grâce à des méthodes de paiement simples, sécurisées et rapides, notamment les cartes stockées et le solde de votre compte.</p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="rounded-circle" src="{{ asset('img/carousel/withdraws.png') }}" alt="Generic placeholder image" width="200" height="200">
                    <h2>RETRAIT DES FONDS</h2>
                    <p>Déplacez instantanément des fonds - y compris les gains - de Skrill vers votre compte bancaire ou effectuez des retraits à un guichet automatique.</p>
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->


            <!-- START THE FEATURETTES -->

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">OFFRES EXCLUSIVES <span class="text-muted">BWALLET</span></h2>
                    <p class="lead">Profitez d'un accès facile à une gamme des dernières offres, offres et bonus des marchands. Mis à jour tous les mois.</p>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-fluid mx-auto" src="{{ asset('img/carousel/offers_bewallet.png') }}" alt="Generic placeholder image">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading">ACCEDEZ A VOTRE ARGENT <span class="text-muted">DISPONIBLE</span> 24/7</h2>
                    <p class="lead">Notre application rapide, facile à utiliser et sécurisée vous permet d'accéder à votre compte partout où vous en avez besoin.</p>
                </div>
                <div class="col-md-5 order-md-1">
                    <img class="featurette-image img-fluid mx-auto" src="{{ asset('img/carousel/hour_bewallet.png') }}" alt="Generic placeholder image">
                </div>
            </div>

            <hr class="featurette-divider">

            <!-- /END THE FEATURETTES -->

        </div><!-- /.container -->

        <!-- FOOTER -->
        <footer class="container ">
            <p class="float-left"><a href="#">A PROPOS </a>|</p><p class="float-left"><a href="#"> SUPPORT </a>|</p><p class="float-left"><a href="#"> SECURITE </a>|</p><p class="float-left"><a href="#"> FRAIS </a>|</p>
            <p class="float-right"><a href="#">Haut de page</a></p>
            <p>&copy; 2018 BWallet Inc. &middot; <a href="#">Privée</a> &middot; <a href="#">Termes</a></p>
        </footer>
    </main>
@endsection

@section('scripts')

@endsection