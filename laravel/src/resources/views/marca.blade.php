<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Lista de Marcas</title>
    
</head>
<body>

    <!--barra de navegação principal-->
    

    <!--tabela de garagens-->
    <table class="table table-striped" id="tabelaMarcas">
        <tr>
            <thead>
                <th>ID da Marca</th>
                <th>Nome da Marca</th>
                <th>Opções</th>
            </thead>
        </tr>
    </table>

    <!--botão para inserir nova marca-->
    <a href="" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#cadastrarForm">Cadastrar nova marca</a>

    <!--modal para inserir nova marca-->
    <div class="modal fade" id="cadastrarForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">

                <div class="modal-content">

                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Cadastrar Marca</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body mx-3">

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="nomeMarca">Nome</label>
                            <i class="fa fa-user prefix grey-text"></i>
                            <input type="text" id="nomeMarca" class="form-control validate">
                        </div><br>
                        
                    </div>

                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-deep-orange" id='cadastrar' onclick='adicionarMarca()'>Cadastrar</button>
                    </div>

                </div>

            </div>
    </div>

    <!--modal para alterar marca-->
    <div class="modal fade" id="alterarForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">

                <div class="modal-content">

                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Alterar Marca</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="idMarcaAltera">ID</label>
                            <i class="fa fa-hashtag prefix grey-text"></i>
                            <input type="text" id="idMarcaAltera" readonly class="form-control validate">
                        </div><br>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="nomeMarcaAltera">Nome</label>
                            <i class="fa fa-user prefix grey-text"></i>
                            <input type="text" id="nomeMarcaAltera" class="form-control validate">
                        </div><br>
                        
                    </div>

                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-deep-orange" id='alterar'>Alterar Dados</button>
                    </div>

                </div>
            </div>

    </div>
</body>


<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="js/marca.js"></script>
</html>