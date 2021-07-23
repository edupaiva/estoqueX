@extends('layout.principal') 

@section('conteudo') 
<h1>Novo produto</h1> 
<form method="post" action="adiciona"> 
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    
    @if (count($errors) > 0)
    <div class="alert alert-danger"> <ul>
    @foreach($errors->all() as $error) <li>{{ $error }} </li>@endforeach
    </div> 
    @endif

    <div class="form-group"> 
        <label>Nome</label> 
        <input name="nome"  value="{{ old('nome') }}" class="form-control"/> 
    </div> 
    
    <div class="form-group"> 
        <label>Descricao</label> 
        <input name="descricao"  value="{{ old('descricao') }}"  class="form-control"/>
     </div> 
     
     <div class="form-group"> 
         <label>Valor</label> 
         <input name="valor"  value="{{ old('valor') }}" class="form-control"/> 
        
    </div> <div class="form-group"> 
        <label>Quantidade</label> 
        <input type="number"  value="{{ old('quantidade') }}" name="quantidade" class="form-control"/>
     </div>
     
     <button type="submit" class="btn btn-primary btn-block">Cadastrar Produto</button>
     </form>
     @stop