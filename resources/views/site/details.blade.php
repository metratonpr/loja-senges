@extends('site.layout')
@section('title', 'Detalhes do Produto')
@section('conteudo')
    <div class="row container">
        <div class="col s12 m6">
            <img src="{{ $produto->imagem }}" class="responsive-img">
        </div>
        <div class="col s12 m6">
            <h3>{{ $produto->nome }}</h3>
            <h4>R$ {{ number_format($produto->preco, 2, ',', '.') }}</h4>
            <p>Categoria: {{ $produto->category->nome }}</p>
            <p>{{ $produto->descricao }}</p>
            <p>Postado por: {{ $produto->user->firstName }}</p>

            <form action="{{ route('site.addcarrinho') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $produto->id }}">
                <input type="hidden" name="name" value="{{ $produto->nome }}">
                <input type="hidden" name="price" value="{{$produto->preco }}">
                <div>
                    <label for="qnt">Quantidade</label>
                    <input id="qnt" type="number" name="qnt" value="1">
                </div>
                <input type="hidden" name="img" value="{{ $produto->imagem }}">

                <button class="btn orange btn-large">Comprar</button>
            </form>

        </div>

    </div>
@endsection
