

;(function ($){
    $(document).ready(function (){
        $("#reservenow").on('click',function (){
            $.post(urls.adminurls,{
                "action":"reservation",
                "name":$("#name").val(),
                "email":$("#email").val(),
                "phone":$("#phone").val(),
                "persons":$("#persons").val(),
                "date":$("#date").val(),
                "time":$("#time").val(),
                "s":$("#nr").val()
            },function (data){
                console.log(data);
                if("Duplicate"==data){
                    alert("your reservation request is already insert");
                }else{
                    $("#payment").attr("href",data);
                    $("#reservenow").hide();
                    $("#payment").show();

                }
            });
            return false;
        });

    });
})(jQuery);