@extends('site.layout')
@section('title', 'Home')
@section('conteudo')
<div class="row container">
    <div class="col s12 m6">
        <img src="{{$produto->imagem}}" class="responsive-img">
    </div>
    <div class="col s12 m6"> 
        <h2>{{$produto->nome}}</h2>   
        <p>{{$produto->descricao}}</p>
        <button class="btn orange btn-large">Comprar</button>   

    </div>

</div>
@endsection