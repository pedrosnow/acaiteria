class ControllerProdutos {

    constructor() {

        this.corpoAlerta = document.getElementsByClassName('corpo-alerta')
        this.modal = document.getElementById('modal')
        this.formProdutos = document.getElementById('formProdutos')
        this.btnChackComplemento = document.getElementById('complemento')
        this.name = document.getElementById('nome_produto');
        this.square = document.getElementById('preco');
        this.complement = document.getElementById('complemento');
        this.tbody = document.getElementById('tbody')
        this.file = document.getElementById('file');
        this.imgPreview = document.getElementById('imgprev')
        this.Complemento = document.getElementById('complemento')
        this.qtd_complemento = document.getElementById('qtd_complemento')

        this.btnAddProducts()
        this.chackboxComplemento()
        this.showAllProductsregistered()
        this.chackeComplemento()
    }

    chackeComplemento() {
        this.Complemento.addEventListener('click', () => {
            if (this.Complemento.checked == false) {
                this.qtd_complemento.disabled = true
            } else {
                this.qtd_complemento.disabled = false
            }
        })
    }

    btnAddProducts() {

        this.formProdutos.addEventListener('submit', (e) => {

            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".sub-campos-progress").css('display', 'block');

            let formData = new FormData(this.formProdutos);

            $.ajax({
                xhr: function () {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (event) {
                        if (event.lengthComputable) {
                            var percentComplete = event.loaded / event.total;
                            percentComplete = parseInt(percentComplete * 100)

                            document.getElementById("progressbar").style.width = percentComplete + '%';
                            document.getElementById("progresIndication").innerHTML = percentComplete + '%'

                            if (percentComplete == "100") {

                                $(".sub-campos-progress").css('display', 'none');
                                document.getElementById("progressbar").style.width = '0%';

                            }
                        }
                    }, false)
                    return xhr;
                },
                type: 'POST',
                url: 'produtos/store',
                data: formData,
                contentType: false,
                processData: false,
                success: dados => {

                    this.name.value = ''
                    this.square.value = ''
                    this.complement.checked = false
                    this.sucesso('Salvo com sucesso')
                    this.showAllProductsregistered()
                    this.file.src = '';

                },
                error: erro => {

                    this.erro('ERRO: <strong> ' + erro.status + '</strong> Impossivel cadastrar produto', 'erro')

                    console.log(erro)

                }
            });


        })
    }

    showAllProductsregistered() {

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "GET",
            url: "produtos/showAll",
            dataType: "JSON",
            success: dados => {

                this.tbody.innerHTML = '';

                dados.forEach(element => {


                    $(this.tbody).append(
                        `
                        <tr>
                        <td><img src="./public/${element['img']}" class="img-produto-cadastrado"></td>
                        <td>${element['produto']}</td>
                        <td>${element['preco']}</td>
                        <td>${element['volume']}</td>
                        <td>${element['quantidade_complemento']}</td>
                        <td>${element['complemento']}</td>
                        <td>
                            <span onclick="Produto.delete(${element['id_produto']})" class="btn btn-outline-danger corpo-action" ><ion-icon class="incone-action" name="trash-outline"></ion-icon></span>
                        </td>
                        </tr>
                
                        `
                    );

                });



            }, error: erro => {

                console.log(erro)

            }
        });

    }


    chackboxComplemento() {

        this.btnChackComplemento.addEventListener('click', () => {

            switch (this.btnChackComplemento.checked) {
                case true:
                    this.btnChackComplemento.value = '1'
                    break;
                default:
                    this.btnChackComplemento.value = '0'
                    break;
            }
        })

    }



    delete(id) {

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "produtos/deletar",
            data: {
                id: id
            },
            dataType: "JSON",
            beforeSend: send => {

                this.modal.style.display = "flex"
                var img = document.createElement('img')
                img.src = 'img/loading.gif'
                this.modal.appendChild(img)
            },
            complete: completo => {

                this.modal.style.display = "none"
                this.modal.innerHTML = ''
            },
            success: dados => {

                console.log(dados)

                this.sucesso('Produto deletado com sucesso')
                this.showAllProductsregistered();
            }
            , error: erro => {

                console.log(erro)
            }
        });


    }



    sucesso(mensagem) {

        $(".corpo-alerta").append(`<div class="alert alert-success">${mensagem}</div>`);
    }


    erro(mensagem) {

        $("#alerta-corpo").html(
            `
            <div class="erro hide">
            <span class="fas fas fa-times-circle"></span>
            <span class="msg">${mensagem}</span>
                <div class="close-btn">
                    <span class="fas fa-times"></span>
                </div>
            </div>
            `
        );

        $('#alerta-corpo').css({ display: 'flex' });

        setTimeout(function () {
            $('.erro').addClass("show");
            $('.erro').removeClass("hide");
            $('.erro').addClass("showerro");
            setTimeout(function () {
                $('.erro').removeClass("show");
                $('.erro').addClass("hide");
            }, 5000);
        }, 1000);

        $(".close-btn").click(function (e) {

            $('.erro').removeClass("show");
            $('.erro').addClass("hide");

        });

    }




}