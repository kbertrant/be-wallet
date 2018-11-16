@extends('user.main')

@section('title', ' - New Transaction')

@section('main-content')
    <section class="wrapper centered">
        <div class="row mt">
            <h1 class="centered">DEPOSIT</h1>
            <div class="col-lg-offset-4 col-lg-4 col-md-3 col-md-6 col-sm-12">
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    <br/>
                @endif
                <div class="showback">
                    <h4 class="centered">Send money inside your BeWallet account.</h4>
                    <form class="form-login" action="{{ route('transactions.store') }}" method="post">
                        @csrf
                        <div class="login-wrap">
                            <!--<input type="text" class="form-control" name="phone" placeholder="Phone number" autofocus/>
                            <br>-->
                            <input type="hidden" name="type" value="DEP"/>
                            <input type="number" min="0" class="form-control" name="amount" placeholder="Amount (e.g. XAF 11500)"
                            value="{{ session('amount') ? session('amount') : '0' }}"/>
                            <br>
                            <button class="btn btn-theme btn-block" type="submit">SUBMIT</button>
                            <hr>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
