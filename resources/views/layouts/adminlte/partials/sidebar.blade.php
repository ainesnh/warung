<aside class="main-sidebar">
    <section class="sidebar">
        @auth
            <div class="user-panel" style="border-bottom: 1px solid rgba(255,255,255,0.05); padding-bottom: 15px;">
                <div class="pull-left image">
                    <i class="fa fa-user-circle fa-2x" style="color: white; margin-top: 5px;"></i>
                </div>
                <div class="pull-left info">
                    <p style="color: white;">{{ auth()->user()->name }}</p>
                    <small style="color: #4ade80;"><i class="fa fa-circle"></i> Online</small>
                </div>
            </div>
        @endauth

        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="header" style="color: rgba(255,255,255,0.3);">MASTER</li>
            <li class="{{ request()->routeIs('admin.menus.*') ? 'active' : '' }}">
                <a href="{{ route('admin.menus.index') }}">
                    <i class="fa fa-cutlery"></i> <span>Menu</span>
                </a>
            </li>
            
            @if(auth()->user()->isAdmin())
            <li class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <a href="{{ route('admin.users.index') }}">
                    <i class="fa fa-users"></i></i> <span>User</span>
                </a>
            </li>
            @endif

            <li class="header" style="color: rgba(255,255,255,0.3);">EKSTERNAL</li>
            <li>
                <a href="{{ route('home') }}" target="_blank">
                    <i class="fa fa-globe"></i> <span>Lihat Website</span>
                </a>
            </li>

            {{-- MENU LOGOUT DI BAGIAN BAWAH --}}
            <li class="header" style="color: rgba(255,255,255,0.3);">AKUN</li>
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: #f87171 !important;">
                    <i class="fa fa-sign-out" style="color: #f87171 !important;"></i> <span>Keluar / Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </section>
</aside>