$(document).ready(function(){
    $(function() {
        return $(".carousel").on("slide.bs.carousel", function(ev) {
            if($(ev.relatedTarget).children("img").length){
                var lazy = $(ev.relatedTarget).find("img[data-src]");
                lazy.attr("src", lazy.data('src'));
                lazy.removeAttr("data-src");
            }
        });
    });
});