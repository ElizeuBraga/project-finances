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
                            <label for="">Selecione um produto</label>
                            <select name="product_id" id="" class="form-control" required>
                                <option value="">Selecione</option>
                                @foreach ($products as $product)
                                <option value="{{$product->id}}">{{$product->name}}</option>
                                @endforeach
                            </select>
                            <br>
                            <label for="">Preço</label>
                            <input class="dinheiro form-control" type="text" name="price" required>
                            <br>
                            <button class="btn btn-primary btn-lg col-md" type="submit">Salvar</button>
                            <br>
                            <br>
                            <a name="" id="" class="btn btn-primary btn-lg col-md" href="{{route('product')}}" role="button">Novo produto</a>
                    </form>
                </div>
                <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Produto</td>
                                    <th>Categoria</td>
                                    <th>Valor</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($expenses as $expense)
                                <tr>
                                    <td>
                                        {{$expense->name}}
                                        @if (Carbon\Carbon::parse($expense->created_at)->format('d') == date('d'))
                                        <span style="font-size: 11px; color:green;">Hoje</span>
                                        @endif

                                        @if (Carbon\Carbon::parse($expense->created_at)->format('d') == date('d') - 1)
                                        <span style="font-size: 11px; color:orange;">Ontem</span>
                                        @endif
                                    </td>
                                    <td>{{$expense->category_name}}</td>
                                    <td><b>R$</b> {{ number_format($expense->price, 2)}}</td>
                                </tr>
                                @endforeach
                                <tr style="background:tomato;">
                                    <td><b>Total</b></td>
                                    <td></td>
                                    <td style=""><b>R$</b> {{number_format($total_price, 2)}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
    @endsection