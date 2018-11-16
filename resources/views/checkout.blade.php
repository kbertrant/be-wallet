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

        @if($data['code'] === 200)
            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <h3 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Payment informations</span>
                    </h3>
                    <h5 class="text-muted">Seller name : </h5><span>M. {{ $application->user->name }}</span><br>
                    <h5 class="text-muted">Date : </h5><span>{{ (new DateTime())->format('Y-m-d h:i:s')  }} </span><br>
                    <h5 class="text-muted">Url site : </h5><span>{{ $application->url }}</span><br>
                    <h5 class="text-muted">Amount paid : </h5><span>{{ $amount }} XAF</span>
                </div>
                <div class="col-md-8 order-md-1">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        <br/>
                    @endif
                    <h3 class="mb-3">Billing Authentification</h3>
                    <form class="needs-validation" method="post" action="{{ route('checkout.post') }}">
                        @csrf
                        <input type="hidden" name="amount" value="{{ $amount }}"/>
                        <input type="hidden" name="appid" value="{{ $application->id }}"/>
                        <input type="hidden" name="token" value="{{ $token }}"/>
                        <div class="mb-3">
                            <label for="username">Email address</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><span class="fa fa-envelope"></span></span>
                                </div>
                                <input type="text" class="form-control" id="username" name="email" placeholder="Ex: john@doe.com" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="address2">Password <span class="text-muted"></span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><span class="fa fa-lock"/></span>
                                </div>
                                <input type="password" class="form-control" id="paswword" name="password" placeholder="Password" required>
                            </div>
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
        @else
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-danger">
                        <h2>Operation failed !</h2>
                        <p>{{ $data['message'] }}</p>
                    </div>
                </div>
            </div>
        @endif
        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="float-left"><a href="#">ABOUT US </a> | </p><p class="float-left"><a href="#"> SUPPORT </a> | </p><p class="float-left"><a href="#"> SECURITY </a> | </p><p class="float-left"><a href="#"> FEES </a> | </p>
            <p class="mb-1">&copy; 2018 BWallet Electronics</p>
        </footer>
    </div>
@endsection

@section('scripts')

@endsection