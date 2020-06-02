<!-- Sidebar -->
<div class="badge-primary border-right" id="sidebar-wrapper">
    <div class="sidebar-heading">Admin Panel</div>
    <div class="list-group list-group-flush">
        <a href="{{ route('home') }}" class="list-group-item list-group-item-action bg-light">
            <i class="fa fa-tachometer" aria-hidden="true"></i>
            Dashboard
        </a>
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="#" data-toggle="collapse" data-target="#submenu-1" class="list-group-item list-group-item-action bg-light">
                    <i class="fa fa-users" aria-hidden="true"></i>
                        User Management &nbsp;&nbsp;&nbsp;
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                </a>
                <ul id="submenu-1" class="collapse">
                    <a href="{{ route('admin.permissions.index') }}" class="list-group-item list-group-item-action bg-light">
                        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                        Permissions
                    </a>
                    <a href="{{ route('admin.roles.index') }}" class="list-group-item list-group-item-action bg-light">
                        <i class="fa fa-briefcase" aria-hidden="true"></i>
                        Roles
                    </a>
                    <a href="{{ route('admin.users.index') }}" class="list-group-item list-group-item-action bg-light">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        Users
                    </a>
                </ul>
            </li>
        </ul>
        <a class="list-group-item list-group-item-action bg-light" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
            Logout
        </a>
    </div>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>