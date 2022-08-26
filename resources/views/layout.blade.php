<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop-Ecomerce</title>
<!-- CSS only -->
<link href="estilos/estilo.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
@yield("scriptjs")
</head>
<body>
<nav class="navbar navbar-light navbar-expand-md bg-light pl-5 pr-5 mb-5" style="padding-right:30px">
    <a href=" /" class="navbar-brand" style="padding:15px 30px">Shop</a>
    <div class="collapse navbar-collapse">
        <div class="navbar-nav">

            <a class="nav-link" href="{{ route('home') }}">Home</a>
            <a class="nav-link" href="{{ route('categoria') }}">Categorias</a>
            
             @if (!Auth::User())
              <a class="nav-link" href="{{ route('google-auth') }}">Entrar</a>   
              @else
               
                  <a class="nav-link" href="{{ route('enviarProdutoMenu') }}">Enviar produto</a>
             <a class="nav-link" href="{{ route('verProdutosEnviados') }}">Produtos enviados</a>
               <a class="nav-link" href="{{ route('logout') }}">Sair</a>
             @endif
              
            

        </div>
    </div>
    <a href="{{ route('ver_carrinho') }}" class="btn btn-sm-10"><i class="bi bi-cart-fill"></i>
    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16" padding-="20">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg>
</a>
</nav>

<div class="container">
    <div class="row">


@if (Auth::User())
    <div class="col-12">
    <p class="text-right"> Seja bem vindo, {{ Auth::User()->name}}. <a href="">sair</a></p>

</div>
@endif


@if ($message = Session::get("err"))
<div class="col-12">
<div class="alert alert-danger">{{$message}}</div>
    </div>
@endif

@if ($message = Session::get("ok"))
<div class=col-12>
<div class="alert alert-success">{{$message}}</div>
    </div>
@endif

        <!--Nessa div teremos uma área que os arquivos irão adicionar conteúdo-->
        @yield("conteudo")
    </div>
</div>
</body>

</html>