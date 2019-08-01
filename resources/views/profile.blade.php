@extends('layouts.app')
@section('content')
<a href="/perfil/{{Auth::user()->id}}/editar">Editar perfil</a>
@endsection