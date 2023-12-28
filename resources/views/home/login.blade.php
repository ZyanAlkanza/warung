@extends('dashboard.template-accessibility')

@push('css')
    <link rel="stylesheet" href="assets/css/style-login.css">
@endpush

@section('content')
    <div class="konten">

        @if (session('status'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close btn-alert" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="judul-konten">
            <h1>Login</h1>
        </div>

        <div class="isi-konten">
            <form action="login" method="post">
                @csrf
                <div class="email">
                    <label for="">Email</label>
                    <input type="text" name="email">
                </div>
                <div class="password">
                    <label for="">Password</label>
                    <input type="password" name="password">
                </div>
                <div class="rememberMe">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">Remember Me</label>
                </div>
                <button type="submit">Login</button>
                <a href="/register">Register</a>
            </form>
        </div>
    </div>
@endsection