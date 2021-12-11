<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Produtos extends Model
{
    use HasFactory;

    protected $table = 'produto';

    public $timestamps = false;

    protected $fillable = [
        'id_produto',
        'produto',
        'preco',
        'volume',
        'quantidade_complemento',
        'complemento',
        'img',
        'id_user'
    ];


    public static function DeletarProduto($id){

        $query = DB::table('produto')
        ->where('id_produto', '=', $id)
        ->delete();

        return $query;


    }

    public static function QtdPedidos(){

        $query = DB::table('produto')
        ->get();

        return $query;
    }

    public static function Getprodutos($id){

        $query = DB::table('produto as p')
        ->select('p.img')
        ->where('p.id_produto', '=', $id)
        ->get();

        return $query;

    }


}
