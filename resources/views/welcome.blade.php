<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>KIOSK</title>

    <script src="{{ asset('public/js/all.js') }}"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('public/css/all.css') }}" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            /*responsive bg*/
            background-image: url("{{asset('public/storage/kiosk-bg.jpg')}}");
            background-position: center center;
            background-attachment: fixed;
            background-size: cover;
            background-repeat: no-repeat;
            /*end responsive bg*/
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        /*#logo{*/
            /*position: absolute;*/
            /*top: 18px;*/
            /*left: 18px;*/

        /*}*/
    </style>
</head>
<body>
{{--<div id="logo">--}}
    {{--<img width="100px" src="{{asset('public/storage/seal1917.png')}}">--}}
{{--</div>--}}


<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}"><i class="fas fa-home"></i> Home</a>
            @else
                <a href="{{ route('login') }}"><i class="fas fa-lock"></i> Login</a>

                {{--@if (Route::has('register'))--}}
                {{--<a href="{{ route('register') }}">Register</a>--}}
                {{--@endif--}}
                @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">

            <div style="background-color: coral; border-radius: 30px;padding: 20px;">
                <a style="text-decoration: none; color: darkred" href="{{route('client.index')}}"><i class="fas fa-search fa-lg"></i> Service Finder </a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
