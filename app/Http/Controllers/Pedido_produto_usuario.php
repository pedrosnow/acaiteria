<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedidos;

class Pedido_produto_usuario extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getAllPedidos(){
        
        $pedidos = Pedidos::getAllPeidos();
        
        
        return json_encode($pedidos);
        
        

    }

   public function viewPeido(Request $request){


        $pedidos = Pedidos::getAllPeidos($request->id);
            
        $Dados = array();
        
        
        foreach ($pedidos as $key => $value) {
            
            $complementoPeido = Pedidos::getAllComplementoPeido($value->id_produto);

            $pedido = array('pedido' => $value, 'complementos' => $complementoPeido);

            array_push($Dados,  $pedido);
        

        }
        
        
        return json_encode($Dados);

    }


}
