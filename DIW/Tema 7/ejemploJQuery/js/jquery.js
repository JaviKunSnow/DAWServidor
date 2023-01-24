$("#1").click(function(){
    $(this).hide(2000);
});

$("#2").dblclick(function(){
    $(this).hide();
});

$("#3").mouseenter(function(){
    $(this).css("background-color", "blue");
});

$("#3").mouseleave(function(){
    $(this).css("background-color", "green");
});

$(window).resize(function(){
    $("#4").css("background-color", "yellow");
})

$(document).keypress(function() {
    $("#5").css("background-color", "yellow");
})

$(document).ready(function(){
    $("img").hide();
})

$("button").click(function(){
    $("img").show(5000);
})