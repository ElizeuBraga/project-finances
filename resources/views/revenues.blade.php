@extends('layouts.app')
@section('style')
    <style>
        h1{
            font-size: 25px;
        }

        .total{
            float: right;
        }

        .btn, .card{
            border-radius: 0px;
        }
    </style>
@endsection
@section('content')
<p>
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample"
        aria-expanded="false" aria-controls="collapseExample">
        Inseridos recentemente
    </button>
</p>
<div class="collapse" id="collapseExample">
    <div class="card card-body">
        <div class="">
            @foreach ($revenuesRecents as $rR)
            <p class="{{Carbon\Carbon::parse($rR->created_at)->format('d') == date('d') ? 'text-success' : 'text-warning'}}">
                {{$rR->name}} - {{number_format($rR->value, 2)}}
            </p>
            @endforeach
        </div>
    </div>
</div>
<!-- Modal revenueAmount-->
<div class="modal fade" id="revenuesAmountModal" tabindex="-1" role="dialog" aria-labelledby="revenuesAmountModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="revenuesAmountModalLabel">Entrada de valores</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
    <div class="modal-body">
    <form action="{{route('revenue-amounts.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <select name="revenue_id" class="custom-select" id="inputGroupSelect01" required>
                    <option value="">Receitas</option>
                    @foreach ($revenues as $revenue)
                    <option value="{{$revenue->id}}">{{$revenue->name}}</option>
                    @endforeach
                </select>
                <label for="">Value</label>
            <input type="hidden" value="{{Auth::user()->id}}" class="form-control" name="user_id" id="" aria-describedby="helpId" placeholder="" required>
                <input type="text" class="form-control" name="value" id="" aria-describedby="helpId" placeholder="" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>
</div>
</div>
<!-- Modal Revenue-->
<div class="modal fade" id="revenuesModal" tabindex="-1" role="dialog" aria-labelledby="revenuesModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="revenuesModalLabel">Nova Receita</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
    <div class="modal-body">
    <form action="{{route('revenues.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Receita</label>
            <input type="hidden" class="form-control" name="user_id" value="{{Auth::user()->id}}" id="" aria-describedby="helpId" placeholder="" required>
            <input type="text" class="form-control" name="name" id="input_name" aria-describedby="helpId" placeholder="" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>
</div>
</div>
{{-- receitas.store --}}

{{-- card --}}
<div class="card">
    <div class="card-header text-center">
        <h1>Minhas receitas</h1>
    </div>
    <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success text-center">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{session('success')}}
            </div>
            @endif

            @if (session('error'))
            <div class="alert alert-danger text-center">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{session('error')}}
            </div>
            @endif
        <ul class="list-group list-group-flush">
            <li class="list-group-item text-uppercase font-weight-bold">Receita<p class="total">Total no mês</p></li>
            @foreach ($revenues as $revenue)
            <li class="list-group-item">{{$revenue->name}}
                    @foreach ($revenueAmounts as $item)
                    @if ($revenue->id == $item->revenue_id)
                    <p class="total">{{$item->total}}</p>
                    @endif
                    @endforeach
                </li>
                @endforeach
            </ul>
        </div>
        <!-- Button  revenuesAmountModal-->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#revenuesAmountModal">
            Lançar valores
        </button>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#revenuesModal">
            Nova receita
        </button>
    </div>
    @endsection
    @section('script')
    <script>
        $('#revenuesAmountModal').on('shown.bs.modal', function () {
            // $('#myInput').trigger('focus')
        });
        $('#revenuesModal').on('shown.bs.modal', function () {
            $('#input_name').trigger('focus')
        });
    </script>
@endsection
