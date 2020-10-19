var prevWinWidth=-1;
var smWith=992;

function manageNavbar(){
    if ($(window).width() < smWith && (prevWinWidth >= smWith || prevWinWidth == -1)) {
        $('.navbar .dropdown-menu a').unbind();
        $('.navbar .dropdown-menu a').click(function(e){
            e.preventDefault();
            if($(this).next('.submenu').length){
                if ($(this).next('.submenu').is(':visible')) {
                    $(this).next('.submenu').hide();
                } else {
                    $(this).next('.submenu').show();
                }
            }
            $('.navbar .dropdown').on('hide.bs.dropdown', function () {
                $(this).find('.submenu').hide();
            });
        });
    }else if ($(window).width() >= smWith && (prevWinWidth < smWith && prevWinWidth != -1)){
        $('.navbar .dropdown-menu a').unbind();
        $('.navbar .dropdown-menu a').hover(function(e){
            console.log('eee');
            e.preventDefault();
            if($(this).next('.submenu').length){
                $(this).next('.submenu').show();
            }
            $('.navbar .dropdown').on('hide.bs.dropdown', function () {
                $(this).find('.submenu').hide();
            });
        },function(e){
            e.preventDefault();
            if($(this).next('.submenu').length && $(this).next('.submenu:hover').length == 0){
                $(this).next('.submenu').hide();
            }
        });
    }
    prevWinWidth = $(window).width();
}

$(document).ready(function(){
    manageNavbar();

    $(window).on('resize', function (){
        manageNavbar();
    });
    
    $(document).on('click', '.dropdown-menu', function (e) {
      e.stopPropagation();
    });
    
    $(".tel").on("click", function(e) {
        e.preventDefault();
        location.href = "tel:"+$(this).text().replace("(","").replace(")","").replace(/ /g,"").replace("Tel:","");
    });

    $(".mail").on("click", function(e) {
        e.preventDefault();
        location.href = "mailto:"+$(this).text();
    });
});