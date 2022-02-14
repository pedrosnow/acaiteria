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

<h5>PAINEL APLICATIVO</h5>
<section id="main-painel-app">

    <section class="painel">
        
        <div id="hrader-painel">

            <span id="titulo"><strong>Status</strong></span>
            <span id="status">Online <span class="incone"></span></span>

        </div>
        <hr>
        <div id="main-painel">
            <div class="mensagem-body">
                <div>Aviso para os clientes</div>
                <textarea name="" id="" cols="60" rows="10"></textarea>
                <button class="btn btn-success">Enviar</button>
            </div>
        </div>
        <div id="footer-painel">


        </div>


    </section>


</section>



    <script src="{{asset('js/Home/ControllerDashaBoard.js')}}"></script> 
    <script src="{{asset('js/Home/index.js')}}"></script>

@endsection
