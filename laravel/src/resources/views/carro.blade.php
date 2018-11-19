<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <title>Lista de Carros</title>
    
</head>
<body>

    <!--barra de navegação principal-->
    

    <!--tabela de garagens-->
    <table class="table table-striped" id="tabelaCarros">
        <tr>
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Marca</th>
                <th>Ano Fab.</th>
                <th>Ano Mod.</th>
                <th>KM</th>
                <th style="width: 20%">Opcionais</th>
                <th>Preço</th>
                <th>Garagem</th>
                <th>Opções</th>
            </thead>
        </tr>
    </table>

    <!--botão para inserir novo carro-->
    <a href="" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#cadastrarForm">Cadastrar novo carro</a>

    <!--modal para inserir novo carro-->
    <div class="modal fade" id="cadastrarForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

          <div class="modal-dialog" role="document">

                <div class="modal-content">

                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Cadastrar Carro</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body mx-3">

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="nomeCarro">Nome</label>
                            <i class="fa fa-user prefix grey-text"></i>
                            <input type="text" id="nomeCarro" class="form-control validate">
                        </div>

                        <div class="md-form mb-4">
                            <label data-error="wrong" data-success="right" for="marcaCarro">Marca</label>
                            <i class="fa fa-phone prefix grey-text"></i>
                            <select class="form-control form-control-sm" id="marcaCarro" name="marcaCarro">
                            </select>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="anoFabNovo">Ano Fab.</label>
                                <input type="text" class="form-control" id="anoFabNovo" name="anoFabNovo">
                            </div class="col">
                            <div class="col">
                                <label for="anoModNovo">Ano Mod.</label>
                                <input type="text" class="form-control" id="anoModNovo" name="anoModNovo">
                            </div>
                        </div><br>
                        <div class="form-row">
                            <div class="col">
                                <label for="kmNovo"> KM </label>
                                <input type="text" class="form-control" id="kmNovo" name="kmNovo">
                            </div>
                            <div class="col">
                                <label for="precoNovo">Preço R$</label>
                                <input type="text" class="form-control" id="precoNovo" name="precoNovo">
                            </div>
                        </div>

                        <div class="md-form mb-4">
                            <label>Opcionais: </label><br>
                            <input type="checkbox" name="Ar Condicionado" value="Ar Condicionado">Ar Condicionado /
                            <input type="checkbox" name="Ar Quente" value="Ar Quente">Ar Quente / 
                            <input type="checkbox" name="Alarme" value="Alarme">Alarme /
                            <input type="checkbox" name="ABS" value="ABS">ABS /<br>
                            <input type="checkbox" name="Dir. Hidráulica" value="Dir. Hidráulica">Dir. Hidráulica /
                            <input type="checkbox" name="Vidros Elétricos" value="Vidros Elétricos">Vidros Elétricos /
                            <input type="checkbox" name="Rodas de Liga" value="Rodas de Liga">Rodas de Liga / <br>
                            <input type="checkbox" name="Sensor de estacionamento" value="Sensor de estacionamento">Sensor de estacionamento /
                            <input type="checkbox" name="Rádio" value="Rádio">Rádio / <br>
                            <input type="checkbox" name="Câmbio Automático" value="Cãmbio Automático>">Câmbio Automático<br>
                        </div>

                        <div class="md-form mb-4">
                            <label data-error="wrong" data-success="right" for="garagemCarro">Garagem</label>
                            <i class="fa fa-phone prefix grey-text"></i>
                            <select class="form-control form-control-sm" id="garagemCarro" name="garagemCarro">
                            </select>
                        </div>

                    </div><br>

                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-deep-orange" id='cadastrar' onclick='adicionarCarro()'>Cadastrar</button>
                    </div>

                </div>

         </div>

    </div>

    <!--modal para alterar carro-->
    <div class="modal fade" id="alterarForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

          <div class="modal-dialog" role="document">

                <div class="modal-content">

                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Alterar Carro</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body mx-3">
                        
                        <div class="md-form mb-5">
                            <label for="idCarroAltera">ID
                            <input type="text" readonly id="idCarroAltera" class="form-control validate">
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="nomeCarroAltera">Nome</label>
                            <i class="fa fa-user prefix grey-text"></i>
                            <input type="text" id="nomeCarroAltera" class="form-control validate">
                        </div>

                        <div class="md-form mb-4">
                            <label data-error="wrong" data-success="right" for="marcaCarroAltera">Marca</label>
                            <i class="fa fa-phone prefix grey-text"></i>
                            <select class="form-control form-control-sm" id="marcaCarroAltera" name="marcaCarro">
                            </select>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="anoFabAltera">Ano Fab.</label>
                                <input type="text" class="form-control" id="anoFabAltera" name="anoFabAltera">
                            </div class="col">
                            <div class="col">
                                <label for="anoModAltera">Ano Mod.</label>
                                <input type="text" class="form-control" id="anoModAltera" name="anoFabAltera">
                            </div>
                        </div><br>
                        <div class="form-row">
                            <div class="col">
                                <label for="kmAltera"> KM </label>
                                <input type="text" class="form-control" id="kmAltera" name="kmAltera">
                            </div>
                            <div class="col">
                                <label for="precoAltera">Preço R$</label>
                                <input type="text" class="form-control" id="precoAltera" name="precoAltera">
                            </div>
                        </div>

                        <div class="md-form mb-4">
                            <label>Opcionais: </label><br>
                            <input type="checkbox" id="arCond" name="Ar Condicionado" value="Ar Condicionado">Ar Condicionado /
                            <input type="checkbox" id="arQuente" name="Ar Quente" value="Ar Quente">Ar Quente / 
                            <input type="checkbox" id="alarme" name="Alarme" value="Alarme">Alarme /
                            <input type="checkbox" id="abs" name="ABS" value="ABS">ABS /<br>
                            <input type="checkbox" id="dirHid" name="Dir. Hidráulica" value="Dir. Hidráulica">Dir. Hidráulica /
                            <input type="checkbox" id="vidEle" name="Vidros Elétricos" value="Vidros Elétricos">Vidros Elétricos /
                            <input type="checkbox" id="rodLiga" name="Rodas de Liga" value="Rodas de Liga">Rodas de Liga / <br>
                            <input type="checkbox" id="sensEsta" name="Sensor de estacionamento" value="Sensor de estacionamento">Sensor de estacionamento /
                            <input type="checkbox" id="radio" name="Rádio" value="Rádio">Rádio / <br>
                            <input type="checkbox" id="cambAutom" name="Câmbio Automático" value="Cãmbio Automático>">Câmbio Automático<br>
                        </div>

                        <div class="md-form mb-4">
                            <label data-error="wrong" data-success="right" for="garagemCarroAltera">Garagem</label>
                            <i class="fa fa-phone prefix grey-text"></i>
                            <select class="form-control form-control-sm" id="garagemCarroAltera" name="garagemCarroAltera">
                            </select>
                        </div>

                    </div><br>

                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-deep-orange" id='alterar' onclick='alterarCarro()'>Alterar</button>
                    </div>

                </div>

         </div>

    </div>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="js/carro.js"></script>
</html>