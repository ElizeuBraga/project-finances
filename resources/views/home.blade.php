@extends('layouts.app')
@section('style')
    <style>
        @media screen and (min-width: 800px) {
            .col-md-6{
                height: 250px;
                margin-top: 15px;
                margin-bottom: 2px;
            }

            img{
                height: 100%;
                border: solid green 1px;
            }

            a>img{
                margin-left: 25%;
            }
        }

        @media only screen and (max-width: 600px) {
            .container{
                width: 96%
            }
            .col-md-6{
                /* width: 100%; */
                /* height: 250px; */
                margin-top: 15px;
                margin-bottom: 2px;
            }
            
            img{
                height: 100%;
                width: 100%;
                border: solid green 1px;
                border-radius: 5px;
            }

            .btn{
                width: 100%;
                height: 50px;
                text-transform: uppercase;
                margin-top: 20%;
                border: none;
                padding-top: 12px;
                border-radius: 25px;
                font-size: 16px;
            }
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <a class="btn btn-primary" href="{{route('expenses')}}">
                Gastos
            </a>
        </div>
        <div class="row">
            <a class="btn btn-primary" href="{{route('wallet')}}">
                Carteira
            </a>
        </div>
        <div class="row">
            <a class="btn btn-primary" href="{{route('report')}}">
                Relatórios
            </a>
        </div>
        <div class="row">
            <a class="btn btn-primary" href="{{route('category')}}">
                Categorias
            </a>
        </div>
    </div>
@endsection
@section('script')
    
@endsection