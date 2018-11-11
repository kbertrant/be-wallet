@extends('user.main')

@section('title', ' - Transfer')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/transfer.css') }}">
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
                <div class="showback">
                    <div class="">
                        <span>Number of transfers</span><span class="pull-right"> 0</span>
                    </div>
                </div>
                <div class="showback">
                    <h4 class="centered">Recent transferts</h4>
                    <table class="table table-bordered table-striped table-condensed">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Recipient</th>
                            <th class="numeric">Amount</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>10-11-2018 22:11:12</td>
                            <td>Aurel Bertrand</td>
                            <td class="numeric">xaf 1008</td>

                        </tr>
                        <tr>
                            <td>08-11-2018 22:11:12</td>
                            <td>Max Alain</td>
                            <td class="numeric">xaf 1.15</td>

                        </tr>
                        <tr>
                            <td>09-11-2018 07:11:12</td>
                            <td>Eric Cabrel</td>
                            <td class="numeric">xaf 4000</td>

                        </tr>
                        <tr>
                            <td>18-10-2018 14:50:02</td>
                            <td>Lionel Chris</td>
                            <td class="numeric">xaf 3.00</td>

                        </tr>
                        <tr>
                            <td>14-10-2018 12:11:12</td>
                            <td>San Pablo</td>
                            <td class="numeric">xaf 72000</td>

                        </tr>
                        <tr>
                            <td>09-11-2018 07:11:12</td>
                            <td>Eric Cabrel</td>
                            <td class="numeric">xaf 4000</td>

                        </tr>
                        <tr>
                            <td>18-10-2018 14:50:02</td>
                            <td>Lionel Chris</td>
                            <td class="numeric">xaf 3.00</td>

                        </tr>
                        <tr>
                            <td>14-10-2018 12:11:12</td>
                            <td>San Pablo</td>
                            <td class="numeric">xaf 72000</td>

                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/transfer.js') }}"></script>
@endsection
