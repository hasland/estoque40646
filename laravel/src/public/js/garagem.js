$(document).ready(function(){
    buscaDados();

    function buscaDados(){
        $.getJSON("http://localhost:41121/garagem", function (data, status){
            var dadosGaragem = "";
            $.each(data, function(key, val){
                dadosGaragem+=val;
            });
            console.log(dadosGaragem);
        });
        console.log('abc');
    };
});