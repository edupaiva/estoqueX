<?php

namespace estoque\Http\Controllers;

use estoque\Http\Requests\ProdutosRequest;
use Request;
//use Illuminate\Http\Request;

//use estoque\Http\Requests;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Console\ViewClearCommand;
use Illuminate\Support\Facades\DB;
use estoque\Produto;


class ProdutoController extends Controller
{
    

   

    

     public function lista(){
         
        $produtos = Produto::orderBy('nome')->paginate(5);
         return view('produto.listagem')
            ->with('produtos', $produtos);

   }
   public function formularioCadastro(){
        return view('produto.formulario');
    }

    public function adiciona(ProdutosRequest $request){
        
           

        Produto::create($request::all()) ;
        return redirect()
            ->action('ProdutoController@lista')
            ->withInput(Request::only('nome'));
    }

    public function mostra($id){
        $produto = Produto::find($id);
        if(empty($produto)){
            return "Esse produto não existe";
        }else{
            return view('produto.detalhes')
                ->with('p', $produto);
        }
    }

    public function remove($id){
        $produto = Produto::find($id);
        $produto->delete();

        return redirect()
            ->action('ProdutoController@lista');


    }

    public function atualizar($id){
        $produto = Produto::find($id);
        $produto->update();
        
        return redirect()
            ->action('ProdutoController@lista')
            ->withInput(Request::only('nome'));

    }
}
