@extends('user.main')

@section('title', ' - Accueil')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/table-responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/datatables/datatables.min.css') }}"/>
@endsection

@section('main-content')
    <section class="wrapper">
        <div class="row mt">

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="showback">
                    <span>SOLDE DISPONIBLE </span>(XAF)<span class="pull-right"> {{Auth::user()->amount}}</span>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <div class="showback">
                    <span class="text-muted">NOMBRE DE TRANSACTIONS</span><span  class="pull-right">{{ $transactions }} </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="showback" style="min-height: 400px;">
                    <h4 class="centered">ACTIVITES RECENTES</h4>
                    <table id="table_transactions" class="table table-bordered table-striped table-condensed">
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('lib/datatables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/transactions.js') }}"></script>
@endsection
