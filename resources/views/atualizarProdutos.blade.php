@extends("layout")
@section("conteudo")

<h2 class= "mb-3">Atualizar produtos enviados</h2>
</div>

 <form action="/atualizarProdutos" method="put">
    @csrf
    <div class="row">
    <div class="col-6">
        <div class="form-group">
            Imagem: <input type="text" name="imagem" class="form-control" />
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            Nome: <input type="text" name="nome" class="form-control" />
    </div>
</div>
    <div class="col-6">
        <div class="form-group">
            Valor: <input type="text" name="valor" class="form-control" />
        </div>
</div>

    <div class="col-6">
        <div class="form-group">
            quantidade: <input type="text" name="quantidade" class="form-control" />
        </div>
</div>
    <div class="col-6">
        <div class="form-group">
            Descrição: <input type="text" name="descricao" class="form-control" />
        </div>
</div>
<div class="col-4">
 <input type="submit" value="Atualizar" class="btn btn-success btn-sm"/>
 </div>
    </form>

@endsection