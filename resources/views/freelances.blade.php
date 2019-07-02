@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Seja bem vindo <b>{{Auth::user()->name}}</b>!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="/freelances" method="POST">
                        @csrf
                        @method('POST')
                        <select>
                            @foreach ($collection as $item)
                        <option value="{{}}"></option>
                            @endforeach
                        </select>
                        <input type="text" name="description">
                        <input type="text" name="price">
                        <button type="submit">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
