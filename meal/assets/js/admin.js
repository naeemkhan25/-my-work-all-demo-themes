
;(function ($){
    $(document).ready(function (){
        $("select2-selection__rendered").on("click",function (){
            if($(this).attr("id")=="select2-acf-field_5f5f02ae33e97-container"){
                $("#acf-group_5f5f5aec41c96").show("");
            }else{
                $("#acf-group_5f5f5aec41c96").hide();
            }
        })
    })
})(jQuery);

