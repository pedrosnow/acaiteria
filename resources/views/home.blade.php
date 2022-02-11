@extends('layouts.app')

@section('content')

<section id="header-main-painel">

    <div class="conainer">
        <div class="cabecao-container">
            <div class="descricao">Pedidos feitos</div>
            <div id="pedidos" class="quantidade">0</div>
        </div>
    </div>

    <div class="conainer">
        <div class="cabecao-container">
            <div class="descricao">Clientes</div>
            <div id="cliente" class="quantidade">0</div>
        </div>
    </div>

    <div class="conainer">
        <div class="cabecao-container">
            <div class="descricao">Produtos cadastrados</div>
            <div id="produtos" class="quantidade">0</div>
        </div>
    </div>


</section>



    <script src="{{asset('js/Home/ControllerDashaBoard.js')}}"></script> 
    <script src="{{asset('js/Home/index.js')}}"></script>

@endsection
