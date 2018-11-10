<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Lista de Garagens</title>
    
</head>
<body>

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
    <a href="" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#cadastrarForm">Cadastrar nova garagem</a>

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
</body>


<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="js/garagem.js"></script>
</html>