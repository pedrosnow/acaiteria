class ComplementoController {
    constructor() {

        this.btnSalvar = document.getElementById('btn-salvar')

        this.AddComplemento()
        this.getAllComplementos()
    }

    getAllComplementos() {

        $("#tbody").height(' ');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "GET",
            url: "complemento/getAll",
            dataType: "JSON",
            success: dados => {

                dados.forEach(element => {

                    $("#tbody").append(
                        `
                        <tr>
                            <td>${element['nome']}</td>
                        <td>
                            <span onclick="Complemento.delete(${element['id_complemento']})" class="btn btn-outline-success corpo-action" ><li class="incone-action 	fas fa-toggle-on" name="trash-outline"></li></span>
                            <span onclick="Complemento.delete(${element['id_complemento']})" class="btn btn-outline-danger corpo-action" ><ion-icon class="incone-action" name="trash-outline"></ion-icon></span>
                        </td>
                        </tr>
                
                        `
                    );

                });

            }, error: dados => {

                console.log(dados)


            }
        });


    }
    // incone off

    // fas fa-toggle-off

    AddComplemento() {
        this.btnSalvar.addEventListener('click', () => {

            this.Complemento = document.getElementById('nome_produto')

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "complemento/cadastrar",
                data: {
                    complemento: this.Complemento.value
                },
                dataType: "JSON",
                success: dados => {

                    this.getAllComplementos()

                }
                , error: dados => {

                    console.log(dados)
                }
            });

        })


    }

    delete(id) {

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "complemento/deletar",
            data: {

                id: id
            },
            dataType: "json",
            success: dados => {
                this.getAllComplementos()
            },
            error: dados => {
                console.log(dados)

            }
        });
    }
}