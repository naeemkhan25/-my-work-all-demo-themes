;(function ($){
    $(document).ready(function (){
       $("#Send").on("click",function (){
           $.post(urls.adminurls,{
               "action":"contact",
               "nonce":$("#contact").val(),
               "name":$("#name").val(),
               "email":$("#email").val(),
               "phone":$("#phone").val(),
               "message":$("#message").val()
           },function (data){
               console.log(data);
           });
            return false;
       });

    });
})(jQuery);