@extends('main')

@section('content')
    <div class="main">
        <div class="grid wide">
            <div class="row">
                <div class="login col-12">
                    <form class="form_res-login" action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="head">Register</div>
                        <input type="text" name="first_name" id="first_name" placeholder="First name"
                            value="{{ old('first_name') }}" required>
                        @error('first_name')
                            <div class="alert text-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" name="last_name" id="last_name" placeholder="Last name"
                            value="{{ old('last_name') }}" required>
                        @error('last_name')
                            <div class="alert text-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" name="email" id="email" placeholder="Email" value="{{ old('email') }}"
                            required>
                        @error('email')
                            <div class="alert text-danger">{{ $message }}</div>
                        @enderror
                        <input type="password" name="password" id="password" placeholder="Password"
                            value="{{ old('password') }}" required>
                        @error('password')
                            <div class="alert text-danger">{{ $message }}</div>
                        @enderror
                        <button id="submit" class="submit" type="submit">Star now!</button>
                        <p class="text">or use another account</p>
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
