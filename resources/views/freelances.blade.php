@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Seja bem vindo <b>{{Auth::user()->name}}</b>!</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{-- <form action="/taxas" method="POST" style="background:red;">
                        @csrf
                        @method('POST')
                        <label for="">Valores de taxas</label>
                        <input class="form-control" type="text" name="price" required>
                        <div>
                            <h5>Já cadastradas</h5>
                            @foreach ($rates as $rate)
                        <p>{{$rate->price}}</p>
                    @endforeach
                </div>
                <button class="btn btn-primary" type="submit">Salvar</button>
                </form> --}}


                <form action="/freelances" method="POST" style="background:yellow;">
                    @csrf
                    @method('POST')
                    <label for="">Região</label>
                    <select class="form-control" name="region_id" required>
                        <option value="">Selecione</option>
                        @foreach ($regions as $region)
                        <option value="{{$region->id}}">{{$region->name}}</option>
                        @endforeach
                    </select>
                    <label for="">Observação</label>
                    <input class="form-control" type="text" name="obs">
                    <button class="btn btn-primary" type="submit">Salvar</button>

                    <table class="table">
                        <tr style="background:red;">
                            <th>Regiao</th>
                            <th>Endereço</th>
                            <th style="">Valor</th>
                        </tr>
                        @foreach ($dadosEntregas as $entregas)
                        <tr>
                            <td>{{$entregas->regionName}}</td>
                            @if ($entregas->obs == null)
                            <td>--</td>
                            @else
                            <td style="">{{$entregas->obs}}</td>
                            @endif
                            <td style="background:red;">{{number_format($entregas->priceRegion, 2)}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td style="background:red;"><b>Total</b></td>
                            <td style="background:red;"></td>
                            <td style="background:red;"><b>{{number_format($total_price + 45, 2)}}</b></td>
                        </tr>
                    </table>
                </form>

                <form action="/regioes" method="POST" style="background:green;">
                    @csrf
                    @method('POST')
                    <label for="">Regioes</label>
                    <input class="form-control" type="text" name="name" required>
                    <label for="">Valor</label>
                    <select class="form-control" name="rate_id" required>
                        <option value="">Selecione</option>
                        @foreach ($rates as $rate)
                        <option value="{{$rate->id}}">{{$rate->price}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-primary" type="submit">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection