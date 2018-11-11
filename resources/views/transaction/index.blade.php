@extends('user.main')

@section('title', ' - Transfer')

@section('main-content')
    <section class="wrapper">
        <div class="row mt">
            <h1 class="centered">DEPOSIT</h1>
            <h4 class="centered">Select below from our most popular payment options</h4>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="custom-box">
                    <div class="servicetitle">
                        <h4>Mobile Payment</h4>
                        <hr>
                    </div>
                    <div class="icn-main-container">
                        <span class="icn-container">XAF 21</span>
                    </div>
                    <p>Make a deposit via an Orange Money or MTN Mobile money account</p>
                    <ul class="pricing">
                        <li>Very fast</li>
                        <li>Secure</li>
                        <li>No fees</li>
                    </ul>
                    <a class="btn btn-theme" href="{{ route('transactions.create') }}">Make deposit Now</a>
                </div>
                <!-- end custombox -->
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="custom-box">
                    <div class="servicetitle">
                        <h4>Credit Cards</h4>
                        <hr>
                    </div>
                    <div class="icn-main-container">
                        <span class="icn-container">1 %</span>
                    </div>
                    <p>Available for all cards (VISA, Electron, GICAM)</p>
                    <ul class="pricing">
                        <li>Cost: 1%</li>
                        <li>Instantly</li>
                        <li>All cards</li>
                        <li>24/7 Support</li>
                    </ul>
                    <a class="btn btn-theme disabled" href="">Make deposit Now</a>
                </div>
                <!-- end custombox -->
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="custom-box">
                    <div class="servicetitle">
                        <h4>Bank Transfer</h4>
                        <hr>
                    </div>
                    <div class="icn-main-container">
                        <span class="icn-container">% 3</span>
                    </div>
                    <p>Available for e-banking</p>
                    <ul class="pricing">
                        <li>Cost: 3%</li>
                        <li>Available</li>
                        <li>24/7 Support</li>
                        <li></li>

                    </ul>
                    <a class="btn btn-theme disabled" href="">Make deposit Now</a>
                </div>
            </div>
        </div>
    </section>
@endsection
