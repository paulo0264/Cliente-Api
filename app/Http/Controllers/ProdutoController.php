<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProdutoController extends Controller
{
    public function index(Request $request){
        $data = [];

        //Buscar todos os produtos
        $listaProdutos = Produto::all();
        $data["lista"] = $listaProdutos;

        return view("home", $data);
    }

    public function categoria($idcategoria = 0, Request $request){
        $data =[];
        //select *from categorias
        $listaCategorias = Categoria::all();

        //secect *from limit 4
        $queryProduto = Produto::limit(4);

        if($idcategoria !=0){
            //WHERE categoria_id = $idcategoria
            $queryProduto->where("categoria_id", $idcategoria);
        }

        $listaProdutos = $queryProduto->get();

        $data["lista"] = $listaProdutos;
        $data["listaCategoria"] = $listaCategorias;
        $data["idcategoria"] = $idcategoria;
        return view("categoria", $data);
    }

    public function adicionarCarrinho($idproduto = 0, Request $request){
        //buscar produto por id
        $prod = Produto::find($idproduto);

        if($prod){
            //Encontrou um produto

            //buscar da sessão o carrinho atual
            $carrinho = session('cart', []);

            array_push($carrinho, $prod);
            session([ 'cart' => $carrinho ]);
        }
        return redirect()->route("home");
    }
    public function verCarrinho(Request $request){
        $carrinho = session('cart', []);
        $data = [ 'cart' => $carrinho];

        return view("carrinho", $data);
    }
    public function excluirCarrinho($indice, Request $request){
        $carrinho =session('cart', []);
        if(isset($carrinho[$indice])){
            unset($carrinho[$indice]);
        }
        session(['cart' => $carrinho]);
        return redirect()->route('ver_carrinho');
    }

    public function enviarProdutos(Request $request){
        $dados = $request->all();
        $response = Http::post('http://127.0.0.1:8090/produtos',[
            'imagem'=> $request->input('imagem'),
            'nome'=> $request->input('nome'),
            'valor'=> $request->input('valor'),
            'quantidade'=> $request->input('quantidade'),
            'descricao'=> $request->input('descricao')
            

        ]);
        return redirect()->route('verProdutosEnviados');
      
    }

public function verProdutosEnviados(){
$api = Http::get('http://127.0.0.1:8090/produtos');
$array = $api->json();

    return view("verProdutosEnviados", compact('array'));
}
public function deletarProduto($id){
    $del = Http::delete('http://127.0.0.1:8090/produtos/' . $id);
    $id = $del->json();

    return redirect()->route('verProdutosEnviados');
}
public function atualizarProdutos($id, Request $request){
    $atualizar = Http::put('http://127.0.0.1:8090/produtos/' . $id ,
    [
    'imagem'=> $request->input('imagem'),
    'nome'=> $request->input('nome'),
    'valor'=> $request->input('valor'),
    'quantidade'=> $request->input('quantidade'),
    'descricao'=> $request->input('descricao')
    
    
    ]);
    $id = $atualizar->json();
    return view("atualizarProdutos");
}
public function enviarProdutoMenu(Request $request){

    return view("enviarProdutoMenu");
}

}
