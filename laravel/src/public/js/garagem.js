$(document).ready(function(){
    buscaDados();
});

function buscaDados(){
    $.getJSON("http://localhost:41121/api/garagem", function (data, status){
        var tabelaHtml = "";
        $.each(data, function(key, val){
            tabelaHtml+="<tr id='"+val.id+"'><td>"+val.id+"</td>"+
                        "<td>"+val.nome+"</td>"+
                        "<td>"+val.telefone+"</td>"+
                        "<td> <a class='btn' id='BtnAlteraGaragem' onclick='alterarGaragem("+val.id+")')><i class='fa fa-edit'></i></a>"+
                        "<a class='btn' id='BtnExcluiGaragem' onclick='deletarGaragem("+val.id+")')><i class='fa fa-trash'></i></a>"+
                        "</td></tr>";
        });
        //limpa tabela de garagens
        $("#tabelaGaragens td").parent().remove();
        //preenche a tabela de garagens
        $("#tabelaGaragens").append(tabelaHtml);
    });
};

function adicionarGaragem(){
    $.ajax({
        type: "POST",
        url: "http://localhost:41121/api/garagem",
        data: 'nome='+$("#nomeGaragem").val()+'&telefone='+$("#telefoneGaragem").val()
    }).then(res=>{
        $("#cadastrarForm").modal("hide");
        buscaDados();

    });
};

function deletarGaragem(id){
    $.ajax({
        type: "DELETE",
        url: "http://localhost:41121/api/garagem/"+id,
    }).then(res=>{
        buscaDados();
    });
};

function alterarGaragem(id){
    $.getJSON("http://localhost:41121/api/garagem/"+id, function(data, status) {
        var garagemAltera = [];
        $.each(data, function(key, val) {
            garagemAltera.push(val);
        });
        $("#alterarForm").modal("show");
        $("#idGaragemAltera").val(garagemAltera[0]);
        $("#nomeGaragemAltera").val(garagemAltera[4]);
        $("#telefoneGaragemAltera").val(garagemAltera[3]);
    });
    $("#alterar").click(function(){
        console.log(garagemAltera);
        $.ajax({
            type: "PUT",
            url: "http://localhost:41121/api/garagem/"+id,
            data: 'nome='+$("#nomeGaragemAltera").val()+'&telefone='+$("#telefoneGaragemAltera").val()
        }).then(res=>{
            $("#alterarForm").modal("hide");
            buscaDados();
        });
    });
};
