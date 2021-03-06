<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complemento;

class ComplementoController extends Controller
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
        return view('complemento');
    }

    
    public function getAll()
    {

        $query = Complemento::getAll();
        return json_encode($query);
        
    }

    
    public function store(Request $request)
    {
        
        $query =  Complemento::create([
            
            'nome' => $request->complemento
        ]);

        return json_encode($query);


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
    public function destroy(Request $request)
    {
        $complemento = Complemento::De($request->id);
        return json_encode($complemento);
    }
}
