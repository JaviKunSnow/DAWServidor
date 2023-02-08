$(document).ready(function(){
    $("#logo2").hide();
    $("#item1").click(function() {
        $("#listaSlide").slideToggle("slow");
    })
    
    $("#logos").mouseenter(function() {
        $("#logo1").hide();
        $("#logo2").show();
    })

    $("#logos").mouseleave(function() {
        $("#logo2").hide();
        $("#logo1").show();
    })

    $("#boton").click(function() {
        alert("Bienvenido " + $("#nombre").val() +" " + $("#apellidos").val() + ", tus estudios actuales son: " + $("#estudios").val());
    })

    $("#idPause").hide();
    $("#idSonidoFill").hide();

    $("#idPause").click(function() {
        $("#idPause").hide();
        $("#idRestart").show();
    })

    $("#idRestart").click(function() {
        $("#idPause").show();
        $("#idRestart").hide();
    })

    $("#idSonidoMute").click(function() {
        $("#idSonidoMute").hide();
        $("#idSonidoFill").show();
    })

    $("#idSonidoFill").click(function() {
        $("#idSonidoMute").show();
        $("#idSonidoFill").hide();
    })
});


