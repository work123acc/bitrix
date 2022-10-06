$(document).ready(function() {
    
    $("#add_cart").click(function(){
        
        $.post("/ajax/add_cart.php",{id:$("#product_id").val() ,kol:$("#quantity_input").val()}, function(data){
            
            if(data){
                $("#cart_ajax").html("Товар добавлен!");
                $.post("/ajax/cart_update.php",{id:$("#product_id").val()}, function(data){
                    
                    $("#basket_div").html(data);
				});
				
				}else{
				
			}
            
		});
        return false;
	});
	$("#quantity_plus").click(function(){           
		imp = $("#quantity_input").val();            
		max_kol = $("#product_kol").val(); 
		
		var min = +$("#quantity_input").attr('min');		
		//sum_kol = parseInt(imp)+1;
		sum_kol = parseInt(imp)+min;

		if(sum_kol <= max_kol){
			$("#quantity_input").val(sum_kol); 
		}
		return false;
	});
	$("#quantity_minus").click(function(){
		imp = $("#quantity_input").val();
		var min = +$("#quantity_input").attr('min');
		//sum_kol = parseInt(imp)-1;
		sum_kol = parseInt(imp)-min;

		//if(sum_kol>=1){
		if(sum_kol>=min){
			$("#quantity_input").val(sum_kol); 
		}
		return false;
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