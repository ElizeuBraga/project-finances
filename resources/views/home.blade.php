@extends('layouts.app')
@section('style')
<style>
    .icons{
        padding: 12px 12px 12px 12px;
        height: 200px;
        border: solid;
        border-color: tomato;
    }

    .col{
        padding: 10px;
        margin-left: 80px;
    }
</style>
@endsection
@section('content')
<div class="row">
    <div class="col">
        <a href="/carteira"><img class="icons" src="/imgs/wallet.png" alt=""></a>
    </div>
    <div class="col">
        <a href="/despesas"><img class="icons" src="/imgs/expense.png" alt="">
    </div>
    <div class="col">
        <a href="/relatorios"><img class="icons" src="/imgs/report.png" alt="">
    </div>
</div>
@endsection
