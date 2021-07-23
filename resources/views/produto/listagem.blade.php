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
        <tr class="th-">
            <th>produto</th>
            <th>Preço</th>
            <th>Descrição</th>
            <th>Quantidade</th>
            <th colspan="3">Ações</th>
            

        </tr>
            @foreach($produtos as $p)
            <tr class="{{$p->quantidade<=1 ? 'danger' : '' }}" >
            <td> {{$p->nome}} </td>
            <td> {{$p->valor}} </td>
            <td> {{$p->descricao}} </td>
            <td> {{$p->quantidade}} </td>
            <td><a href="{{action('ProdutoController@mostra', $p->id)}}"><span class="glyphicon glyphicon-search"></span></a></td>
            <td><a href="{{action('ProdutoController@atualizar', $p->id)}}"><span class="glyphicon glyphicon-edit"></span></a></td>
            <td><a href="{{action('ProdutoController@remove', $p->id)}}"><span class="glyphicon glyphicon-trash"></span></a></td>
            </tr>
        @endforeach
        
        </table>
        <div class="d-flex justify-content-center">
            {!! $produtos->links() !!}
        </div>
        <h4>
        <span class="label label-danger pull-right">
        Um ou menos itens no estoque
        </span>
        </h4>

        @if(old('nome'))
        <div class=" alert alert-success" id="collapseExample"> 
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                X
              </a> <strong>Sucesso!</strong> O produto {{ old('nome') }} foi adicionado. </div>
        @endif


    @endif

       



@stop
