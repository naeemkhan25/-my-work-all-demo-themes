;(function($){
    $(document).ready(function (){
      $("#loadmore").on("click",function (){
         var newurl=$(this).attr("href");
         $.get(newurl,{},function (data){
            var posts=$(data).find("#posts_container").html();
            $("#posts_container").append(posts);
            var newpageUrl=$(data).find("#loadmore").attr("href");
            if(newpageUrl) {
                $("#loadmore").attr("href", newpageUrl);
            }else {
                $("#loadmore").hide("slow");
            }

         });
         return false;
      });
      var Url=$("#loadmore").attr("href");
      if(!Url){
          $("#loadmore").hide();
      }
    });
})(jQuery);