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
                    $money = $moneyWallet - $expenses;
                @endphp
            <p>Dinheiro na carteira - <b>{{ number_format($money, 2, ',', '.')}}</b></p>
            </div>
        </div>
    </div>
</div>
@endsection
