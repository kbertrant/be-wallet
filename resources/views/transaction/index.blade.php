@extends('user.main')

@section('title', ' - Depots')

@section('main-content')
    <section class="wrapper">
        <div class="row mt">
            <h1 class="centered">DEPOT</h1>
            <h4 class="centered">Choisir parmi les options de dépot</h4>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="custom-box">
                    <div class="servicetitle">
                        <h4> Paiement mobile</h4>
                        <hr>
                    </div>
                    <div class="icn-main-container">
                        <span class="icn-container"> 2%</span>
                    </div>
                    <p>Effectuer un dépot via un compte BeWallet, Orange Money or MTN Mobile money</p>
                    <ul class="pricing">
                        <li>Rapide</li>
                        <li>Securisé</li>
                        <li>Sans frais</li>
                    </ul>
                    <a class="btn btn-theme" href="{{ route('transactions.create') }}">Effectuer dépot</a>
                </div>
                <!-- end custombox -->
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="custom-box">
                    <div class="servicetitle">
                        <h4>Carte Crédit</h4>
                        <hr>
                    </div>
                    <div class="icn-main-container">
                        <span class="icn-container">1 %</span>
                    </div>
                    <p>Disponible pour toutes les cartes (VISA, Electron, GICAM)</p>
                    <ul class="pricing">
                        <li>Cout: 1%</li>
                        <li>Instantanée</li>
                        <li>All cards</li>
                    </ul>
                    <a class="btn btn-theme disabled" href="">Effectuer dépot</a>
                </div>
                <!-- end custombox -->
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="custom-box">
                    <div class="servicetitle">
                        <h4>Transfert bancaire</h4>
                        <hr>
                    </div>
                    <div class="icn-main-container">
                        <span class="icn-container">% 3</span>
                    </div>
                    <p>E-banking disponible</p>
                    <ul class="pricing">
                        <li>Cout: 3%</li>
                        <li>Disponible</li>
                        <li>24/7 Support</li>
                    </ul>
                    <a class="btn btn-theme disabled" href="">Effectuer dépot</a>
                </div>
            </div>
        </div>
    </section>
@endsection
