<header class="header black-bg">
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
    </div>
    <!--logo start-->
    <a href="{{ route('home') }}" class="logo"><b>Be<span>WALLET</span></b></a>
    <!--logo end-->
    <div class="top-menu">
        <ul class="nav pull-right top-menu">
            <li>
                <a class="logout" href="#" onclick="document.getElementById('logout-form').submit()">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </div>
</header>