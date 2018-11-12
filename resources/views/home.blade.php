@extends('user.main')

@section('title', ' - Home')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/table-responsive.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('datatables/datatables.min.css') }}"/>
 
    <link rel="stylesheet" href="{{ asset('css/transfer.css') }}">
@endsection

@section('main-content')
    <section class="wrapper">
        <div class="row mt">

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="showback">
                    <span>BALANCE AVAILABLE </span>(XAF)<span class="pull-right"> {{Auth::user()->amount}}</span>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <div class="showback">
                    <span class="text-muted">NUMBER OF TRANSACTIONS</span><span  class="pull-right">0 </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="showback">
                    <h4 class="centered">RECENTS ACTIVITIES</h4>
                    <table id="table_transactions" class="table table-bordered table-striped table-condensed">
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>

    <script class="include" type="text/javascript" src="{{ asset('lib/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('lib/jquery.scrollTo.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('lib/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <!--common script for all pages-->
    <script type="text/javascript" src="{{ asset('lib/common-scripts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/transfer.js') }}"></script>
    <script type="text/javascript" src="{{ asset('datatables/datatables.min.js') }}"></script>
@endsection
