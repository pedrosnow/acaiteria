@extends('layouts.app')

@section('content')

<div id="corpo-produtos">
    <a id="linkComplemento" href="complemento/" class="btn btn-primary">Complementos</a>
    <div id="formulario-cadastrar-produtos">
        <form action="produtos/store" id="formProdutos" method="post" enctype="multipart/form-data">
            @csrf
            <div class="campos">
                <div class="sub-campos" id="corpo-nome">
                    <label for="">Nome</label>
                    <input id="nome_produto" class="form-control" type="text" name="nome">
                </div>
                <div class="sub-campos" id="corpo-volume">
                    <label>Volume</label>
                    <input type="text" name="volume" id="volume" class="form-control">
                </div>
                <div class="sub-campos"  id="corpo-preco">
                    <label for="">Preço</label>
                    <input id="preco" class="form-control" type="text" name="preco">
                </div>
                <div class="sub-campos" id="corpo-complemento">
                    <label for="">Complemento</label>
                    <input id="complemento"  type="checkbox" name="complemento">
                </div>
                <div class="sub-campos">
                    <label>Quantidade de complemento</label>
                    <select name="qtdComplemento" class="form-control" id="qtd_complemento">
                        <option value="0">0</option>
                        <option value="1">1</option>                   
                        <option value="2">2</option>                   
                        <option value="3">3</option>                   
                        <option value="4">4</option>                   
                        <option value="5">5</option>                   
                        <option value="6">6</option>                   
                    </select>
                </div>
               
            </div>

            <div class="campos">
                
                <div class="sub-campos" id="corpo-image">               
                    <div class="custom-file">
                        <input type="file" name="file_img" id="file">
                    </div>
                                     
                </div>
                <div class="sub-campos">
                    <img src="img/prev.png" id="imgprev" width="100px">
                </div>

                <div class="sub-campos" id="corpo-salvar">
                    <button id="btn-salvar" class="btn btn-success">Salvar</button>
                </div>
            </div>
            <div class="campos">
                <div class="sub-campos-progress">
                    <span>Upload</span>
                    <span id="progresIndication" >0%</span>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" id="progressbar" style="width: 0%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <div id="corpo-tabela">
        <table>
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Preco</th>
                    <th>volume</th>
                    <th>Qtd Complemento</th>
                    <th>Coplemento</th>
                    <th style="width:100px">Opções</th>
                </tr>
            </thead>
            <tbody id="tbody">

               
                
            </tbody>
           
        </table>
    </div>


</div>
<script src="{{asset('js/Produtos/ControllerProdutos.js')}}"></script> 
<script src="{{asset('js/Produtos/index.js')}}"></script> 
    
@endsection