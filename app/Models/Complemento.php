<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Complemento extends Model
{
    use HasFactory;

    protected $table = 'complemento';

    public $timestamps = false;

    protected $fillable = [
        'id_complemento',
        'nome',
    ];

    public static function getAll(){
        $query  = DB::table('complemento')
        ->select('*')
        ->get();
        return $query;
    }

    public static function De($id){
        
        $query = DB::table('complemento')
        ->where('complemento.id_complemento', '=', $id)
        ->delete();
        return $query;
    }

}
