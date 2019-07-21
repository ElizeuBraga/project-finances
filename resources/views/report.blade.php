@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <h3 class="">Relatório do mês</h3>
                            <hr class="my-2">
                            <p>Olá <b>{{Auth::user()->name}}</b> analizei os seus gastos e os separei por categoria :)</p>
                            <p class="lead">
                                {{-- <a class="btn btn-primary btn-lg" href="Jumbo action link" role="button">Jumbo action name</a> --}}
                            </p>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Categoria</th>
                                        <th>Valor gasto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($exReports as $exReport)
                                    <tr>
                                        <td>{{$exReport->name}}</td>
                                        <td>{{number_format($exReport->total_category, 2)}}</td>
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
</div>
@endsection