$.ajaxSetup({
    async: false
});


$(document).ready(function(){
    $('.modal').on('hidden.bs.modal', function (e){
        $(this).removeData();
    });
    buscaDados();
});

function buscaDados(){

    $.getJSON("http://localhost:41121/api/carro", function (data, status){
        var tabelaHtml = "";
        $.each(data, function(key, val){
            var opcionais;
            if (val.opcionais==null){
                opcionais="";
            }else{
                opcionais = val.opcionais;
            };
            tabelaHtml+="<tr id='"+val.id+"'><td>"+val.id+"</td>"+
                        "<td>"+val.nome+"</td>"+
                        "<td id='"+val.marca_id+"'>"+(getNomeMarca(val.marca_id))+"</td>"+
                        "<td>"+val.anoFabricacao+"</td>"+
                        "<td>"+val.anoModelo+"</td>"+
                        "<td>"+val.km+"</td>"+
                        "<td>"+opcionais+"</td>"+
                        "<td>R$"+val.preco+"</td>"+
                        "<td id='"+val.garagem_id+"'>"+getNomeGaragem(val.garagem_id)+"</td>"+
                        "<td> <a class='btn' id='BtnAlteraCarro' onclick='alterarCarro("+val.id+")'><i class='fa fa-edit'></i></a>"+
                        "<a class='btn' id='BtnExcluiCarro' onclick='deletarCarro("+val.id+")'><i class='fa fa-trash'></i></a>"+
                        "</td></tr>";
        });
        //limpa tabela de carros
        $("#tabelaCarros td").parent().remove();
        //preenche a tabela de garagens
        $("#tabelaCarros").append(tabelaHtml);
    });
};

function getNomeMarca(id){
    var nomeMarca ="";
    $.getJSON("http://localhost:41121/api/marca/"+id, function (data){
        nomeMarca =data.nome;
    });
    return nomeMarca;
    
};

function getNomeGaragem(id){
    var nomeGaragem="";
    $.getJSON("http://localhost:41121/api/garagem/"+id, function (data){
        nomeGaragem = data.nome;
    });
    return nomeGaragem;
};

$("#cadastrarForm").on('shown.bs.modal', function (){
    $.getJSON("http://localhost:41121/api/marca", function (data, status){
        var optMarca = "";
            $.each(data, function(key, val){
            optMarca += "<option id='marcaNovoCarro' name='marcaNovoCarro' value='"+val.id+"'>"+
            val.nome+"</option>";
            });
        $("#marcaCarro").empty();
        $("#marcaCarro").append(optMarca);
    });
    $.getJSON("http://localhost:41121/api/garagem", function (data, status){
        var optGaragem = "";
            $.each(data, function(key, val){
            optGaragem += "<option id='garagemCarroNovo' name='garagemCarroNovo' value='"+val.id+"'>"+
            val.nome+"</option>";
            });
        $("#garagemCarro").empty();
        $("#garagemCarro").append(optGaragem);
    });
});

function adicionarCarro(){
    var opcionaisArray = document.querySelectorAll('input[type="checkbox"]:checked');
    var opcionaisMarcados = Array.prototype.map.call(opcionaisArray, function(el, i){
        return el.name;
    });
    $.ajax({
        type: "POST",
        url: "http://localhost:41121/api/carro",
        data: 'nome='+$("#nomeCarro").val()+
              '&anoFabricacao='+$("#anoFabNovo").val()+
              '&anoModelo='+$("#anoModNovo").val()+
              '&km='+$("#kmNovo").val()+
              '&opcionais='+opcionaisMarcados+
              '&garagem_id='+$("#garagemCarro").val()+
              '&marca_id='+$("#marcaCarro").val()+
              '&preco='+$("#precoNovo").val()
    }).then(res=>{
        $("#cadastrarForm").modal("hide");
        buscaDados();

    });
};


