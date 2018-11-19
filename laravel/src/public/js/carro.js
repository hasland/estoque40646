$.ajaxSetup({
    async: false
});


$(document).ready(function(){
    buscaDados();
});

function buscaDados(){
    $.getJSON("http://localhost:41121/api/carro", function (data, status){
        var tabelaHtml = "";
        $.each(data, function(key, val){
            tabelaHtml+="<tr id='"+val.id+"'><td>"+val.id+"</td>"+
                        "<td>"+val.nome+"</td>"+
                        "<td id='"+val.marca_id+"'>"+(getNomeMarca(val.marca_id))+"</td>"+
                        "<td>"+val.anoFabricacao+"</td>"+
                        "<td>"+val.anoModelo+"</td>"+
                        "<td>"+val.km+"</td>"+
                        "<td>"+val.opcionais+"</td>"+
                        "<td>R$"+val.preco+"</td>"+
                        "<td id='"+val.garagem_id+"'>"+getNomeGaragem(val.garagem_id)+"</td>"+
                        "<td> <a class='btn' id='BtnAlteraCarro' onclick='alterarCarro("+val.id+")')><i class='fa fa-edit'></i></a>"+
                        "<a class='btn' id='BtnExcluiCarro' onclick='deletarCarro("+val.id+")')><i class='fa fa-trash'></i></a>"+
                        "</td></tr>";
        });
        //limpa tabela de carros
        $("#tabelaCarros td").parent().remove();
        //preenche a tabela de garagens
        $("#tabelaCarros").append(tabelaHtml);
    });
}

function getNomeMarca(id){
    var nomeMarca ="";
    $.getJSON("http://localhost:41121/api/marca/"+id, function (data){
        nomeMarca =data.nome;
    });
    return nomeMarca;
}

function getNomeGaragem(id){
    var nomeGaragem="";
    $.getJSON("http://localhost:41121/api/garagem/"+id, function (data){
        nomeGaragem = data.nome;
    });
    return nomeGaragem;
}

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
}

function alterarCarro(id){
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

        if(carroAltera[8].includes("Dir. Hidráulica")){
            $("#dirHid").attr("checked",true);
        }
        if(carroAltera[8].includes("ABS")){
            $("#abs").attr("checked",true);
        }
        if(carroAltera[8].includes("Ar Condicionado")){
            $("#arCond").attr("checked",true);
        }
        if(carroAltera[8].includes("Ar Quente")){
            $("#arQuente").attr("checked",true);
        }
        if(carroAltera[8].includes("Alarme")){
            $("#alarme").attr("checked",true);
        }
        if(carroAltera[8].includes("Vidros Elétricos")){
            $("#vidEle").attr("checked",true);
        }
        if(carroAltera[8].includes("Rodas de Liga")){
            $("#rodLiga").attr("checked",true);
        }
        if(carroAltera[8].includes("Sensor de estacionamento")){
            $("#sensEsta").attr("checked",true);
        }
        if(carroAltera[8].includes("Rádio")){
            $("#radio").attr("checked",true);
        }
        if(carroAltera[8].includes("Câmbio Automático")){
            $("#cambAutom").attr("checked",true);
        }

        $.getJSON("http://localhost:41121/api/marca", function (data, status){
        var optMarca = "";
            $.each(data, function(key, val){
            optMarca += "<option id='marcaCarroAltera' name='marcaCarroAltera' value='"+val.id+"'>"+
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

        var idGaragemAltera = "garagemCarroAltera"+carroAltera[10];
        //console.log($("#"+idGaragemAltera).attr('id'));
        if("garagemCarroAltera"+carroAltera[10] == $("#"+idGaragemAltera).attr('id')){        
            $("#"+idGaragemAltera).attr("selected", true);
            console.log("entrou no buraco negro");
        }
        console.log(carroAltera);
    });
}