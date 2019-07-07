@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Meus gastos</div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{session('error')}}
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
                            <input class="dinheiro form-control" type="text" name="price" required>
                            <br>
                            <button class="btn btn-primary btn-lg col-md" type="submit">Salvar</button>
                            <br>
                            <br>
                            <a name="" id="" class="btn btn-primary btn-lg col-md" href="{{route('product')}}" role="button">Novo produto</a>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Produto</td>
                                    <th>Valor</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($expenses as $expense)
                                <tr>
                                    <td>{{$expense->name}}</td>
                                    <td>{{$expense->price}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection