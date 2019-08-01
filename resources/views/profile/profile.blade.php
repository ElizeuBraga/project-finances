@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
	<img src="/imgs/profile.png" width="100px">
</div>
<div class="card">
	<div class="card-body">
		<p>Nome: {{Auth::user()->name}}</p>
		<p>Email: {{Auth::user()->email}}</p>
		<p>Telefone: {{Auth::user()->phone}}</p>
		<p>Senha: {{Auth::user()->password}}</p>

		<a class="btn" style="background: #F24405; color: white;" href="/perfil/{{Auth::user()->id}}">Editar perfil</a>
	</div>
</div>
@endsection