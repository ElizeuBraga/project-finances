@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
            <img src="/imgs/red-pig.svg">
        </div>
@endsection

{{-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Righteous&display=swa" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #1542E8;
            font-family: 'Righteous', cursive;
            font-weight: 500;
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
            color: #EB3F25;
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

        .col-md-4 > a > img {
            padding: 30px;
            width: 200px;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="/imgs/red-pig.svg" width="30" height="30" class="d-inline-block align-top" alt="">
                App finances
            </a>
            <div class="row">
                @auth
                <a class="btn" href="/home">Home</a>
                @endauth

                @guest
                <a class="btn" href="/login">Login</a>
                <a class="btn" href="/register">Cadastrar</a>                    
                @endguest
            </div>
        </nav>
        <div class="row justify-content-center">
            <img src="/imgs/red-pig.svg">
        </div>
    </div>
</body>
</html> --}}
