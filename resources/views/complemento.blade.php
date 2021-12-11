@extends('layouts.app')

@section('content')

<div id="corpo-produtos">
    <a id="linkComplemento" href="produtos/" class="btn btn-primary">Produtos</a>
    <div id="formulario-cadastrar-produtos">
        <form id="formProdutos" method="post">
            @csrf
            <div class="campos">
                <div class="sub-campos" id="corpo-nome">
                    <label for="">Nome</label>
                    <input id="nome_produto" class="form-control" type="text" name="complemento">
                </div>
                <div class="sub-campos">
                    <input type="button" value="Salvar" id="btn-salvar" class="btn btn-success">
                </div>
            </div>
        </form>

    </div>
    <div id="corpo-tabela">
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th style="width:140px">Opções</th>
                </tr>
            </thead>
            <tbody id="tbody">

               
                
            </tbody>
           
        </table>
    </div>


</div>

<script src="{{asset('js/complemento/ComplementoController.js')}}"></script>
<script src="{{asset('js/complemento/index.js')}}"></script>
    
@endsection