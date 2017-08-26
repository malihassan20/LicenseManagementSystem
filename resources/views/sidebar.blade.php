<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
            <img src="{{ URL::asset('dist/img/avatar5.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <br/>
                <p><a href="{{ URL::to('profile') }}">{{ Session::get('full_name') }}</a></p>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header">DASHBOARD NAVIGATION</li>
            <li class="treeview">
                <a href="{{ URL::to('dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ URL::to('profile') }}">
                    <i class="fa fa-user"></i> <span>Profile</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-address-book"></i>
                    <span>Client</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ URL::to('client') }}/create"><i class="fa fa-circle-o"></i> Create Client</a></li>
                    <li><a href="{{ URL::to('client') }}"><i class="fa fa-circle-o"></i> Manage Clients</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-briefcase"></i>
                    <span>Project</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ URL::to('project') }}/create"><i class="fa fa-circle-o"></i> Create Project</a></li>
                    <li><a href="{{ URL::to('project') }}"><i class="fa fa-circle-o"></i> Manage Projects</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-key"></i> <span>License</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ URL::to('license') }}/create"><i class="fa fa-circle-o"></i> Create License</a></li>
                    <li><a href="{{ URL::to('license') }}"><i class="fa fa-circle-o"></i> Manage Licenses</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cubes"></i> <span>Project Types</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ URL::to('type') }}/create"><i class="fa fa-circle-o"></i> Create Type</a></li>
                    <li><a href="{{ URL::to('type') }}"><i class="fa fa-circle-o"></i> Manage Types</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i> <span>Project Technologies</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ URL::to('technology') }}/create"><i class="fa fa-circle-o"></i> Create Technology</a></li>
                    <li><a href="{{ URL::to('technology') }}"><i class="fa fa-circle-o"></i> Manage Technologies</a></li>
                </ul>
            </li>
        </ul>
    </section>
</aside>