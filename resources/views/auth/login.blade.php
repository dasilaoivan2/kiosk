@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h4> {{ __('Login') }} | {{ isset($url) ? ucwords($url) : ""}} </h4>

                    <div class="d-flex justify-content-end social_icon">
                        <span><a target="_blank" href="https://www.facebook.com"><i class="fab fa-facebook-square fa-sm"></i></a></span>
                        <span><a target="_blank" href="https://www.gmail.com"><i class="fab fa-google-plus-square fa-sm"></i></a></span>
                    </div>
                </div>
                <div class="card-body">
                    @isset($url)
                        <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
                            @else
                                <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                    @endisset
                                    @csrf


                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               placeholder="email address" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror

                                    </div>
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                                        </div>
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="current-password" placeholder="password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror


                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn float-right login_btn">
                                            {{ __('Login') }}
                                        </button>

                                    </div>
                                </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        Copyright 2020
                    </div>

                </div>
            </div>
        </div>
    </div>




    {{--<div class="container">--}}
        {{--<div class="row justify-content-center">--}}
            {{--<div class="col-md-6">--}}
                {{--<div class="card" style="background-color: coral">--}}
                    {{--<div class="card-header"><i--}}
                                {{--class="fas fa-lock"></i> {{ isset($url) ? ucwords($url) : ""}} {{ __('Login') }}</div>--}}


                    {{--<div class="card-body">--}}
                        {{--@isset($url)--}}
                            {{--<form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">--}}
                                {{--@else--}}
                                    {{--<form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">--}}
                                        {{--@endisset--}}
                                        {{--@csrf--}}

                                        {{--<div class="form-group row">--}}
                                            {{--<label for="email"--}}
                                                   {{--class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                                            {{--<div class="col-md-6">--}}
                                                {{--<input id="email" type="email"--}}
                                                       {{--class="form-control @error('email') is-invalid @enderror"--}}
                                                       {{--name="email" value="{{ old('email') }}" required--}}
                                                       {{--autocomplete="email" autofocus>--}}

                                                {{--@error('email')--}}
                                                {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $message }}</strong>--}}
                                    {{--</span>--}}
                                                {{--@enderror--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="form-group row">--}}
                                            {{--<label for="password"--}}
                                                   {{--class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                                            {{--<div class="col-md-6">--}}
                                                {{--<input id="password" type="password"--}}
                                                       {{--class="form-control @error('password') is-invalid @enderror"--}}
                                                       {{--name="password" required autocomplete="current-password">--}}

                                                {{--@error('password')--}}
                                                {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $message }}</strong>--}}
                                    {{--</span>--}}
                                                {{--@enderror--}}
                                            {{--</div>--}}
                                        {{--</div>--}}


                                        {{--<div class="form-group row mb-0">--}}
                                            {{--<div class="col-md-8 offset-md-4">--}}
                                                {{--<button type="submit" class="btn btn-primary">--}}
                                                    {{--{{ __('Login') }}--}}
                                                {{--</button>--}}

                                                {{--@if (Route::has('password.request'))--}}
                                                    {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                                                        {{--{{ __('Forgot Your Password?') }}--}}
                                                    {{--</a>--}}
                                                {{--@endif--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</form>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection
