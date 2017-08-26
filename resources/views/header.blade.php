<header class="main-header">
    <a href="{{ URL::to('dashboard') }}" class="logo">
        <span class="logo-mini"><b>LMS</b></span>
        <span class="logo-lg"><b>Project </b>LMS</span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ URL::asset('dist/img/avatar5.png') }}" class="user-image" alt="User Image">
                    <span class="hidden-xs">{{ Session::get('full_name') }}</span>
                </a>
                <ul class="dropdown-menu">
                <li class="user-header">
                    <img src="{{ URL::asset('dist/img/avatar5.png') }}" class="img-circle" alt="User Image">
                    <p>
                    {{ Session::get('full_name') }}
                    </p>
                </li>
                <li class="user-footer">
                    <div class="pull-left">
                    <a href="{{ URL::to('profile') }}" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                    <a href="{{ URL::to('logout') }}" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                </li>
                </ul>
            </li>
            </ul>
        </div>
    </nav>
</header>