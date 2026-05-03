<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.adminlte.partials.head')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('layouts.adminlte.partials.header')
    @include('layouts.adminlte.partials.sidebar')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>@yield('title', config('app.name', 'Laravel'))</h1>
            @yield('breadcrumb')
        </section>
        <section class="content">
            @yield('content')
        </section>
    </div>

    @include('layouts.adminlte.partials.footer')
</div>
@include('layouts.adminlte.partials.scripts')
@stack('scripts')
</body>
</html>
