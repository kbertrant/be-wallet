<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered">
                <a href="{{ route('profile') }}">
                    @if(is_null(Auth::user()->avatar) || empty(Auth::user()->avatar))
                        <img src="{{ asset('img/user_main.png') }}" class="img-circle" width="80">
                    @else
                        <img src="{!! url('/').'/uploads/users/'.Auth::user()->avatar !!}" class="img-circle" width="80">
                    @endif
                </a>
            </p>
            <h5 class="centered">
                <a href="{{ route('profile') }}">{{ Auth::user()->name }}</a>
            </h5>
            <li class="mt">
                <a {!! (Request::is('home') ? 'class="active"' : '') !!} href="{{ route('home') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="mt">
                <a {!! ((Request::is('transactions') || Request::is('transactions/create')) ? 'class="active"' : '') !!} href="{{ route('transactions.index') }}">
                    <i class="fa fa-tasks"></i>
                    <span>DEPOSIT</span>
                </a>
            </li>
            <li class="mt hide">
                <a class="" href="">
                    <i class="fa fa-angle-up"></i>
                    <span>WITHDRAW</span>
                </a>
            </li>
            <li class="mt">
                <a {!! (Request::is('transfers') ? 'class="active"' : '') !!} href="{{ route('transfers.index') }}">
                    <i class="fa fa-envelope"></i>
                    <span>TRANSFER</span>
                </a>
            </li>


        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>