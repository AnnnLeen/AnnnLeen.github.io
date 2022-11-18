$(document).ready(function() {
$(".window").click(function(e) {
    e.preventDefault();
    $(".popup-bg").fadeIn(500);
    $("html").addClass("no-scroll");
});

$(".close-popup").click(function() {
    $(".popup-bg").fadeOut(500);
    $("html").removeClass("no-scroll");
});


$(function(){
    $(".ajaxForm").submit(function(e){
        e.preventDefault();
        var href = $(this).attr("action");
        $.ajax({
            type: "POST",
            dataType: "json",
            url: href,
            data: $(this).serialize(),
            success: function(response){
                if(response.status == "success"){
                    alert("We received your submission, thank you!");
                }else{
                    alert("An error occured: " + response.message);
                }
            }
        });
    });
});

});

