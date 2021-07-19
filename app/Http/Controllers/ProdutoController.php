<?php

namespace estoque\Http\Controllers;
use Request;
//use Illuminate\Http\Request;

//use estoque\Http\Requests;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Console\ViewClearCommand;
use Illuminate\Support\Facades\DB;



class ProdutoController extends Controller
{
    public function add(){
        return view('produto.formulario');
    }

    public function adiciona(){
       // $nome = Request::input('nome'); 
        //$descricao = Request::input('descricao'); 
        //$valor = Request::input('valor'); 
        //$quantidade = Request::input('quantidade');
        //return implode( ', ', array($nome, $descricao, $valor, $quantidade));
        return view('produto.adicionado');
    }

    public function lista(){
        
        $produtos = DB::select('select * from produtos');
         return view('produto.listagem')->with('produtos', $produtos);

   }



    public function mostra($id){
       // $id = Request::route('id');
        $resposta = DB::select('select * from produtos where id = ?',[$id]);
        

        if(empty($resposta)){
            return "Esse produto não existe";
        }else{
            return view('produto.detalhes')->with('p', $resposta[0]);
        }
    }

    public function delete(){

    }

    public function update(){

    }
}
