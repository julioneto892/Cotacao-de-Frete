<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotação</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .form-control {
            border-radius: 10px !important;
        }
        .form-floating {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        
        <div class="row" style="padding-top: 50px;">
            <div class="col-md-6">
                <form id="cadastroCotacao" method="POST">
                    <h4>Cadastro cotação de frete</h4>
                    <div class="form-floating" id="div-transportadora_id">
                        <select class="form-select form-control" aria-label="Transportadora" id="transportadora_id" name="transportadora_id">
                        </select>
                        <label for="transportadora_id">Transportadora</label>
                    </div>
                    <div class="form-floating" id="div-uf">
                        <select class="form-select form-control" aria-label="uf" id="uf" name="uf">
                            <option value="">Selecione</option>
                            <option value="AC">AC</option>
                            <option value="AL">AL</option>
                            <option value="AM">AM</option>
                            <option value="AP">AP</option>
                            <option value="BA">BA</option>
                            <option value="CE">CE</option>
                            <option value="DF">DF</option>
                            <option value="ES">ES</option>
                            <option value="GO">GO</option>
                            <option value="MA">MA</option>
                            <option value="MG">MG</option>
                            <option value="MS">MS</option>
                            <option value="MT">MT</option>
                            <option value="PA">PA</option>
                            <option value="PB">PB</option>
                            <option value="PE">PE</option>
                            <option value="PI">PI</option>
                            <option value="PR">PR</option>
                            <option value="RJ">RJ</option>
                            <option value="RN">RN</option>
                            <option value="RS">RS</option>
                            <option value="RO">RO</option>
                            <option value="RR">RR</option>
                            <option value="SC">SC</option>
                            <option value="SE">SE</option>
                            <option value="SP">SP</option>
                            <option value="TO">TO</option>
                        </select>
                        <label for="uf">UF</label>
                    </div>
                    <div class="form-floating" id="div-percentual_cotacao">
                        <input type="text" class="form-control" id="percentual_cotacao" name="percentual_cotacao" placeholder="Percentual cotação %" maxlength="11">
                        <label for="percentual_cotacao">Percentual cotação %</label>
                    </div>
                    <div class="form-floating" id="div-valor_extra">
                        <input type="text" class="form-control" id="valor_extra" name="valor_extra" placeholder="Valor extra (R$)" maxlength="11">
                        <label for="valor_extra">Valor extra (R$)</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Salvar</button>
                </form>
            </div>
            <div class="col-md-6">
                <form id="calcularImposto" method="PUT">
                    <h4>Cotar frete</h4>
                    <div class="form-floating" id="div-frete-uf">
                        <select class="form-select form-control" id="frete-uf" aria-label="uf" name="uf">
                            <option value="">Selecione</option>
                            <option value="AC">AC</option>
                            <option value="AL">AL</option>
                            <option value="AM">AM</option>
                            <option value="AP">AP</option>
                            <option value="BA">BA</option>
                            <option value="CE">CE</option>
                            <option value="DF">DF</option>
                            <option value="ES">ES</option>
                            <option value="GO">GO</option>
                            <option value="MA">MA</option>
                            <option value="MG">MG</option>
                            <option value="MS">MS</option>
                            <option value="MT">MT</option>
                            <option value="PA">PA</option>
                            <option value="PB">PB</option>
                            <option value="PE">PE</option>
                            <option value="PI">PI</option>
                            <option value="PR">PR</option>
                            <option value="RJ">RJ</option>
                            <option value="RN">RN</option>
                            <option value="RS">RS</option>
                            <option value="RO">RO</option>
                            <option value="RR">RR</option>
                            <option value="SC">SC</option>
                            <option value="SE">SE</option>
                            <option value="SP">SP</option>
                            <option value="TO">TO</option>
                        </select>
                        <label for="frete-uf">UF</label>
                    </div>
                    <div class="form-floating" id="div-frete-valor_pedido">
                        <input type="text" class="form-control" id="frete-valor_pedido" name="valor_pedido" placeholder="Valor pedido (R$)">
                        <label for="frete-valor_pedido">Valor pedido (R$)</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Cotar</button>
                </form>
                <div id="listaMelhoresCotacoes"></div>
            </div>
            <div class="col-md-12" style="padding-top: 50px;" id="tabelaCotacoes">
            </div>
        </div>
    
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.8/jquery.mask.min.js" integrity="sha512-hAJgR+pK6+s492clbGlnrRnt2J1CJK6kZ82FZy08tm6XG2Xl/ex9oVZLE6Krz+W+Iv4Gsr8U2mGMdh0ckRH61Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        listaCortacao();
        $("#percentual_cotacao").mask("#0.00", {reverse: true});
        $("#valor_extra, #frete-valor_pedido").mask("#0.00", {reverse: true});
        // carregar lista de transportadoras
        $.ajax({
            url: "http://127.0.0.1:8000/api/listaTransportadoras",
            type: 'GET',
            dataType: 'json',
            success(data) {
                $("#transportadora_id").append("<option value=''>Selecione</option>");
                $(data).each(function(key, value) {
                    $("#transportadora_id").append("<option value='"+value.id+"' >"+value.nome+"</option>");
                });
                $("#transportadora_id").append("</optgroup>");
            }
        });
        
        // formulário Cadastro cotação de frete
        $(document).on('submit', '#cadastroCotacao', function(event) {
            event.preventDefault();
            $.ajax({
                url: "http://127.0.0.1:8000/api/cotacao",
                type: 'post',
                data: $(this).serialize(),
                dataType: "json",
                success(data) {
                    $(".form-control").removeClass("is-invalid");
                    $(".invalid-feedback").remove();

                    $("#transportadora_id").val("");
                    $("#uf").val("");
                    $("#percentual_cotacao").val("");
                    $("#valor_extra").val("");

                    $("#cadastroCotacao").append(`<div id="msg-sucesso" style="text-align: center;padding-top: 11px;color: #21c553;font-weight: bold;">${data.message}</div>`);
                    listaCortacao();
                    setTimeout(function() {
                        $("#msg-sucesso").remove();
                    }, 3000);
                },
                error(request) {
                    var erros = JSON.parse(request.responseText);
                    $(".form-control").removeClass("is-invalid");
                    $(".invalid-feedback").remove();
                    if(erros.errors) {
                        $.each(erros.errors, function(key, value) {
                            $("#"+key).removeClass("is-invalid");
                            $("#div-txt-validacao-"+key).remove();
                            $("#"+key).addClass("is-invalid");
                            $("#div-"+key).append(`<div id="div-txt-validacao-${key}" class="invalid-feedback">${value}</div>`);
                        });
                    } else {
                        $("#cadastroCotacao").append(`<div id="msg-erro" style="text-align: center;padding-top: 11px;color: red;font-weight: bold;">${erros.message}</div>`);
                        setTimeout(function() {
                            $("#msg-erro").remove();
                        }, 3000);
                    }
                }
            });
        });

        // formulário Cotar frete
        $(document).on('submit', '#calcularImposto', function(event) {
            event.preventDefault();
            $.ajax({
                url: "http://127.0.0.1:8000/api/cotacao",
                type: 'put',
                data: $(this).serialize(),
                dataType: "json",
                success(data) {
                    $(".form-control").removeClass("is-invalid");
                    $(".invalid-feedback").remove();
                    var html = `
                        <h6 style="padding-top: 20px;">Melhores Resultados:</h6>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Rank</th>
                                    <th scope="col">Transportadora</th>
                                    <th scope="col">Valor Cotação</th>
                                </tr>
                            </thead>
                            <tbody>`;
                        $.each(data, function(key, value) {
                            html += `
                                <tr>
                                    <th>${value.rank}</th>
                                    <td>${value.transportadora}</td>
                                    <td>${parseFloat(value.valor_cotacao).toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})}</td>
                                </tr>
                            `;
                        });
                        html += `
                            </tbody>
                        </table>`;
                    
                    $("#listaMelhoresCotacoes").html(html);
                }, error(request) {
                    var erros = JSON.parse(request.responseText);
                    console.log(erros);
                    $(".form-control").removeClass("is-invalid");
                    $(".invalid-feedback").remove();
                    $.each(erros.errors, function(key, value) {
                        $("#frete-"+key).removeClass("is-invalid");
                        $("#div-txt-validacao-"+key).remove();
                        $("#frete-"+key).addClass("is-invalid");
                        $("#div-frete-"+key).append(`<div id="div-txt-validacao-${key}" class="invalid-feedback">${value}</div>`);
                    });
                }
            });
        });


        function listaCortacao() {
            $.ajax({
                url: "http://127.0.0.1:8000/api/cotacao",
                type: 'get',
                dataType: "json",
                success(data) {
                    var html = `
                    <table class="table" id="listaCotacoes">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">UF</th>
                                <th scope="col">Percentual Frete</th>
                                <th scope="col">Valor Taxa</th>
                                <th scope="col">Transportadora</th>
                            </tr>
                        </thead>
                        <tbody>`;
                        $.each(data, function(key, value) {
                            html += `
                                <tr>
                                    <td>${value.id}</td>
                                    <td>${value.uf}</td>
                                    <td>${value.percentual_cotacao}%</td>
                                    <td>${parseFloat(value.valor_extra).toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})}</td>
                                    <td>${value.nomeTransportadora}</td>
                                </tr>
                            `;
                        });
                    html += `
                        </tbody>
                    </table>
                    `;
                    $("#tabelaCotacoes").html(html);
                }
            })
        }

    </script>
</body>
</html>