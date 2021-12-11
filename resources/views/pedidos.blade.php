@extends('layouts.app')

@section('content')

<div id="corpo-tabela">
    <h4>Pedidos</h4>
    <table>
        <tr>
            <th>#ID</th>
            <th>Cliente</th>
            <th width="200px" >Status</th>
            <th style="width:70px">ver</th>
        </tr>
        <tr>
            <td>01</td>
            <td>Acaí</td>
            <td>
                <span class="btn btn-primary corpo-action" ><ion-icon  class="incone-action" name="checkmark-circle-outline"></ion-icon></span>
                <span class="btn btn-info corpo-action" ><ion-icon class="incone-action" name="color-fill-outline"></ion-icon></span>
                <span class="btn btn-success corpo-action" ><ion-icon class="incone-action" name="bicycle-outline"></ion-icon></span>
            </td>
            <td>
                <span onclick="Pedido.ajaxGetRequest('1')"  class="btn btn-outline-danger corpo-action" ><ion-icon class="incone-action" name="resize-outline"></ion-icon></span>
            </td>
        </tr>
        <tr>
            <td>02</td>
            <td>Creme de Leite</td>
            <td>
                <span class="btn btn-primary corpo-action" ><ion-icon  class="incone-action" name="checkmark-circle-outline"></ion-icon></span>
                <span class="btn btn-info corpo-action" ><ion-icon class="incone-action" name="color-fill-outline"></ion-icon></span>
                <span class="btn btn-success corpo-action" ><ion-icon class="incone-action" name="bicycle-outline"></ion-icon></span>
            </td>
            <td>
                <span  class="btn btn-outline-danger corpo-action" ><ion-icon class="incone-action" name="resize-outline"></ion-icon></span>
            </td>
        </tr>
      
       
    </table>
</div>

    <script src="{{asset('js/Pedidos/ControllerPedidos.js')}}"></script>
    <script src="{{asset('js/Pedidos/index.js')}}"></script>



@endsection