<?php

namespace estoque\Http\Controllers\api;

use Illuminate\Http\Request;

use estoque\Http\Requests;
use estoque\Http\Controllers\Controller;
use estoque\Produto;

class ProdutosController extends Controller
{

    private $produtos;
    public function __construct(Produto $produtos){
        $this->produtos = $produtos;
    }

    //Lista os produtos 
    public function index(){ 
        $produtos = $this->produtos->paginate(5); 
        return response()->json($produtos);
    }

    public function me($id){ 
        $produtos = $this->produtos->find($id); 
        return response()->json($produtos);
    }

    public function save(Request $request)
    {
        $dados = $request->all();
        $produtos = $this->produtos->create($dados);
        return response()->json($dados);}

    public function update(Request $request){
       $dados = $request->all();
       $produtos = $this->produtos->find($dados['id']);
       $produtos->update($dados);

       return response()->json($dados);
       
    }

    public function delete($id){
        $produtos = $this->produtos->find($id);
        $produtos->delete();
        return response()->json(['data'=>['msg' => 'Produto foi removido com sucesso!' ]]);
    }
}
