@extends('layouts.app')
@section('style')
    <style>
        h1{
            font-size: 25px;
        }

        .total{
            float: right;
        }

        .btn, .card{
            border-radius: 0px;
        }
    </style>
@endsection
@section('content')
<div class="card">
    <div class="card-header text-center">
        <h1>Minhas receitas</h1>
    </div>
    <div class="card-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item text-uppercase font-weight-bold">Receita<p class="total">Total no mês</p></li>
            @php
            $i = 1;
            @endphp
            @foreach ($revenues as $revenue)
            <li class="list-group-item">{{$revenue->name}}
                @foreach ($revenueAmounts as $item)
                @if ($revenue->id == $item->revenue_id)
                    <p class="total">{{$item->total}}</p>
                @endif
                @endforeach
            </li>
            @endforeach
        </ul>
    </div>
    <button class="btn btn-primary">Nova receita</button>
</div>
@endsection
