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
                        @csrf
                        @method('POST')
                        <input type="text" name="name">
                        <button type="submit">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
