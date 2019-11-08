<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('/vendor/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <title>@yield('title')</title>
    <style>
        body{
            background-image: linear-gradient(to right, #43e97b 0%, #38f9d7 100%);
        }
        .container{
            margin-top: 1%;
            background: white;
            margin-bottom: 1%;
            min-width: 98%;
        }
    </style>
    @yield('style')
</head>
<body>
    {{-- @include ('footer') --}}
    <div class="container" id="app">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Finanças</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @auth
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('home')}}">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('revenues.index')}}">Receitas<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('expenses.index')}}">Gastos<span class="sr-only">(current)</span></a>
                </li>
                @endauth
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        @auth
                            {{Auth::user()->name}}
                        @endauth
                        @guest
                            Cadastre-se
                        @endguest
                    </button>
                    <div class="dropdown-menu" aria-labelledby="triggerId">
                        @auth
                            <a class="dropdown-item" href="#">Perfil</a>
                            <form action="{{route('logout')}}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item" href="#">Sair</button>
                            </form>
                        @endauth
                        @guest
                        <a class="dropdown-item" href="{{route('register')}}">Cadastre-se</a>
                        <a class="dropdown-item" href="{{route('login')}}">Login</a>
                        @endguest
                    </div>
                </div>
            </ul>
        </div>
    </nav>
        @yield('content')
    </div>
    {{-- <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> --}}
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="{{asset('/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('/vendor/bootstrap/js/bootstrap.js')}}"></script>
    @yield('script')
</body>
</html>
