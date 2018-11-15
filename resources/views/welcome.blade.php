@extends('layouts.app')

@section('title', ' - Home')

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
                            <h1>TRANSFER MONEY</h1>
                            <h2>FOR FREE</h2>
                            <p><h5>No transfer fee when you send directly to a bank account.
                                No hidden fee. No fees at all. Yes, really.</h5></p>
                            <p><a class="btn btn-lg btn-success" href="{{ route('register') }}" role="button">Sign up today</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="second-slide" src="{{ asset('img/carousel/img2.png') }}" alt="Second slide">
                    <div class="container">
                        <div class="carousel-caption text-left">
                            <h1>ONLINE PAYMENT.</h1>
                            <p></p>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
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
                    <h2>INSTANT</h2>
                    <p>It’s easy for Skrill wallet holders to send and receive money – you just need an email address. And with fees of only 1%, more money arrives.</p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="rounded-circle" src="{{ asset('img/carousel/convinence.png') }}" alt="Generic placeholder image" width="200" height="200">
                    <h2>CONFIDENCE</h2>
                    <p>Your security is a priority. We always keep your payments and personal information safe, and our anti-fraud team protects every transaction.</p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="rounded-circle" src="{{ asset('img/carousel/secure.png') }}" alt="Generic placeholder image" width="200" height="200">
                    <h2>CONVENIENCE</h2>
                    <p>Send and receive money, store cards, link bank accounts and pay conveniently anytime and anywhere with your email address and password.</p>
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
            <hr class="featurette-divider">
            <!-- Three columns of text below the carousel -->
            <div class="text-center"><h1>HOW DOES IT WORK ?</h1></div>
            <div class="row">
                <div class="col-lg-4">
                    <img class="rounded-circle" src="{{ asset('img/carousel/user.png') }}" alt="Generic placeholder image" width="200" height="200">
                    <h2>CREATE AN ACCOUNT</h2>
                    <p>It takes just a few minutes to create a BWallet wallet and bring all your payment details together in one place. You can choose from 40 currencies.</p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="rounded-circle" src="{{ asset('img/carousel/make_payment.png') }}" alt="Generic placeholder image" width="200" height="200">
                    <h2>MAKE PAYMENT</h2>
                    <p>Stay in control with simple, secure and quick payment methods, including stored cards and your account balance.</p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="rounded-circle" src="{{ asset('img/carousel/withdraws.png') }}" alt="Generic placeholder image" width="200" height="200">
                    <h2>WITHDRAW FUNDS</h2>
                    <p>Move funds – including winnings – from Skrill to your bank account instantly or make ATM withdrawals.</p>
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->


            <!-- START THE FEATURETTES -->

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">EXCLUSIVE <span class="text-muted">BWALLET OFFERS</span></h2>
                    <p class="lead">Enjoy easy access to a range of the latest merchant offers, deals and bonuses. Updated every month.</p>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-fluid mx-auto" src="{{ asset('img/carousel/offers_bewallet.png') }}" alt="Generic placeholder image">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading">Access your money <span class="text-muted">wherever</span> you are 24/7</h2>
                    <p class="lead">Our fast, easy to use and secure app lets you access your account wherever you need it.</p>
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
            <p class="float-left"><a href="#">ABOUT US </a>|</p><p class="float-left"><a href="#"> SUPPORT </a>|</p><p class="float-left"><a href="#"> SECURITY </a>|</p><p class="float-left"><a href="#"> FEES </a>|</p>
            <p class="float-right"><a href="#">Back to top</a></p>
            <p>&copy; 2018 BWallet Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
        </footer>
    </main>
@endsection

@section('scripts')

@endsection