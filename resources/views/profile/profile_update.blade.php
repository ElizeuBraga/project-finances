@extends('layouts.app')
@section('content')
<div>
	<form method="post" action="{{route('user.update', $user)}}">
		{{ csrf_field() }}
	    {{ method_field('PUT') }}

		<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
			<label>Nome</label>
			<input class="form-control" value="{{$user->name}}" type="" name="name">
			<span class="text-danger">{{ $errors->first('name') }}</span>
		</div>

		<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
			<label>Email</label>
			<input class="form-control" value="{{$user->email}}" type="" name="email">
			<span class="text-danger">{{ $errors->first('email') }}</span>
		</div>

		<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
			<label>Phone</label>
			<input class="form-control" value="{{$user->phone}}" type="" name="phone">
			<span class="text-danger">{{ $errors->first('phone') }}</span>
		</div>

		<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
			<label>Senha</label>
			<input class="form-control" value="" type="password" name="password" placeholder="********">
			<span class="text-danger">{{ $errors->first('password') }}</span>
		</div>

		<div class="form-group">
			<label>Confirme Senha</label>
			<input class="form-control" value="" type="password" name="password_confirmation"  placeholder="********">
		</div>
		<button class="form-control btn btn-primary">Salvar</button>
	</form>
</div>
@endsection