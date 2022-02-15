<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pedidos extends Model
{
    use HasFactory;

    protected $table = 'pedido_produto_usuario';

    public $timestamps = true;


    public static function getAllPeidos(){

        $query = DB::table('pedido_produto_usuario as ppu')
        ->join('produto as p', 'p.id_produto', '=', 'ppu.id_produto')
        ->join('pedido as pe', 'pe.id_pedido', '=', 'ppu.id_pedido')
        ->join('usuario as u', 'u.id', '=', 'ppu.id_usuario')
        ->select('p.*','pe.*')
        ->get();
        return $query;
        
    }

    public static function getAllComplementoPeido($id_produto){

        $query = DB::table('produto_complemento as pc')
        ->join('complemento as c', 'c.id_complemento', '=', 'pc.id_complemento')
        ->where('pc.id_produto', '=', $id_produto)
        ->get();
        return $query;

    }


}
