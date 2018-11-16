@extends('user.main')

@section('title', ' - Transfer')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/table-responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/datatables/datatables.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/transfer.css') }}">
@endsection

@section('main-content')
    <section class="wrapper">
        <div class="row mt">
            <h1 class="centered">TRANSFER</h1>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <h4 class="centered">Send money to another BWallet account.</h4>
                <form class="form-transfer">
                    <div class="row">
                        <div class="col-xs-12">
                            <div id="receiver-name" class="alert alert-success hide">
                                Receiver name : <b id="receiver">Tiogo eric Cabrel</b>
                            </div>
                            <div id="receiver-unknown" class="alert alert-danger hide">
                                Receiver not found !
                            </div>
                        </div>
                    </div>

                    <div class="login-wrap">
                        <input type="text" class="form-control" id="receiver-id" required placeholder="Receiver ID">
                        <br/>
                        <input type="text" class="form-control" id="receiver-email" required placeholder="Email receiver" autofocus>
                        <br>
                        <button class="btn btn-theme btn-block" id="btn-check-receiver">Check</button>
                        <hr>
                        <input type="number" class="form-control" id="amount" required placeholder="Amount (e.g. XAF 11500)" min="0" max="{{ Auth::user()->amount }}" step="500" value="{{ Auth::user()->amount > 500 ? 500 : Auth::user()->amount }}"/>
                        <br>
                        <button class="btn btn-theme btn-block" disabled="disabled" id="btn-transfer" data-amount="{{ Auth::user()->amount }}">
                            TRANSFER
                        </button>
                        <hr>
                    </div>
                </form>
            </div>
            <div class="col-lg-8 col-md-6 col-sm-12">
                <h4 class="centered">ACTIVITIES</h4>
                <div class="row mt">
              <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="showback">
                  <div class="">
                    <span>Number of transfers</span><span id="total" class="pull-right"> 0</span>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="showback">
                  <div class="">
                    <span>Number of receives</span><span id="received" class="pull-right"> 0</span>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="showback">
                  <div class="">
                    <span>Number of sent</span><span id="sent" class="pull-right"> 0</span>
                  </div>
                </div>
              </div>
            </div>
                <div class="showback">
                    <h4 class="centered">Recent transferts</h4>
                    <table id="table_transfer" class="table table-bordered table-striped table-condensed">
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<<<<<<< HEAD
    <script type="text/javascript" src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ asset('lib/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('lib/jquery.scrollTo.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('lib/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <!--common script for all pages-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>

    <script type="text/javascript" src="{{ asset('lib/common-scripts.js') }}"></script>
=======
    <script type="text/javascript" src="{{ asset('lib/datatables/datatables.min.js') }}"></script>
>>>>>>> 9143ea3caf9dbc9870ddbe909ee82bf1e79a0f85
    <script type="text/javascript" src="{{ asset('js/transfer.js') }}"></script>
@endsection
