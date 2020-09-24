<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

   <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="{{ asset('public/js/login-jquery.js') }}"></script>
    <script src="{{ asset('public/js/login.js') }}"></script>

    @include('layouts.inc.customheader')

    <link href="{{ asset('public/css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/login-bootstrap.min.css') }}" rel="stylesheet">

    <style>
        html, body {
            /*responsive bg*/
            background-image: url("{{asset('public/storage/dashboard-bg-new.jpg')}}");
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

        .container{
            height: 100%;
            align-content: center;
        }

        .card{
            height: 300px;
            margin-top: auto;
            margin-bottom: auto;
            width: 330px;
            background-color: rgba(255,127,80,0.6) !important;
        }

        .social_icon span{
            font-size: 60px;
            margin-left: 10px;
            color: #FFC312;
        }

        .social_icon a{
            font-size: 60px;
            margin-left: 10px;
            color: #FFC312;
        }

        .social_icon a:hover{
            color: white;
            cursor: pointer;
        }

        .social_icon span:hover{
            color: white;
            cursor: pointer;
        }

        .card-header h4{
            color: white;
        }

        .social_icon{
            position: absolute;
            right: 20px;
            top: -45px;
        }

        .input-group-prepend span{
            width: 50px;
            background-color: #FFC312;
            color: black;
            border:0 !important;
        }

        input:focus{
            outline: 0 0 0 0  !important;
            box-shadow: 0 0 0 0 !important;

        }

        .remember{
            color: white;
        }

        .remember input
        {
            width: 20px;
            height: 20px;
            margin-left: 15px;
            margin-right: 5px;
        }

        .login_btn{
            color: black;
            background-color: #FFC312;
            width: 100px;
        }

        .login_btn:hover{
            color: black;
            background-color: white;
        }

        .links{
            color: white;
        }

        .links a{
            margin-left: 4px;
        }


    </style>

    @yield('customStyles')

</head>

<body>
<div id="app">


    <main class="py-4">
        @yield('content')
    </main>
</div>

@yield('customScripts')
</body>
</html>
