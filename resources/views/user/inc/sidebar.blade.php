<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered">
                <a href="{{ route('profile') }}">
                    <img src="{{ asset('img/ui-sam.jpg') }}" class="img-circle" width="80">
                </a>
            </p>
            <h5 class="centered">
                <a href="{{ route('profile') }}">{{ Auth::user()->name }}</a>
            </h5>
            <li class="mt">
                <a class="active" href="{{ route('home') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="mt">
                <a class="" href="{{ route('transactions.index') }}">
                    <i class="fa fa-tasks"></i>
                    <span>DEPOSIT</span>
                </a>
            </li>
            <li class="mt hide">
                <a class="" href="withdraw.html">
                    <i class="fa fa-angle-up"></i>
                    <span>WITHDRAW</span>
                </a>
            </li>
            <li class="mt">
                <a class="" href="{{ route('transfers.index') }}">
                    <i class="fa fa-envelope"></i>
                    <span>TRANSFER</span>
                </a>
            </li>


        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>