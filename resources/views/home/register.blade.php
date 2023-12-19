@extends('dashboard.template-accessibility')

@push('css')
    <link rel="stylesheet" href="assets/css/style-register.css">
@endpush

@section('content')
    <div class="konten">
        <div class="judul-konten">
            <h1>Register</h1>
        </div>

        <div class="isi-konten">
            <form action="register" method="post">
                @csrf
                <div class="name">
                    <label for="">Username</label>
                    <input type="text" name="name"  class="@error('name') is-invalid @enderror">
                    @error('name')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="email">
                    <label for="">Email</label>
                    <input type="text" name="email" class="@error('email') is-invalid @enderror">
                    @error('email')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="password">
                    <label for="">Password</label>
                    <input type="password" name="password"  class="@error('password') is-invalid @enderror">
                    @error('password')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="password">
                    <label for="">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="@error('password_confirmation') is-invalid @enderror">
                    @error('password_confirmation')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection