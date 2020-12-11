; (function ($) {
        $(document).ready(function () {
            $(".popup").each(function () {
                var image=$(this).find("img").attr("src");
                $(this).attr("href",image);

            });

        });
})(jQuery);
; (function ($) {
    $(document).ready(function () {
        var slider = tns({
            "container":".slider",
            "speed":300,
            "autoplayTimeout":3000,
            "item":1,
            "autoplay":true,
            "autoHeight":true,
            "controls":true,
            "nav":true,
            "autoplayButtonOutput":false
        });
    });
})(jQuery);

