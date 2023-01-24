$(document).ready(function(){
    $("#img3").hide();
})

$("#img1").dblclick(function(){
    $(this).hide(2000);
});

$("section > p").click(function(){
    $(this).hide(3000);
});

$("#img2").click(function(){
    $(this).fadeOut(3000);
});

$("#button1").click(function(){
    $("#img3").show();
});

$(".principal").click(function(){
    $(".lista").slideToggle();
})