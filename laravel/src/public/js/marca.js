$(document).ready(function(){
    buscaDados();
});

function buscaDados(){
    $.getJSON("http://localhost:41121/api/marca", function (data, status){
        var tabelaHtml = "";
        $.each(data, function(key, val){
            tabelaHtml+="<tr id='"+val.id+"'><td>"+val.id+"</td>"+
                        "<td>"+val.nome+"</td>"+
                        "<td> <a class='btn' id='BtnAlteraMarca' onclick='alterarMarca("+val.id+")')><i class='fa fa-edit'></i></a>"+
                        "<a class='btn' id='BtnExcluiMarca' onclick='deletarMarca("+val.id+")')><i class='fa fa-trash'></i></a>"+
                        "</td></tr>";
        });
        //limpa tabela de garagens
        $("#tabelaMarcas td").parent().remove();
        //preenche a tabela de garagens
        $("#tabelaMarcas").append(tabelaHtml);
    });
};

function adicionarMarca(){
    $.ajax({
        type: "POST",
        url: "http://localhost:41121/api/marca",
        data: 'nome='+$("#nomeMarca").val()
    }).then(res=>{
        $("#cadastrarForm").modal("hide");
        buscaDados();

    });
};

function deletarMarca(id){
    $.ajax({
        type: "DELETE",
        url: "http://localhost:41121/api/marca/"+id,
    }).then(res=>{
        buscaDados();
    });
};

function alterarMarca(id){
    $.getJSON("http://localhost:41121/api/marca/"+id, function(data, status) {
        var marcaAltera = [];
        $.each(data, function(key, val) {
            marcaAltera.push(val);
        });
        $("#alterarForm").modal("show");
        $("#idMarcaAltera").val(marcaAltera[0]);
        $("#nomeMarcaAltera").val(marcaAltera[3]);
    });
    $("#AlterarModalBtn").one('click', function(){
        alteraMarcaBtn(id);
    });
};

function alteraMarcaBtn(id){
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": "http://localhost:41121/api/marca/"+id,
        "method": "PUT",
        "headers": {
          "Content-Type": "application/x-www-form-urlencoded",
          "cache-control": "no-cache",
        },
        "data": {
          "nome": $("#nomeMarcaAltera").val()
        }
      }
      
      $.ajax(settings).done(function (response) {
        console.log(response);
        $("#alterarForm").modal("hide");
        buscaDados();
      });
    // $.ajax({
    //     type: "PUT",
    //     url: "http://localhost:41121/api/marca/"+id,
    //     data: 'nome='+$("#nomeMarcaAltera").val()
    // }).then(res=>{
    //     $("#idMarcaAltera").val("");
    //     $("#nomeMarcaAltera").val("");
    //     //$("#alterarForm").modal("hide");
    //     buscaDados();
    // });
}