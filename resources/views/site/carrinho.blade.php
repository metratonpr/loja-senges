@extends('site.layout')
@section('title', 'Carrinho')
@section('conteudo')
    <div class="row container">

        @if ($mensagem = Session::get('sucesso'))
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title">Sucesso!</span>
                    <p>{{ $mensagem }}</p>
                </div>
            </div>
        @endif

        @if($items->count() > 0)
        <h4>Carrinho possui {{ $items->count() }} item(s).</h4>
        <div class="col s12 m12">
            <table class="striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td><img src="{{ $item->attributes->image }}" alt="" srcset=""
                                    class="responsive-img circle" width="80px"></td>
                            <td>{{ $item->name }}</td>
                            <td>R$ {{ number_format($item->price, 2, ',', '.') }}</td>

                            <form action="{{ route('site.atualizacarrinho') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <td><input name="quantity" style="width:40px; font-weight:800" type="number" value="{{ $item->quantity }}"
                                        min="1" class="white center"></td>
                                <td>
                                    <input type="hidden" name="id" value="{{ $item->id }}">

                                    <button class="btn-floating waves-effect waves-light green"><i
                                            class="material-icons">refresh</i></button>

                            </form>
                            <form action="{{ route('site.removecarrinho') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <button class="btn-floating waves-effect waves-light red"><i
                                        class="material-icons">delete</i></button>
                            </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h5>Valor Total:R$ {{ number_format(\Cart::getTotal(), 2, ',', '.') }} </h5>
        </div>
        @else 
        <div class="card blue-grey darken-1">
            <div class="card-content white-text">
                <span class="card-title">Carrinho Vazio!</span>
                <p>Veja nossas ofertas!</p>
            </div>
        </div>
        @endif
        <div class="row container center">
            <a class="btn waves-effect waves-light blue" href="{{ route('site.index') }}">Continuar Comprando<i
                    class="material-icons right">shopping_cart</i></a>
            <a class="btn waves-effect waves-light yellow orange accent-4" href="{{ route('site.limparcarrinho') }}">Limpar Carrinho<i
                    class="material-icons right">clear</i></a>
            <a class="btn waves-effect waves-light green accent-4" href="{{ route('login.auth') }}">Finalizar Pedido<i
                    class="material-icons right">check</i></a>

        </div>
    </div>



@endsection
