class ControllerPedidos {

    constructor() {

        this.modal = document.getElementById('modal')
        this.body = document.getElementsByTagName('body')
        this.GetAllPedidos()

    }



    GetAllPedidos() {

        // Vai traser todos os dados da tabela

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "GET",
            url: "pedidos/clientes",
            data: "data",
            dataType: "JSON",
            success: dados => {

                dados.forEach(element => {

                    console.log(element)

                    $("#tabela").append(`

                        <tr>
                            <td>${element['id_pedido']}</td>
                            <td>${element['nome']}</td>
                            <td>
                                <span class="btn btn-primary corpo-action" ><ion-icon  class="incone-action" name="checkmark-circle-outline"></ion-icon></span>
                                <span class="btn btn-info corpo-action" ><ion-icon class="incone-action" name="color-fill-outline"></ion-icon></span>
                                <span class="btn btn-success corpo-action" ><ion-icon class="incone-action" name="bicycle-outline"></ion-icon></span>
                            </td>
                            <td>
                                <span onclick="Pedido.ajaxGetRequest('1')"  class="btn btn-outline-danger corpo-action" ><ion-icon class="incone-action" name="resize-outline"></ion-icon></span>
                            </td>
                        </tr>
                        
                    `);

                });


            },
            error: erro => {

                console.log(erro)
            }
        });

    }

    ajaxGetRequest(id) {

        // Visualizar somente um resultado via modal
        this.modal.style.display = 'flex';
        this.modal.appendChild(this.Modal('02'))
        this.closerModal()


        // console.log(id)

        // $.ajax({
        //     type: "POST",
        //     url: "url",
        //     data: "data",
        //     dataType: "JSON",
        //     success: function (response) {

        //     },
        //     error: erro=>{

        //     }
        // });

    }

    Modal(numero) {


        var div = document.createElement('div')

        div.className = 'containerModalViewShowRequest';

        div.innerHTML = `
       
            <ion-icon id="closerModal" name="close-outline"></ion-icon>
            <div class="bodyScroll">
                <div class="bodyRequest">

                    <div class="headerTitleRequest">
                            Pedido #${numero}                
                    </div>
                    <div class="mainDice">
                        
                    <div class="containerDice"> 
                            <div><span class="titleDice">Nome:</span> <span>Pedro Henrique</span> </div>
                            <div><span class="titleDice" >Whatsapp:</span><span>(86) 9 95747604</span></div>
                            <div><span class="titleDice">Pagamentos:</span><span>Cartão</span></div>
                    </div>
                    <div class="containerDice">
                        <div><span class="titleDice">Endereço:</span><span>Rua, sete de setembro</span></div>
                        <div><span class="titleDice">Bairro:</span><span>PIO XII</span></div>
                    </div>

                    </div>

                        <div class="bodytable">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Produtos</th>
                                        <th>Quant.</th>
                                        <th>Complemento</th>
                                        <th>Preço</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyDice">
                                    <tr>
                                        <td>Açaí</td>
                                        <td>1</td>
                                        <td>
                                            <div><li>Creme de Orion</li></div>
                                            <div><li>amendoin</li></div>
                                            <div><li>disquete</li></div>
                                        </td>
                                        <td>R$: 14,00</td>
                                    </tr>
                                </tbody>
                                
                            </table>
                    </div>
                    <div class="totalRequest">
                        <span class="titleTotal">Total:</span> <span>$R 30,00</span>
                    </div>
                    <div class="bodybtnprintout">
                        <input class="btn btn-light" type="button" value="Imprimir Pedido">
                    </div>
                </div>

        </div>

            <div class="bodyOptions">
                <div class="btn btn-danger bodiIcons"><ion-icon class="incone-action" name="close-circle-outline"></ion-icon>Pedido Cancelado</div>
                <div class="btn btn-primary bodiIcons"><ion-icon  class="incone-action" name="checkmark-circle-outline"></ion-icon>Pedido a ceito</div>
            </div>

        
 
        
        `

        return div;


    }

    closerModal() {

        document.getElementById('closerModal').addEventListener('click', () => {

            this.modal.innerHTML = "";
            this.modal.style.display = "none";

        })
    }

}