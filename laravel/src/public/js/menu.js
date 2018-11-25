var menu = 
    '<nav class="navbar navbar-expand-lg navbar-light bg-light">'+
        '<a class="navbar-brand" href="http://localhost:41121/inicio">Início</a>'+
        '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">'+
            '<span class="navbar-toggler-icon"></span>'+
        '</button>'+
       '<div class="collapse navbar-collapse" id="navbarNav">'+
            '<ul class="navbar-nav justify-content-center">'+
                '<li class="nav-item">'+
                    '<a class="nav-link" href="http://localhost:41121/marca">Marca</a>'+
                '</li>'+
                '<li class="nav-item">'+
                    '<a class="nav-link" href="http://localhost:41121/garagem">Garagem</a>'+
                '</li>'+
                '<li class="nav-item">'+
                    '<a class="nav-link" href="http://localhost:41121/carro">Carro</a>'+
                '</li>'+
            '</ul>'+
        '</div>'+
    '</nav><br>';
$("#containerPrincipal").prepend(menu);