@extends('main')

@section('content')
    <div class="main">
        <div class="grid wide">
            <div class="row">
                <div class="login col-12">
                    <form class="form_res-login" action="{{ route('login.store') }}" method="POST">
                        @csrf
                        <div class="head">Login</div>
                        <input type="text" name="email" id="email" placeholder="Email" value="{{ old('email') }}"
                            required>
                        @error('email')
                            <div class="alert text-danger">{{ $message }}</div>
                        @enderror
                        <input type="password" name="password" id="password" placeholder="Password" required>
                        @error('password')
                            <div class="alert text-danger">{{ $message }}</div>
                        @enderror
                        <a href="forgot_pass.html" class="forgot_pass">Forgot your password?</a>
                        <button class="submit" type="submit">Login now!</button>
                        <p class="text">or login with</p>
                        <div class="another">
                            <img src="{{ asset('/template/img/Google.png') }}" class="item">
                            <img src="{{ asset('/template/img/Facebook.png') }}" class="item">
                        </div>
                    </form>
                    <img class="form_bg" src="{{ asset('/template/img/Illusttration.png') }}" alt="...">

                </div>
            </div>
        </div>
    </div>
@endsection
