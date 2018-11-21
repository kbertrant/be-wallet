@extends('user.main')

@section('title', ' - RETRAIT')

@section('main-content')
    <section class="wrapper centered">
        <div class="row mt">
            <h1 class="centered">RETRAIT</h1>
            <div class="col-lg-offset-4 col-lg-4 col-md-3 col-md-6 col-sm-12">
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    <br/>
                @endif
                <div class="showback">
                    <h4 class="centered">Retirer de l'argent sur votre compte BeWallet.</h4>
                    <form action="{{ route('transactions.store') }}" method="post">
                        @csrf
                        <div class="login-wrap">
                            <input type="text" class="form-control" name="phone" placeholder="Numero de téléphone" autofocus/>
                            <br>
                            <input type="hidden" name="type" value="DEP"/>
                            <input type="number" min="0" class="form-control" name="amount" placeholder="Montant (e.g. XAF 11500)"
                            value="{{ session('amount') ? session('amount') : '0' }}"/>
                            <br>
                            <button class="btn btn-theme btn-block" type="submit">ENVOYER</button>
                            <hr>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection