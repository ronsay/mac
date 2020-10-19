function resizeMain(){
    $('main').css('min-height', $('#home-carousel .carousel-item').first().height()+'px');
}

$(document).ready(function(){
    resizeMain();

    $(window).on('resize', function (){
        resizeMain();
    });
});