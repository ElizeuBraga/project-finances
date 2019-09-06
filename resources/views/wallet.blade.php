@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Carteira</div>
                <div class="card-body">
                    <form action="{{url('/carteira')}}" method="POST">
                        <div class="for-group">
                            @csrf
                            @method('POST')
                            <input class="form-control" type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <label for="">Obs</label>
                            <input class="form-control" type="text" name="obs">
                            <label for="">Dinheiro</label>
                            <input class="dinheiro form-control" type="text" name="money" required>
                            <br>
                            <button class="form-control btn btn-primary" type="submit">Salvar</button>
                        </div>
                    </form>
                </div>
                @php
                $moneyWallet = $moneyWallets - $moneyExpense;
                @endphp
                <center><h2><b>{{$date->isoFormat('MMMM')}}</b></h2></center>
                <h4>Ganhos - <b>{{ number_format($moneyWallets, 2, ',', '.')}}</b></h4>
                <h4>Gastos - <b>{{ number_format($moneyExpense, 2, ',', '.')}}</b></h4>
                <h4>Carteira - <b><span id="carteira">{{ number_format($moneyWallet, 2, ',', '.')}}</span></b></h4>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        carteira = document.getElementById("carteira");
        if(parseFloat(carteira.innerHTML) < 0){
            carteira.classList.add("negative");
        }else{
            carteira.classList.add("positive");
        }
    </script>
@endsection
