@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Carteira</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>Olá {{$userName}} hoje é {{$day}}</p>
                    <p>Diga pra mim por gentileza, quanto ganhou hoje?</p>
                    <form action="{{route('wallet')}}" method="POST">
                        <div class="form-group">
                            @csrf
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}" id="">
                            <select name="income_id" class="form-control" required>
                                @foreach ($incomes as $income)
                                <option value="">Fontes de Renda</option>
                                <option value="{{$income->id}}">{{$income->name}}</option>
                            </select><br>
                            @endforeach
                            <input class="form-control" type="text" name="money" placeholder="Quanto ganhou hoje?"><br>
                            <button class="form-control" type="submit">Enviar</button> 
                        </div>
                    </form>

                    <div class="table">
                        <table>
                            <tbody>
                                <thead>Relatorio</thead>
                                <th>Dia</th>
                                <th>Valor</th>
                                @foreach ($reports as $report)
                                <tr>
                                    <td>{{$report->money}}</td>
                                    <td>{{$report->created_at}}</td>
                                    <td>
                                        <form action="/carteira/{{$report->id}}" method="POST")>
                                            <button class="btn btn-danger btn-sm" type="submit">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
