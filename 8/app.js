$('.window').click(function(e) {
    e.preventDefault();
    $('.popup-bg').fadeIn(500);
    $('html').addClass('no-scroll');
});

$('.close-popup').click(function() {
    $('.popup-bg').fadeOut(500);
    $('html').removeClass('no-scroll');
});


$(function(){
    $(".ajaxForm").submit(function(e){
        e.preventDefault();
        var href = $(this).attr("action");
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "https://api.slapform.com/anleen27@gmail.com",
            data: $(this).serialize(),
            success: function(response){
                if(response.status == "success"){
                    alert("Спасибо, ваша заявка успешно отправлена!");
                } else{
                    alert("Возникла ошибка: " + response.message);
                }
            }
        });
    });
});
