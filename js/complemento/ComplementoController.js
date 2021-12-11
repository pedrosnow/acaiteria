class ComplementoController {
    constructor() {

        this.btnSalvar = document.getElementById('btn-salvar')
       
        this.AddComplemento()
    }

    getAllComplementos() {

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "GET",
            url: "complemento/getAll",
            dataType: "JSON",
            success: dados => {
                
            },error: dados => {

            }
        });


    }

    AddComplemento() {
        this.btnSalvar.addEventListener('click', ()=> {

            this.Complemento = document.getElementById('nome_produto')

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "complemento/cadastrar",
                data: {
                    complemento:  this.Complemento.value
                },
                dataType: "JSON",
                success: dados => {

                    console.log(dados)
                    
                }
                , error: dados => {
                    
                    console.log(dados)
                }
            });

        })
        

    }
}