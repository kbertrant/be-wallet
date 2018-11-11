@extends('user.main')

@section('title', ' - Home')

@section('main-content')
    <section class="wrapper">
        <div class="row mt">

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="showback">
                    <span>BALANCE AVAILABLE </span>(XAF)    <span class="pull-right"> 0</span>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <div class="showback">
                    <span class="text-muted">NUMBER OF TRANSACTIONS</span><span class="pull-right"> 0</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="showback">
                    <span>RECENTS ACTIVITIES</span>
                    <table class="table table-bordered table-striped table-condensed">
                        <thead>
                        <tr>
                            <th>Code</th>
                            <th>TRANSACTIONS</th>
                            <th class="numeric">Price</th>

                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>AAC</td>
                                <td>DEPOSIT</td>
                                <td class="numeric">xaf 1.38</td>

                            </tr>
                            <tr>
                                <td>AAD</td>
                                <td>DEPOSIT</td>
                                <td class="numeric">xaf 1.15</td>

                            </tr>
                            <tr>
                                <td>AAX</td>
                                <td>WITHDRAW</td>
                                <td class="numeric">xaf 4.00</td>

                            </tr>
                            <tr>
                                <td>ABC</td>
                                <td>DEPOSIT</td>
                                <td class="numeric">xaf 3.00</td>

                            </tr>
                            <tr>
                                <td>ABP</td>
                                <td>DEPOSIT</td>
                                <td class="numeric">xaf 1.91</td>

                            </tr>
                            <tr>
                                <td>ACR</td>
                                <td>DEPOSIT</td>
                                <td class="numeric">xaf 3.71</td>

                            </tr>
                            <tr>
                                <td>ADU</td>
                                <td>DEPOSIT</td>
                                <td class="numeric">xaf 0.72</td>

                            </tr>
                            <tr>
                                <td>AGG</td>
                                <td>DEPOSIT</td>
                                <td class="numeric">xaf 7.81</td>

                            </tr>
                            <tr>
                                <td>AGK</td>
                                <td>DEPOSIT</td>
                                <td class="numeric">xaf 13.82</td>

                            </tr>
                            <tr>
                                <td>AGO</td>
                                <td>DEPOSIT</td>
                                <td class="numeric">xaf 3.17</td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
