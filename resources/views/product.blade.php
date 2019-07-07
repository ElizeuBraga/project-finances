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
                    <form action="{{route('product.submit')}}" method="POST">
                        <div class="for-group">
                            @csrf
                            @method('POST')
                            <label class="">Nome do produto</label>
                            <input class="form-control" type="text" name="name" required>
                            <br>
                            <label class="">Selecione uma categoria</label>
                            <select class="form-control" name="category_id" id="" required>
                                <option value="">Selecione</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            <br>
                            <button class="form-control btn btn-primary" type="submit">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection