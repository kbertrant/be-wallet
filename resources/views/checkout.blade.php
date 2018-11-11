@extends('layouts.app')

@section('title', ' - Checkout')

@section('stylesheets')
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="py-5 text-center">
            <h1>Checkout</h1>
        </div>

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h3 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Payment informations</span>
                </h3>
                <h5 class="text-muted">Order : </h5><span>124578</span><br>
                <h5 class="text-muted">Seller name : </h5><span>Achille M.</span><br>
                <h5 class="text-muted">Date : </h5><span>08-11-2018 23:42:08 </span><br>
                <h5 class="text-muted">Url site : </h5><span>www.jumia.cm</span><br>
                <h5 class="text-muted">Amount paid : </h5><span>12 000 XAF</span>
            </div>
            <div class="col-md-8 order-md-1">
                <h3 class="mb-3">Billing Authentification</h3>
                <form class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="username">Email address</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                            </div>
                            <input type="text" class="form-control" id="username" placeholder="email address" required>
                            <div class="invalid-feedback" style="width: 100%;">
                                Your username is required.
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="address2">Password <span class="text-muted"></span></label>
                        <input type="text" class="form-control" id="address2" placeholder="Password">
                    </div>
                    <hr class="mb-4">
                    <h4 class="mb-3">Payment</h4>

                    <div class="d-block my-3">
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Checkout</button>
                </form>
            </div>
        </div>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="float-left"><a href="#">ABOUT US </a> | </p><p class="float-left"><a href="#"> SUPPORT </a> | </p><p class="float-left"><a href="#"> SECURITY </a> | </p><p class="float-left"><a href="#"> FEES </a> | </p>
            <p class="mb-1">&copy; 2018 BWallet Electronics</p>
        </footer>
    </div>
@endsection

@section('scripts')

@endsection