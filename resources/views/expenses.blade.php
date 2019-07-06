@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Meus gastos</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('expenses.submit')}}" method="POST">
                        <div class="form-group">
                                @csrf
                                @method('POST')
                                <select name="product_id" id="" class="form-control" required>
                                    <option value="">Selecione</option>
                                    @foreach ($products as $product)
                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                    @endforeach
                                </select>
                                <br>
                                <input class="form-control" type="text" name="price">
                                <br>
                                <button class="btn btn-primary btn-lg col-md" type="submit">Salvar</button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
