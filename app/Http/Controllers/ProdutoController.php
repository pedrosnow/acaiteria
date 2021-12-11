<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produtos;
use Illuminate\Support\Facades\Storage;


class ProdutoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('produtos');
    }

    public function showAll()
    {

        $totalProdutos = Produtos::all();

        return json_decode($totalProdutos);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $nome_produto =  $request->nome;
        $preco_produto =  $request->preco;
        $image_produto = $request->file_img;
        $volume = $request->volume;
        $quantidade_complemento = $request->qtdComplemento;

        if(empty($request->complemento)){

            
            $complemento_produto =  0;
        
        }else{
            
            $complemento_produto = 1;
        }
        
        Produtos::create([
            'produto' => $nome_produto,
            'preco' =>  $preco_produto,
            'volume' => $volume,
            'quantidade_complemento' => $quantidade_complemento,
            'complemento' => $complemento_produto,
            'img' => $image_produto->getClientOriginalName(),
            'id_user' => session()->get('id_usuario'),
        ]);

        $image_produto->storeAs('', $image_produto->getClientOriginalName(), 'pictures');




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletar(Request $request)
    {
      
        
        $arquivo = Produtos::Getprodutos($request->id);        
        
        $retorno = Storage::disk('public')->delete($arquivo[0]->img);
        
        $produto = Produtos::DeletarProduto($request->id);
        
        
        return response()->json($produto);

    }
}
