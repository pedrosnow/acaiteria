class ControllerDashaBoard{
    constructor(){
        this.qtdProdutosDOM = document.getElementById('produtos')
        this.getQtdProdutos();
    }

    getQtdProdutos(){

        $.ajax({
            type: "GET",
            url: "dashaboard/index",
            dataType: "JSON",
            success: dados => {
                
                this.qtdProdutosDOM.innerHTML = dados
            },
            error: erro =>{
                console.log(erro)
            }
        });

    }
}