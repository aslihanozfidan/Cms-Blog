
$(function() {
    $('.layer').hover(function(){ //Open on hover
            $('.layer-text').animate({'margin-top':'-150px'},1000);
        },
        function(){ //Close when not hovered
            $('.layer-text').animate({'margin-top':'340px'},1000);
        });
});