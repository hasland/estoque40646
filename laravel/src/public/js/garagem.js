$(document).ready(function(){
    buscaDados();
});

function buscaDados(){
    $.getJSON("http://localhost:41121/api/garagem", function (data, status){
        var tabelaHtml = "";
        $.each(data, function(key, val){
            tabelaHtml+="<tr id='"+val.id+"'><td>"+val.id+"</td>"+
                        "<td>"+val.nome+"</td>"+
                        "<td>"+val.telefone+"</td></tr>";
        });
        $("#tabelaGaragens").append(tabelaHtml);
    });
};

function adicionarGaragem(){
    $.ajax({
        type: "POST",
        url: "http://localhost:41121/api/garagem",
        data: 'nome='+$("#nomeGaragem").val()+'&telefone='+$("#telefoneGaragem").val()
    })
}

/*
$("#cadastrar").click(function() {
    //enviado
    $.ajax({
      type: "POST",
      url: "http://serene-chamber-53332.herokuapp.com/api/pessoa",
      data: '{"name":"' +$("#nomePessoa").val()+ '", "mail":"' +$("#emailPessoa").val()+ '", "phone":"' +$("#telefonePessoa").val()+ '"}',
      success: function(data) {
      },
      contentType: "application/json",
      dataType: "json"
    }).then(res => {
      $("#nomePessoa").val("");
      $("#emailPessoa").val("");
      $("#telefonePessoa").val("");
      $("#cadastrarForm").modal("hide");
      $("#buscar").click();
    });
  });
});








/*/