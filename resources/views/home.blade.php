@extends('layouts.app')
@section('style')

@endsection
@section('content')
    <div class="card text-left">
      <img class="card-img-top" src="holder.js/100px180/" alt="">
      <div class="card-body">
        <h4 class="card-title">Relatório</h4>
        <p class="card-text text-success">Ganhos esse mês - {{number_format($totalRevenue, 2)}}</p>
        <p class="card-text text-danger">Gastos esse mês - {{number_format($totalExpense, 2)}}</p>
      </div>
    </div>
@endsection
@section('script')

@endsection
