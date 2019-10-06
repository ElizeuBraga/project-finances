@extends('layouts.app')
@section('style')
<style>
    h1 {
        font-size: 25px;
    }

    .total {
        float: right;
    }

    .btn,
    .card {
        border-radius: 0px;
    }
</style>
@endsection
@section('content')
{{-- colapse --}}
<p>
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample"
        aria-expanded="false" aria-controls="collapseExample">
        Inseridos recentemente
    </button>
</p>
<div class="collapse" id="collapseExample">
    <div class="card card-body">
        <div class="">
            @foreach ($expensesRecents as $eR)
            <p class="{{Carbon\Carbon::parse($eR->created_at)->format('d') == date('d') ? 'text-success' : 'text-warning'}}">
                {{$eR->name}} - {{number_format($eR->value, 2)}}
            </p>
            @endforeach
        </div>
    </div>
</div>

<!-- Modal revenueAmount-->
<div class="modal fade" id="expensesAmountModal" tabindex="-1" role="dialog" aria-labelledby="expensesAmountModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="expensesAmountModalLabel">Gastos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('expense-amounts.store')}}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <select name="expense_sub_category_id" class="custom-select" id="inputGroupSelect01" required>
                            <option value="">Tipo de gasto</option>
                            @foreach ($expensesSubCategories as $expensesSubCategorie)
                            <option value="{{$expensesSubCategorie->id}}">{{$expensesSubCategorie->name}}</option>
                            @endforeach
                        </select>
                        <label for="">Value</label>
                        <input type="hidden" value={{Auth::user()->id}} class="form-control" name="user_id" id="name"
                            aria-describedby="helpId" placeholder="" required>
                        <input type="text" class="form-control" name="value" id="" aria-describedby="helpId"
                            placeholder="" required>
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
<!-- Modal expensesCategories-->
<div class="modal fade" id="expensesCategoriesModal" tabindex="-1" role="dialog"
    aria-labelledby="expensesCategoriesModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="expensesCategoriesModalLabel">Categorias de gastos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('expense-categories.store')}}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="">Receita</label>
                        <input type="hidden" class="form-control" name="user_id" value="{{Auth::user()->id}}" id=""
                            aria-describedby="helpId" placeholder="" required>
                        <input type="text" class="form-control" name="name" id="input_name" aria-describedby="helpId"
                            placeholder="" required>
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
<!-- Modal expensesSubCategories-->
<div class="modal fade" id="expensesSubCategoriesModal" tabindex="-1" role="dialog"
    aria-labelledby="expensesSubCategoriesModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="expensesSubCategoriesModalLabel">Sub Categorias de gastos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('expense-sub-categories.store')}}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="">Receita</label>
                        <div class="form-group">
                            <label for="">Categorias</label>
                            <select required class="form-control" name="expense_category_id" id="">
                                <option value="">Categoria</option>
                                @foreach ($expensesCategories as $expenseCategory)
                                <option value="{{$expenseCategory->id}}">{{$expenseCategory->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" value={{Auth::user()->id}} class="form-control" name="user_id" id="name"
                            aria-describedby="helpId" placeholder="" required>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                            placeholder="" required>
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
        @php
        $now = new Carbon\Carbon();
        @endphp
        <h1>Meus Gastos</h1>
        <h6>{{$now->formatLocalized('%B')}}</h6>
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
            <li class="list-group-item text-uppercase font-weight-bold">Gastos<p class="total">Total no mês</p>
            </li>
            @foreach ($expenseAmounts as $expenseAmount)
            <li class="list-group-item">{{$expenseAmount->name}}
                <p class="total">{{$expenseAmount->value}}</p>
            </li>
            @endforeach
        </ul>
    </div>
    <!-- Button  expensesAmountModal-->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#expensesAmountModal">
        Lançar valores
    </button>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#expensesCategoriesModal">
        Nova categoria
    </button>
    <!-- Button trigger modal subcategories-->
    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#expensesSubCategoriesModal">
        Nova sub categoria
    </button>
</div>
@endsection
@section('script')
<script>
    $('#expensesAmountModal').on('shown.bs.modal', function () {
            // $('#myInput').trigger('focus')
        });
        $('#expensesCategoriesModal').on('shown.bs.modal', function () {
            $('#input_name').trigger('focus')
        });
        $('#expensesSubCategoriesModal').on('shown.bs.modal', function () {
            $('#input_name').trigger('focus')
        });
</script>
@endsection
