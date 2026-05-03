<aside class="main-sidebar">
    <section class="sidebar">
        @auth
            <div class="user-panel">
                <div class="pull-left image">
                    <i class="fa fa-user-circle fa-2x text-white"></i>
                </div>
                <div class="pull-left info">
                    <p>{{ auth()->user()->name }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
        @endauth
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU UTAMA</li>
            <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
            </li>
            <li class="{{ request()->routeIs('admin.menus.*') ? 'active' : '' }}">
                <a href="{{ route('admin.menus.index') }}"><i class="fa fa-cutlery"></i> <span>Kelola Menu</span></a>
            </li>
            <li>
                <a href="{{ route('home') }}" target="_blank"><i class="fa fa-globe"></i> <span>Lihat Website</span></a>
            </li>
        </ul>
    </section>
</aside>
