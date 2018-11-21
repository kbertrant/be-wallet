@extends('layouts.app')

@section('title', ' - Paiement')

@section('stylesheets')
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="py-5 text-center">
            <h1>PAIEMENT</h1>
        </div>

        @if($data['code'] === 200)
            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <h3 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Paiement informations</span>
                    </h3>
                    <h5 class="text-muted">Nom vendeur : </h5><span>M. {{ $application->user->name }}</span><br>
                    <h5 class="text-muted">Date : </h5><span>{{ (new DateTime())->format('Y-m-d h:i:s')  }} </span><br>
                    <h5 class="text-muted">Url site : </h5><span>{{ $application->url }}</span><br>
                    <h5 class="text-muted">Montant payé : </h5><span>{{ $amount }} XAF</span>
                </div>
                <div class="col-md-8 order-md-1">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        <br/>
                    @endif
                    <h3 class="mb-3">Paiement Authentification</h3>
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                      <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                          <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              PAYER AVEC BEWALLET
                            </a>
                          </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                          <div class="panel-body">
                                 <form class="needs-validation" method="post" action="{{ route('checkout.post') }}">
                                    @csrf
                                    <input type="hidden" name="amount" value="{{ $amount }}"/>
                                    <input type="hidden" name="appid" value="{{ $application->id }}"/>
                                    <input type="hidden" name="token" value="{{ $token }}"/>
                                    <div class="mb-3">
                                        <label for="username">Adresse email</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span class="fa fa-envelope"></span></span>
                                            </div>
                                            <input type="text" class="form-control" id="username" name="email" placeholder="Ex: john@doe.com" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="address2">Mot de passe <span class="text-muted"></span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span class="fa fa-lock"/></span>
                                            </div>
                                            <input type="password" class="form-control" id="paswword" name="password" placeholder="Password" required>
                                        </div>
                                    </div>
                                    <hr class="mb-4">
                                    <h4 class="mb-3">Paiement</h4>

                                    <div class="d-block my-3">
                                    </div>
                                    <hr class="mb-4">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">PAYER</button>
                                </form>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                          <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              PAYER AVEC ORANGE MONEY OU MTN MOBILE MONEY 
                            </a>
                          </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                          <div class="panel-body">
                            <span class="centered">NOT AVAILABLE</span>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                          <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              PAYER AVEC EXPRESS UNION MOBILE
                            </a>
                          </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                          <div class="panel-body">
                            <span class="centered">NOT AVAILABLE</span>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-danger">
                        <h2>Operation echec !</h2>
                        <p>{{ $data['message'] }}</p>
                    </div>
                </div>
            </div>
        @endif
        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="float-left"><a href="#">A PROPOS </a> | </p><p class="float-left"><a href="#"> SUPPORT </a> | </p><p class="float-left"><a href="#"> SECURITE </a> | </p><p class="float-left"><a href="#"> FRAIS </a> | </p>
            <p class="mb-1">&copy; 2018 BeWallet Electronics</p>
        </footer>
    </div>
@endsection

@section('scripts')

@endsection