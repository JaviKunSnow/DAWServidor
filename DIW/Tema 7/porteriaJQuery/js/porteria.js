
$(document).ready(function() {
    $("#balon").click(function() {
        $(this).animate({
            top: "-650px",
    }, "slow", function() {
            $(this).css("fill", "green");  
        });

    $(this).css("fill", "red");
    });
});

