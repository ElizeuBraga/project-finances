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

                    Aqui teremos controle das finanças pessoais e com o passar do tempo teremos noovidades :)
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
