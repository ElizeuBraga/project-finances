@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <img src="/imgs/red-pig.svg">
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="w3-card" style="padding: 12px;">
          <h5 class="card-title">Dicas para economizar e alavancar suas finanças</h5>
          <p class="card-text">Você pode sair das dividas e economizar, ou quem sabe até virar um investidor de sucesso. 😉</p>
          <a href="/economize" class="w3-button w3-red">Vamos lá</a>
      </div>
    </div>
    <div class="col-sm-6">
        <div class="w3-card" style="padding: 12px;">
          <h5 class="card-title">Livros para ler</h5>
          <p class="card-text">A leitura é uma das melhores opções para quem quer aprender algo novo, incentiva nossa imaginação.</p>
          <a href="/livrosparaler" class="w3-button w3-red">Oba! quero ver</a>
      </div>
    </div>
  </div>
@endsection