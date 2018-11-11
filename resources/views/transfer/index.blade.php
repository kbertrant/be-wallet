@extends('user.main')

@section('title', ' - Transfer')

@section('main-content')
    <section class="wrapper">
        <div class="row mt">
            <h1 class="centered">TRANSFER</h1>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <h4 class="centered">Send money to another BWallet account.</h4>
                <form class="form-login" action="index.html">
                    <div class="login-wrap">
                        <input type="text" class="form-control" placeholder="Email receiver" autofocus>
                        <br>
                        <input type="password" class="form-control" placeholder="Password">
                        <br>
                        <input type="text" class="form-control" placeholder="Amount (e.g. XAF 11500)">
                        <br>
                        <button class="btn btn-theme btn-block" href="index.html" type="submit">TRANSFER</button>
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
