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
                    
                    <form action="/taxas" method="POST" style="background:red;">
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
                        
                        @foreach ($dadosEntregas as $entregas)
                        <p>{{$entregas->regionName}}-{{$entregas->obs}}-{{$entregas->priceRegion}} - {{$entregas->created_at}}</p>
                        @endforeach
                        <p>{{$total_price}}</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
