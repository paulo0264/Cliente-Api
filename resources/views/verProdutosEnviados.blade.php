@extends("layout")
@section("conteudo")

<h1>Produtos enviados</h1>
@if (isset($array))
<div class="row">
@foreach ($array as $id)


 <div class="col-3 mb-3 d-flex align-items-stretch">
        <div class="card">
            <img src="{{ $id['imagem'] }} " class="card-img-top"/>
            <div class="card-body">
            <h6 class="card-title">{{ $id['nome'] }} - R$ {{ $id['valor'] }}</h6>
            
        
     <a href="{{ route('deletarProdutosEnviados', ['id'=> $id['id']]) }}" class="btn btn-sm btn-secondary">Remover</a>
     <a href="{{ route('atualizarProdutos', ['id'=> $id['id']]) }}" class="btn btn-sm btn-secondary">Atualizar</a>
           
            </div>
        </div>
    </div>
@endforeach
</div>
@endif

@endsection
