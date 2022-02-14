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
        
        $Dados = array();
        
        
        foreach ($pedidos as $key => $value) {
            
            $complementoPeido = Pedidos::getAllComplementoPeido($value->id_produto);

            array_push($Dados,  $value);
            array_push($Dados,  $complementoPeido);

        }
        
        
        return json_encode($Dados);
        
        

    }

}
