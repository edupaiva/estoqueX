@extends('layout.principal')


@section('titulo')
    Listagem de produtos
@stop


@section('conteudo')
    <h1>Listagem de produtos</h1>

    @if(empty($produtos))
    <div class="alert alert-danger">Você não tem nenhum produto cadastrado.</div>
    @else

    <table class='table table-striped table-bordered table-hover'>
    @foreach($produtos as $p)
    <tr class="{{$p->quantidade<=1 ? 'danger' : '' }}" >
    <td> {{$p->nome}} </td>
    <td> {{$p->valor}} </td>
    <td> {{$p->descricao}} </td>
    <td> {{$p->quantidade}} </td>
    <td><a href="/estoque/public/produtos/mostra/<?php echo $p->id; ?>"><span class="glyphicon glyphicon-search"></span></a></td>
    </tr>
    @endforeach
    </table>

    @endif

    <h4>
        <span class="label label-danger pull-right">
        Um ou menos itens no estoque
        </span>
        </h4>

@stop
