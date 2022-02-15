@extends('layouts.app')

@section('content')

<div id="corpo-tabela">
    <h4>Pedidos</h4>
    <table id="tabela">
        <tr>
            <th>#ID</th>
            <th>Cliente</th>
            <th width="200px" >Status</th>
            <th style="width:70px">ver</th>
        </tr>
        
        
      
       
    </table>
</div>

    <script src="{{asset('js/Pedidos/ControllerPedidos.js')}}"></script>
    <script src="{{asset('js/Pedidos/index.js')}}"></script>



@endsection