@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Categorias</div>

                <div class="card-body">
                        <form action="{{route('category.submit')}}" method="POST">
                                <div class="for-group">
                                    @csrf
                                    @method('POST')
                                    <label class="">Nome da categoria</label>
                                    <input class="form-control" type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <input class="form-control" type="text" name="name" required>
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
