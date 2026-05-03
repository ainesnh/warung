<header class="main-header">
    <a href="{{ url('/') }}" class="logo">
        <span class="logo-mini"><b>{{ strtoupper(substr(config('app.name', 'L'), 0, 1)) }}</b></span>
        <span class="logo-lg"><b>{{ config('app.name', 'Laravel') }}</b></span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                @auth
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="hidden-xs">{{ auth()->user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <p>{{ auth()->user()->name }}<small>{{ auth()->user()->email }}</small></p>
                            </li>
                            <li class="user-footer">
                                <div class="pull-right">
                                    @if (Route::has('logout'))
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="btn btn-default btn-flat">Logout</button>
                                        </form>
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </li>
                @else
                    @if (Route::has('login'))
                        <li><a href="{{ route('login') }}">Login</a></li>
                    @endif
                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @endif
                @endauth
            </ul>
        </div>
    </nav>
</header>
