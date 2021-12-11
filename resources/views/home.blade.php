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

<section id="main-graficos-historico-pedido">

    <div id="graficos">
        <h5>Graficos de vendas</h5>
        <div>
            <canvas id="myChart"></canvas>
        </div>
    </div>
    <div id="historico-pedidos">
        <h5>Último pedidos</h5>
        <div class="container-historico-pedidos">

        <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
            <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0" id="perfil-pedido">
            <div class="d-flex gap-2 w-100 justify-content-between">
            <div>
                <h6 class="mb-0">Maria Clara</h6>
                <p class="mb-0 opacity-75">Açaí</p>
            </div>
            <small class="opacity-50 text-nowrap">now</small>
            </div>
        </a>

        </div>

    </div>

</section>

<script>
    const labels = [
        'Janeiro',
        'fevereiro',
        'março',
        'abril',
        'Maio',
        'junho',
        'julho',
        'agosto',
        'setembro',
        'outubro',
        'novembro',
        'dezembro',
    ];
    const data = {
        labels: labels,
        datasets: [{
            label: 'Grafico Anual',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 5, 5, 2, 20, 30, 20],
        }]
    };
    const config = {
        type: 'line',
        data: data,
        options: {}
    };
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>

    <script src="{{asset('js/Home/ControllerDashaBoard.js')}}"></script> 
    <script src="{{asset('js/Home/index.js')}}"></script>

@endsection
