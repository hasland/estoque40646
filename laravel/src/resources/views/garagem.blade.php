<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <title>Lista de Garagens</title>
    
</head>
<body>
    <div class="container" id='containerPrincipal'>

        <h1 class='text-center shadow p-3 mb-5 bg-white rounded'>Garagens</h1>


        <!--tabela de garagens-->
        <table class="table table-striped" id="tabelaGaragens">
            <tr>
                <thead>
                    <th>ID da Garagem</th>
                    <th>Nome da Garagem</th>
                    <th>Telefone da Garagem</th>
                    <th>Opções</th>
                </thead>
            </tr>
        </table>

        <!--botão para inserir nova garagem-->
        <a href="" class="btn btn-lg btn-dark" data-toggle="modal" data-target="#cadastrarForm">Cadastrar nova garagem</a>

        <!--modal para inserir nova garagem-->
        <div class="modal fade" id="cadastrarForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

            <div class="modal-dialog" role="document">

                    <div class="modal-content">

                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">Cadastrar Garagem</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body mx-3">

                            <div class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="nomeGaragem">Nome</label>
                                <i class="fa fa-user prefix grey-text"></i>
                                <input type="text" id="nomeGaragem" class="form-control validate">
                            </div><br>

                            <div class="md-form mb-4">
                                <label data-error="wrong" data-success="right" for="telefoneGaragem">Telefone</label>
                                <i class="fa fa-phone prefix grey-text"></i>
                                <input type="text" id="telefoneGaragem" class="form-control validate">
                            </div>
            
                        </div>

                        <div class="modal-footer d-flex justify-content-center">
                            <button class="btn btn-deep-orange" id='cadastrar' onclick='adicionarGaragem()'>Cadastrar</button>
                        </div>

                    </div>

            </div>

        </div>

        <!--modal para alterar garagem-->
        <div class="modal fade" id="alterarForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">

                    <div class="modal-content">

                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">Alterar Garagem</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body mx-3">
                            <div class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="idGaragemAltera">ID</label>
                                <i class="fa fa-hashtag prefix grey-text"></i>
                                <input type="text" id="idGaragemAltera" readonly class="form-control validate">
                            </div><br>

                            <div class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="nomeGaragemAltera">Nome</label>
                                <i class="fa fa-user prefix grey-text"></i>
                                <input type="text" id="nomeGaragemAltera" class="form-control validate">
                            </div><br>

                            <div class="md-form mb-4">
                                <label data-error="wrong" data-success="right" for="telefoneGaragemAltera">Telefone</label>
                                <i class="fa fa-phone prefix grey-text"></i>
                                <input type="text" id="telefoneGaragemAltera" class="form-control validate">
                            </div>
                        </div>

                        <div class="modal-footer d-flex justify-content-center">
                            <button class="btn btn-deep-orange" id='alterar'>Alterar Dados</button>
                        </div>

                    </div>
                </div>

        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="js/garagem.js"></script>
<script src="js/menu.js"></script>
</html>