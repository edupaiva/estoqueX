<?php

namespace estoque\Http\Controllers;



use estoque\Http\Requests;
use Illuminate\Support\Facades\Auth; 
use Request; 

class LoginController extends Controller
{
   public function login(){
       
    $credenciais = Request::only ( 'email' , 'password' ); 
    if (Auth ::attempt ( $credenciais )) 
        { return "Usuário NOME logado com sucesso" ; } 
        return "As credencias não são válidas" ; }
   
}
