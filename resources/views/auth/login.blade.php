@extends('layouts.public')

@section('title', 'Login Admin')

@section('content')
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Login Admin</h3>
                        </div>
                        <form method="POST" action="{{ route('login.process') }}">
                            @csrf
                            <div class="box-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">{{ $errors->first() }}</div>
                                @endif
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" required>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="remember"> Ingat saya</label>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                        </form>
                    </div>
                    <p class="text-center text-muted">Default: admin@warung.test / admin123</p>
                </div>
            </div>
        </div>
    </section>
@endsection
