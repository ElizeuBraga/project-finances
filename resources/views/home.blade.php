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
                width: 100%;
                height: 250px;
                margin-top: 15px;
                margin-bottom: 2px;
            }
            
            img{
                height: 100%;
                width: 100%;
                border: solid green 1px;
                border-radius: 5px;
            }
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
            <a href="{{route('expenses')}}">
                    <img src="images/img-09.svg" alt="">
                </a>
            </div>
            <div class="col-md-6">
                <a href="{{route('wallet')}}">
                    <img src="images/img-10.svg" alt="">
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="{{route('report')}}">
                    <img src="images/img-11.svg" alt="">
                </a>
            </div>
            <div class="col-md-6">
            <a href="{{route('category')}}">
                    <img src="images/img-12.svg" alt="">
                </a>
            </div>
        </div>
    </div>
@endsection
@section('script')
    
@endsection