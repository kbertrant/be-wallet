@extends('user.main')

@section('title', ' - Profile')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/table-responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/datatables/datatables.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/bootstrap-fileupload/bootstrap-fileupload.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/bootstrap-datepicker/css/datepicker.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/select2/css/select2.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}">
@endsection

@section('main-content')
    <section class="wrapper site-min-height">
        <div class="row mt">
            <div class="col-lg-12">
                @if (session('success'))
                    <div class="alert alert-success text-center">Application modifiée avec succès</div>
                @elseif(session('password-success'))
                    <div class="alert alert-success text-center">{{ session('password-success') }}</div>
                @elseif(session('update-success'))
                    <div class="alert alert-success text-center">{{ session('update-success') }}</div>
                @elseif(session('error'))
                    <div class="alert alert-danger text-center">{{ session('error') }}</div>
                @elseif(session('password-error'))
                    <div class="alert alert-danger text-center">{{ session('password-error') }}</div>
                @elseif(session('update-error'))
                    <div class="alert alert-danger text-center">{{ session('update-error') }}</div>
                @endif
            </div>
            <div class="col-lg-12">
                <div class="row content-panel">
                    <div class="col-md-4 profile-text mt mb centered">
                        <div class="right-divider hidden-sm hidden-xs">
                            <h4>{{ Auth::user()->name }}</h4>
                            <h6>NOM UTILISATEUR</h6>
                            <h4>{{ Auth::user()->identifier }}</h4>
                            <h6>IDENTIFIANT</h6>
                            <h4>XAF {{ Auth::user()->amount }}</h4>
                            <h6>SOLDE DISPONIBLE</h6>
                        </div>
                    </div>
                    <!-- /col-md-4 -->
                    <div class="col-md-4 profile-text mt mb centered">
                        <div class="right-divider hidden-sm hidden-xs">
                            <h4>{{ Auth::user()->email }}</h4>
                            <h6>ADRESSE EMAIL</h6>
                            <h4>{{ !is_null(Auth::user()->city) ? Auth::user()->city : 'N/A' }}</h4>
                            <h6>VILLE</h6>
                            <h4>{{ !is_null(Auth::user()->phone) ? Auth::user()->phone : 'N/A' }}</h4>
                            <h6>TELEPHONE</h6>
                        </div>
                    </div>
                    <!-- /col-md-4 -->
                    <div class="col-md-4 centered mt">
                        <div class="profile-pic">
                            <p>
                                @if(is_null(Auth::user()->avatar) || empty(Auth::user()->avatar))
                                    <img src="{{ asset('img/user_main.png') }}" class="img-circle"/>
                                @else
                                    <img src="{!! url('/').'/uploads/users/'.Auth::user()->avatar !!}" class="img-circle"/>
                                @endif
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
                                <a data-toggle="tab" href="#overview">VUE GENERALE</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#edit">MODIFIER PROFILE</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#application">MON APPLICATION</a>
                            </li>
                        </ul>
                    </div>

                    <div class="panel-body">
                        <div class="tab-content">
                            <div id="overview" class="tab-pane active" style="min-height: 300px">
                                <h4 class="centered">LISTE TRANSACTIONS </h4>
                                <table id="table_transactions" class="table table-bordered table-striped table-condensed">

                                </table>
                            </div>

                            <div id="edit" class="tab-pane">
                                <div class="row">
                                    <div class="col-lg-8 col-lg-offset-2 detailed">
                                        <h4 class="mb">Informations personnelles</h4>
                                        <form role="form" enctype="multipart/form-data" method="post" action="{{ route('users.update') }}" class="form-horizontal mb">
                                            @csrf
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label" for="gender">Genre :</label>
                                                <div class="col-lg-6">
                                                    <select name="gender" id="gender" style="width: 100%" class="select2">
                                                        <option value=""></option>
                                                        <option value="M" @if(Auth::user()->gender === 'M') selected @endif>Masculin</option>
                                                        <option value="F" @if(Auth::user()->gender === 'F') selected @endif>Femelle</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-2 control-label" for="name">Nom :</label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name  }}"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label" for="birth">Date de naissance :</label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="birth" id="birth" class="form-control"  value="{{ $birth  }}"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label" for="country">Pays : </label>
                                                <div class="col-lg-6">
                                                    <select name="country" id="country" data-ctr="{{ Auth::user()->country }}" style="width: 100%" class="form-control select2">
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label" for="city">Ville :</label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="city" id="city" class="form-control" value="{{ Auth::user()->city  }}"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label" for="address">Adresse : </label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="address" id="address" class="form-control" value="{{ Auth::user()->address  }}"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label" for="avatar"> Avatar</label>
                                                <div class="col-lg-6">
                                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                            @if(is_null(Auth::user()->avatar) || empty(Auth::user()->avatar))
                                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                                                            @else
                                                                <img src="{!! url('/').'/uploads/users/'.Auth::user()->avatar !!}" alt=""/>
                                                            @endif
                                                        </div>
                                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                        <div>
                                                            <span class="btn btn-theme02 btn-file">
                                                                <span class="fileupload-new">
                                                                    <i class="fa fa-paperclip"></i> Choix image
                                                                </span>
                                                                <span class="fileupload-exists">
                                                                    <i class="fa fa-undo"></i> Changer
                                                                </span>
                                                                <input type="file" class="default" name="avatar" id="avatar" />
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <button class="btn btn-primary mb pull-right" type="submit">
                                                <span class="fa fa-check"></span> MODIFIER
                                            </button>
                                        </form>
                                        <br/>
                                        <br/>
                                        <h4 class="mb">Changer mot de passe</h4>
                                        <form role="form" class="form-horizontal" method="post" action="{{ route('users.change.password') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label" for="current-password">Mot de passe initial :</label>
                                                <div class="col-lg-6">
                                                    <input type="password" id="current-password" name="current-password" class="form-control"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label" for="password">Nouveau mot de passe :</label>
                                                <div class="col-lg-6">
                                                    <input type="password" name="password" id="password" class="form-control"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label" for="confirm-password">Confirmation de mot de passe :</label>
                                                <div class="col-lg-6">
                                                    <input type="password" name="confirm-password" id="confirm-password" class="form-control"/>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary mt mb pull-right" type="submit">
                                                <span class="fa fa-check"></span> Changer
                                            </button>
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
                                        <form role="form" class="form-horizontal" method="post" action="{{ route('applications.store') }}">
                                            @csrf
                                            <input type="hidden" name="app_id" value="{{ is_null($application) ? '' : $application->id }}"/>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Application name :</label>
                                                <div class="col-lg-6">
                                                    <input type="text" placeholder=" " id="app-name" name="name" class="form-control" required value="{{ is_null($application) ? '' : $application->name }}"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Application URL: </label>
                                                <div class="col-lg-6">
                                                    <input type="text" placeholder="http://mywebsite.com" id="app-url" name="url" class="form-control" required value="{{ is_null($application) ? '' : $application->url }}"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Client ID : </label>
                                                <div class="col-lg-6">
                                                    <input type="text" placeholder="" id="client-id" name="client-id" class="form-control" value="{{ is_null($application) ? '' : $application->client_id }}"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Client Secret : </label>
                                                <div class="col-lg-6">
                                                    <input type="text" placeholder="" id="client_secret" name="client-secret" class="form-control" value="{{ is_null($application) ? '' : $application->token }}"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Success URL :</label>
                                                <div class="col-lg-6">
                                                    <input type="text" placeholder="Ex: http://mywebsite.com/success-url" id="surl" name="surl" class="form-control" required value="{{ is_null($application) ? '' : $application->success_url }}"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Cancel URL : </label>
                                                <div class="col-lg-6">
                                                    <input type="text" placeholder="Ex: http://mywebsite.com/cancel-url" id="curl" name="curl" class="form-control" required value="{{ is_null($application) ? '' : $application->cancel_url }}"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button class="btn btn-theme mt-2" type="submit">
                                                        @if(is_null($application))
                                                            <span class="fa fa-plus"></span> Create application
                                                        @else
                                                            <span class="fa fa-pencil"></span> Save information
                                                        @endif
                                                    </button>
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

@section('scripts')
    <script type="text/javascript" src="{{ asset('lib/datatables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('lib/bootstrap-fileupload/bootstrap-fileupload.js') }}"></script>
    <script type="text/javascript" src="{{ asset('lib/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('lib/select2/js/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/transactions.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/profile.js') }}"></script>
@endsection