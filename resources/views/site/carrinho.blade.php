
@extends('site.layout')
@section('title', 'Carrinho')
@section('conteudo')
<div class="row container">

    @if($mensagem = Session::get('sucesso'))
    <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title">Sucesso!</span>
          <p>{{$mensagem}}</p>
        </div>        
      </div>

    @endif
    
    <h4>Carrinho possui {{$items->count()}} item(s).</h4>
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
                <td><img src="{{$item->attributes->image}}" alt="" srcset="" class="responsive-img circle" width="80px"></td>
                <td>{{$item->name}}</td>
                <td>R$ {{number_format( $item->price,2, ',', '.')}}</td>
                <td><input style="width:40px; font-weight:800" type="number" value="{{$item->quantity}}" min="1" class="white center"></td>
                <td>
                    <button class="btn-floating waves-effect waves-light green"><i class="material-icons">refresh</i></button>
                    <button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button>
                </td>

              </tr>
              @endforeach 
            </tbody>
          </table>
    </div>
    <div class="row container center">
        <button class="btn waves-effect waves-light blue">Continuar Comprando<i class="material-icons right">shopping_cart</i></button>
        <button class="btn waves-effect waves-light yellow orange accent-4">Limpar Carrinho<i class="material-icons right">clear</i></button>
        <button class="btn waves-effect waves-light green accent-4">Finalizar Pedido<i class="material-icons right">check</i></button>

    </div>
</div>



@endsection