@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Produtos</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{route('expenses.submit')}}" method="POST">
                        @csrf
                        @method('POST')
                        <select name="product_id" id="">
                            <option value="">Selecione</option>
                            @foreach ($products as $product)
                        <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                        <input type="text" name="price">
                        <button type="submit">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