function alterarCarro(id){
    /*------------------------------------------------------------------/
    / PREENCHER MODAL COM OS DADOS ATUAIS DO CARRO PARA ALTERAR DEPOIS  /
    /------------------------------------------------------------------*/

    $.getJSON("http://localhost:41121/api/carro/"+id, function (data, status){
        var carroAltera = [];
        $.each(data, function(key, val) {
            carroAltera.push(val);
        });
        $("#alterarForm").modal("show");
        $("#idCarroAltera").val(carroAltera[0]);
        $("#nomeCarroAltera").val(carroAltera[3]);
        $("#anoFabAltera").val(carroAltera[4]);
        $("#anoModAltera").val(carroAltera[5]);
        $("#precoAltera").val(carroAltera[6]);
        $("#kmAltera").val(carroAltera[7]);

        if(carroAltera[8]!=null){
            if(carroAltera[8].includes("Dir. Hidráulica")){
                $("#dirHid").attr("checked",true);
            }else{
                $("#dirHid").attr("checked",false);
            };

            if(carroAltera[8].includes("ABS")){
                $("#abs").attr("checked",true);
            }else{
                $("#abs").attr("checked",false);
            };

            if(carroAltera[8].includes("Ar Condicionado")){
                $("#arCond").attr("checked",true);
            }else{
                $("#arCond").attr("checked",false);
            };

            if(carroAltera[8].includes("Ar Quente")){
                $("#arQuente").attr("checked",true);
            }else{
                $("#arQuente").attr("checked",false);
            };

            if(carroAltera[8].includes("Alarme")){
                $("#alarme").attr("checked",true);
            }else{
                $("#alarme").attr("checked",false);
            };

            if(carroAltera[8].includes("Vidros Elétricos")){
                $("#vidEle").attr("checked",true);
            }else{
                $("#vidEle").attr("checked",false);
            };

            if(carroAltera[8].includes("Rodas de Liga")){
                $("#rodLiga").attr("checked",true);
            }else{
                $("#rodLiga").attr("checked",false);
            };

            if(carroAltera[8].includes("Sensor de estacionamento")){
                $("#sensEsta").attr("checked",true);
            }else{
                $("#sensEsta").attr("checked",false);
            };

            if(carroAltera[8].includes("Rádio")){
                $("#radio").attr("checked",true);
            }else{
                $("#radio").attr("checked",false);
            };

            if(carroAltera[8].includes("Câmbio Automático")){
                $("#cambAutom").attr("checked",true);
            }else{
                $("#cambAutom").attr("checked",false);
            };
        }else{
            $('input:checkbox').removeAttr('checked');
        };

        $.getJSON("http://localhost:41121/api/marca", function (data, status){
        var optMarca = "";
            $.each(data, function(key, val){
            optMarca += "<option id='marcaCarroAltera"+val.id+"' name='marcaCarroAltera' value='"+val.id+"'>"+
            val.nome+"</option>";
            });
        $("#marcaCarroAltera").empty();
        $("#marcaCarroAltera").append(optMarca);
        });

        $.getJSON("http://localhost:41121/api/garagem", function (data, status){
            var optGaragem = "";
                $.each(data, function(key, val){
                optGaragem += "<option id='garagemCarroAltera"+val.id+"' name='garagemCarroAltera' value='"+val.id+"'>"+
                val.nome+"</option>";
                });
            $("#garagemCarroAltera").empty();
            $("#garagemCarroAltera").append(optGaragem);
        });

        // DEIXA PRÉ SELECIONADA A GARAGEM ATUAL
        var idGaragemAltera = "garagemCarroAltera"+carroAltera[10];
        if("garagemCarroAltera"+carroAltera[10] == $("#"+idGaragemAltera).attr('id')){        
            $("#"+idGaragemAltera).attr("selected", true);
        };

        // DEIXA PRÉ SELECIONADA A MARCA ATUAL
        var idMarcaAltera = "marcaCarroAltera"+carroAltera[9];
        if("marcaCarroAltera"+carroAltera[9] == $("#"+idMarcaAltera).attr('id')){        
            $("#"+idMarcaAltera).attr("selected", true);
        };
        // console.log(carroAltera);
    });

    $("#alterar").one('click', function(){
        var opcionaisArray = document.querySelectorAll('input[type="checkbox"]:checked');
        var opcionaisMarcados = Array.prototype.map.call(opcionaisArray, function(el, i){
            return el.name;
        });
        console.log(opcionaisMarcados);
        $.ajax({
            type: "PUT",
            url: "http://localhost:41121/api/carro/"+id,
            data: 'nome='+$("#nomeCarroAltera").val()+
            '&anoFabricacao='+$("#anoFabAltera").val()+
            '&anoModelo='+$("#anoModAltera").val()+
            '&km='+$("#kmAltera").val()+
            '&opcionais='+opcionaisMarcados+
            '&garagem_id='+$("#garagemCarroAltera").val()+
            '&marca_id='+$("#marcaCarroAltera").val()+
            '&preco='+$("#precoAltera").val()
        }).then(res=>{
            $("#alterarForm").modal("hide");
            buscaDados();
        });
    });
}

function deletarCarro(id){
    $.ajax({
        type: "DELETE",
        url: "http://localhost:41121/api/carro/"+id,
    }).then(res=>{
        buscaDados();
    });
};