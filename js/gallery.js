    $(document).ready(function() {
        $(function() {
            return $(".carousel-gallery").on("slide.bs.carousel", function(ev) {
                if($(ev.relatedTarget).children("img").length){
                    var lazy = $(ev.relatedTarget).find("img[data-src]");
                    lazy.attr("src", lazy.data('src'));
                    lazy.removeAttr("data-src");
                }
            });
        });
        
        $('.carousel-gallery').each(function() {
            $(this).find(".carousel-indicators").slick({
                infinite: false,
                slidesToShow: parseInt($(this).attr("nb-thumb"),10),
                slidesToScroll: 1
            }); 
        });
      
        $('.carousel-gallery .carousel').on('slide.bs.carousel', function () {
            var galleryCarousel = $(this).closest('.carousel-gallery');
            if($(this).hasClass('gallery-carousel')){
                galleryCarousel.find('.modal-gallery-carousel').removeClass('slide');
            }else{
                galleryCarousel.find('.gallery-carousel').removeClass('slide');
            }
        });
      
        $('.carousel-gallery .carousel').on('slid.bs.carousel', function () {
            var galleryCont = $(this).closest(".gallery-container");
            var galleryCarousel = $(this).closest('.carousel-gallery');
            var index = $(this).find(".active").index();
            galleryCont.find(".carousel-indicator-item").removeClass("active");
            galleryCont.find(".slick-slide").eq(index).find(".carousel-indicator-item").addClass("active"); 
            galleryCarousel.find('.carousel-indicators').slick('slickGoTo',index);
            if($(this).hasClass('gallery-carousel')){
                galleryCarousel.find('.modal-gallery-carousel').carousel(index);
                galleryCarousel.find('.modal-gallery-carousel').addClass('slide');
            }else{
                galleryCarousel.find('.gallery-carousel').carousel(index);
                galleryCarousel.find('.gallery-carousel').addClass('slide');
            }
        });
        
        $('.slick-next').on('click', function(){            
            updateIndicators($(this),'next');
        });
        
        $('.slick-prev').on('click', function(){            
            updateIndicators($(this),'prev');
        });
        
        $('.modal-gallery').on('show.bs.modal', function () {
            $(this).find('img[data-src]').each(function(){
                $(this).attr("src", $(this).data('src'));
                $(this).removeAttr("data-src");
            });
        });
        
        $('.modal-gallery').on('shown.bs.modal', function () {
            $(this).find(".carousel-indicators").slick('reinit');
        });
        
        $(window).on('resize', function (){
            $('.carousel-gallery').each(function() {
                setZoomOnPic($(this));
            });
        });
        
        function updateIndicators(elem, direction){
            $('.carousel-gallery img[data-src]').each(function(){
                $(this).attr("src", $(this).data('src'));
                $(this).removeAttr("data-src");
            });
            var indicMain = elem.closest(".carousel-gallery").find(".main-gallery-container .slick-slide.slick-active");
            var indicModal = elem.closest(".carousel-gallery").find(".modal-gallery .slick-slide.slick-active");
            
            var indicMainInd = -1;
            var indicModalInd = -1;
            
            if(direction == 'next'){
                indicMainInd = indicMain.last().attr('data-slick-index');
                indicModalInd = indicModal.last().attr('data-slick-index');
                
            }else if(direction == 'prev'){
                indicMainInd = indicMain.first().attr('data-slick-index');
                indicModalInd = indicModal.first().attr('data-slick-index');
            }
            
            if(indicMainInd != indicModalInd){
                var cont = elem.closest(".gallery-container");
                if(cont.hasClass('main-gallery-container')){
                    elem.closest(".carousel-gallery").find('.modal-gallery .slick-'+direction).trigger('click');
                }else{
                    elem.closest(".carousel-gallery").find('.main-gallery-container .slick-'+direction).trigger('click');
                }
            }
        }
    });
