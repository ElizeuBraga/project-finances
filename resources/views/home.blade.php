@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col">
    <center>
        <a href="/carteira"><img src="/imgs/wallet.png" alt="" style="height: 200px;"></a>
        <h3>Carteira</h3>
    </center>
    </div>
    <div class="col">
        <center>
            <a href="/despesas"><img src="/imgs/expense.png" alt="" style="height: 200px;"></a>
            <h3>Gastos</h3>
        </center>
    </div>
    <div class="col">
        <center>
            <a href="/relatorios"><img src="/imgs/report.png" alt="" style="height: 200px;"></a>
            <h3>Relatótrios</h3>
        </center>
    </div>
</div>
@endsection
