$(document).ready(function() {
    
    $("#add_cart").click(function(){
        
        $.post("/ajax/add_cart.php",{id:$("#product_id").val()}, function(data){
            
            if(data){
                $.post("/ajax/cart_update.php",{id:$("#product_id").val()}, function(data){
                    
                    $("#basket_div").html(data);
                });
               
            }else{
               
            }
            
        });
    });
        $("#quantity_plus").click(function(){
         
            
            imp = $("#quantity_input").val(); 
            
            max_kol = $("#product_kol").val(); 
           
            sum_kol = parseInt(imp)+1;
          
            if(sum_kol <= max_kol){
                $("#quantity_input").val(sum_kol); 
            }
        });
        $("#quantity_minus").click(function(){
             imp = $("#quantity_input").val(); 
             sum_kol = parseInt(imp)-1;
             if(sum_kol>=1){
                 $("#quantity_input").val(sum_kol); 
             }
        });
        
        
 
   $(".add_basket_btn.no_goods").click(function(){
       $("#subscribe_id").val($(this).data("id"));
       $("#subscribe_ajax").text(" ");
   }); 
    $("#price_control_form").submit(function(){
        var mail_subscribe =$("#username_price").val();
        if($('#email_notify_price').prop('checked')) {
            email_notify_price=1;
        }else{
            email_notify_price=0;
        }
        if($('#sms_notify_price').prop('checked')) {
            sms_notify_price=1;
        }else{
            sms_notify_price=0;
        }
        $.post("/ajax/sledit_price.php",{
            mail:mail_subscribe,
            id:$("#price_id_hidden").val(),
            firstname_price:$("#firstname_price").val(),
            lastname_price:$("#lastname_price").val(),
            city_price:$("#city_price").val(),
            phone_price:$("#phone_price").val(),
            email_notify_price:email_notify_price,
            sms_notify_price:sms_notify_price,
            
        }, function(data){
         $("#ajax_text_price").html(data);
            if(data==1){
              
                $("#ajax_text_price").html('Ваш Email добавлен!');
            }else{
                if(data==2){
                    $("#ajax_text_price").html("Ошибка! Попробуйте еще раз");
                }else{
                    $("#ajax_text_price").html("Ошибка! Укажите правильный email");
                }
            }
            
        });
        return false;
        
    });    
   
   
   
    $("#form_subscribe").submit(function(){
        var mail_subscribe =$("#subscribe_mail").val();
         var par = $(this).parents("form");
        $.post("/ajax/subscribe.php",{mail:mail_subscribe, id:$("#subscribe_id").val()}, function(data){
        
            if(data==1){
              
                $("#subscribe_ajax").html('Вы подписанны.');
            }else{
                if(data==2){
                    $("#subscribe_ajax").html("Вы <b>уже</b> подписанны");
                }else{
                    $("#subscribe_ajax").html("Ошибка! Попробуйте еще раз");
                }
            }
            
        });
        return false;
    });
    $(".soglasie_chek").click(function(){
         var par = $(this).parents("form");
        if ($(this).prop("checked")) {
            par.find(".soglasie_button").removeAttr("disable");
             par.find(".soglasie_button").removeAttr("style");
        }else{
           
           par.find(".soglasie_button").attr("disable","disable");
            par.find(".soglasie_button").attr("style","background: grey");
            
        }
        
    });
    
});