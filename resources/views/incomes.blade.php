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
                    <p>Diga pra mim por gentileza, quanto ganhou hoje?</p>
                    <form action="{{route('income')}}" method="POST">
                        <div class="form-group">
                            @csrf
                        <input type="text" value="{{Auth::user()->id}}" name="user_id">
                            <input class="form-control" type="text" name="name" placeholder="Diga uma fonte de renda"><br>
                            <button class="form-control" type="submit">Enviar</button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
