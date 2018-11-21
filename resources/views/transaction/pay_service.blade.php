@extends('user.main')

@section('title', ' - SERVICES')

@section('main-content')
    <section class="wrapper centered">
        <div class="row mt">
            <h1 class="centered">PAYER UN SERVICE</h1>
            <div class="col-lg-offset-2 col-lg-8 col-md-3 col-md-6 col-sm-12">
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    <br/>
                @endif
                <div class="showback">
                    <h4 class="centered">Choisissez un service et payer sur votre compte BeWallet.</h4>
                   <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          RECHARGER MA CARTE VISA
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <h4 class="centered">Recharger votre carte VISA</h4>
        <form  action="{{ route('transactions.store') }}" method="post">
                        
            <div class="login-wrap">
                <input type="text" class="form-control" name="phone" placeholder="Numero de la carte" autofocus/>
                <br>
                <input type="hidden" name="type" value="DEP"/>
                <input type="number" min="0" class="form-control" name="amount" placeholder="Montant (e.g. XAF 11500)"
                            value="{{ session('amount') ? session('amount') : '0' }}"/>
                <br>
                <button class="btn btn-theme btn-block" type="submit">RECHARGER</button>
                <hr>
            </div>
        </form>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          PAYER SA FACTURE ENEO
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
         <h4 class="centered">Paiement de facture ENEO</h4>
        <form  action="{{ route('transactions.store') }}" method="post">
                        
            <div class="login-wrap">
                <input type="text" class="form-control" name="phone" placeholder="Numero de la facture" autofocus/>
                <br>
                <input type="hidden" name="type" value="DEP"/>
                <input type="number" min="0" class="form-control" name="amount" placeholder="Montant (e.g. XAF 11500)"
                            value="{{ session('amount') ? session('amount') : '0' }}"/>
                <br>
                <button class="btn btn-theme btn-block" type="submit">PAYER</button>
                <hr>
            </div>
        </form>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          PAYER ABONNEMENT CANAL+
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingFour">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
          PAYER ABONNEMENT TV+
        </a>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>
                </div>
            </div>
        </div>
    </section>
@endsection