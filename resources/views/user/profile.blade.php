@extends('user.main')

@section('title', ' - User profile')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}">
@endsection

@section('main-content')
    <section class="wrapper site-min-height">
        <div class="row mt">
            <div class="col-lg-12">
                <div class="row content-panel">
                    <div class="col-md-4 profile-text mt mb centered">
                        <div class="right-divider hidden-sm hidden-xs">
                            <h4>kbertrant@yahoo.fr</h4>
                            <h6>ADDRESS EMAIL</h6>
                            <h4>Douala</h4>
                            <h6>CITY</h6>
                            <h4>XAF 13,980</h4>
                            <h6>BALANCE AVAILABLE</h6>
                        </div>
                    </div>
                    <!-- /col-md-4 -->
                    <div class="col-md-4 profile-text">
                        <h3>Aurel Bertrand</h3>
                        <h6>ID 110927714</h6>
                        <br>
                        <p><button class="btn btn-theme"><i class="fa fa-envelope"></i> Send Message</button></p>
                    </div>
                    <!-- /col-md-4 -->
                    <div class="col-md-4 centered">
                        <div class="profile-pic">
                            <p><img src="{{ asset('img/user_main.png') }}" class="img-circle"></p>
                            <p>
                                <button class="btn btn-theme"><i class="fa fa-check"></i> Follow</button>
                                <button class="btn btn-theme02">Add</button>
                            </p>
                        </div>
                    </div>
                    <!-- /col-md-4 -->
                </div>
                <!-- /row -->
            </div>
            <div class="col-lg-12 mt">
                <div class="row content-panel">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs nav-justified">
                            <li class="active">
                                <a data-toggle="tab" href="#overview">Overview</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#edit">Edit Profile</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#application">My Application</a>
                            </li>
                        </ul>
                    </div>

                    <div class="panel-body">
                        <div class="tab-content">
                            <div id="overview" class="tab-pane active">
                                <div class="row">

                                </div>
                            </div>

                            <div id="edit" class="tab-pane">
                                <div class="row">
                                    <div class="col-lg-8 col-lg-offset-2 detailed">
                                        <h4 class="mb">Personal Information</h4>
                                        <form role="form" class="form-horizontal">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"> Avatar</label>
                                                <div class="col-lg-6">
                                                    <input type="file" id="exampleInputFile" class="file-pos">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Company</label>
                                                <div class="col-lg-6">
                                                    <input type="text" placeholder=" " id="c-name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Lives In</label>
                                                <div class="col-lg-6">
                                                    <input type="text" placeholder=" " id="lives-in" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Country</label>
                                                <div class="col-lg-6">
                                                    <input type="text" placeholder=" " id="country" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Description</label>
                                                <div class="col-lg-10">
                                                    <textarea rows="10" cols="30" class="form-control" id="" name=""></textarea>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div id="application" class="tab-pane">
                                <div class="row">
                                    <div class="col-lg-8 col-lg-offset-2 detailed mt">
                                        <h4 class="mb">Application information</h4>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div id="app-notice">

                                                </div>
                                            </div>
                                        </div>
                                        <form role="form" class="form-horizontal" action="{{ route('applications.store') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Application name :</label>
                                                <div class="col-lg-6">
                                                    <input type="text" placeholder=" " id="app-name" name="name" class="form-control" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Application URL: </label>
                                                <div class="col-lg-6">
                                                    <input type="text" placeholder="http://mywebsite.com" id="app-url" name="url" class="form-control" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Client ID : </label>
                                                <div class="col-lg-6">
                                                    <input type="text" placeholder="" id="client-id" name="client-id" class="form-control"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Client Secret : </label>
                                                <div class="col-lg-6">
                                                    <input type="text" placeholder="" id="client_secret" name="client-secret" class="form-control" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Success URL :</label>
                                                <div class="col-lg-6">
                                                    <input type="text" placeholder="Ex: http://mywebsite.com/success-url" id="surl" name="surl" class="form-control" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Cancel URL : </label>
                                                <div class="col-lg-6">
                                                    <input type="text" placeholder="Ex: http://mywebsite.com/cancel-url" id="curl" name="curl" class="form-control" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button class="btn btn-theme" type="submit">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
