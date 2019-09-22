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

<!-- Modal -->
<div class="modal fade" id="revenuesModal" tabindex="-1" role="dialog" aria-labelledby="revenuesModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="revenuesModalLabel">Entrada de valores</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
    <div class="modal-body">
    <form action="{{route('receitas-valores.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <select name="revenue_id" class="custom-select" id="inputGroupSelect01" required>
                    <option value="">Receitas</option>
                    @foreach ($revenues as $revenue)
                    <option value="{{$revenue->id}}">{{$revenue->name}}</option>
                    @endforeach
                </select>
                <label for="">Value</label>
                <input type="text" class="form-control" name="value" id="" aria-describedby="helpId" placeholder="" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>
</div>
</div>

{{-- card --}}
<div class="card">
    <div class="card-header text-center">
        <h1>Minhas receitas</h1>
    </div>
    <div class="card-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item text-uppercase font-weight-bold">Receita<p class="total">Total no mês</p></li>
            @php
            $i = 1;
            @endphp
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
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#revenuesModal">
            +
        </button>
    </div>
    @endsection
    @section('script')
    <script>
        $('#revenuesModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        });
    </script>
@endsection
