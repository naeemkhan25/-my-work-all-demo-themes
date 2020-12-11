/* ---------------------------------------------
 common scripts
 --------------------------------------------- */

;(function ($) {

    "use strict"; // use strict to start



    $(document).ready(function () {

        /* ---------------------------------------------
         portfolio filtering
         --------------------------------------------- */

        var $portfolio = $('.portfolio-grid');
        if ($.fn.imagesLoaded && $portfolio.length > 0) {
            imagesLoaded($portfolio, function () {
                $portfolio.isotope({
                    itemSelector: '.portfolio-item',
                    filter: '*'
                });
                $(window).trigger("resize");
            });
        }

        $('.portfolio-filter').on('click', 'a', function (e) {
            e.preventDefault();
            $(this).parent().addClass('active').siblings().removeClass('active');
            var filterValue = $(this).attr('data-filter');
            $portfolio.isotope({filter: filterValue});
        });

        /*-----------------------------------------------------
         magnific popup init
         ------------------------------------------------------- */

        $(".portfolio-gallery").each(function () {
            $(this).find(".popup-gallery").magnificPopup({
                type: "image",
                gallery: {
                    enabled: true
                }
            });
        });

        $("#loadmoreimageb").on('click',function (){

           var current_offset=$(".portfolio-grid").data('images');
            var ni=$(".portfolio-grid").data('ni');
           var sid=$(".portfolio-grid").data('sid');
          var nonce=$("#loadmorep").val();
           $.post(protfolio.ajaxurls,{
               "action":'loadmoreaction',
               "nonce":nonce,
               "offset":current_offset,
               "sid":sid,
           },function (data){
               console.log(data);
               $(".portfolio-grid").data('images',(parseInt(current_offset)+parseInt(ni)));

           });


        });


    });

})(jQuery);