<?php

namespace estoque;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos' ; 
    public $timestamps = true ;
    protected $fillable = array ( 'id', 'nome' , 'descricao' , 'valor' , 'quantidade' );

    //protected $guarded = ['id'];
}
