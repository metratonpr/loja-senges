@extends('site.layout')
@section('title', 'Home')
@section('conteudo')
<div class="row container">
    @foreach ($produtos as $produto)        
    <div class="col s12 m3">
        <div class="card">
            <div class="card-image">
              <img src="{{$produto->imagem}}">
              <a  href="{{route('site.details', $produto->slug )}}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">visibility</i></a>
            </div>
            <div class="card-content">
                <span class="card-title">{{Str::limit($produto->nome,20)}}</span>
              <p>{{Str::limit($produto->descricao,50)}}</p>
            </div>
          </div>
    </div>
    @endforeach 
</div>

<div class="row center">
  {{-- Copiar o codigo da pagina e salvar dentro da pasta custom --}}
  {{ $produtos->links('custom.pagination')}} 
</div>
@endsection


