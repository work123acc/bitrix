$(document).ready(function() {
    
    $(".add_cart").click(function(){
         var parent = $(this).parent("div");
        $.post("/ajax/add_cart.php",{id:parent.find(".product_id").val() ,kol:parent.find(".quantity_input").val()}, function(data){
            
            if(data){
                //alert("Товар добавлен!");
                $.post("/ajax/cart_update.php",{id:parent.find(".product_id").val()}, function(data){
                    
                    $("#basket_div").html(data);
                });
               
            }else{
               
            }
            
        });
        return false;
    });
        $(".quantity_plus").click(function(){
         var parent = $(this).parent("div").parent("div");
            
            imp = parent.find(".quantity_input"); 
            imp_val=imp.val();
            max_kol = parent.find(".product_kol").val(); 
            shag = parent.find(".shag");
//                alert(imp);
                shag_val=shag.val();
            sum_kol = parseInt(imp_val)+parseInt(shag_val);
          
            if(sum_kol <= max_kol){
                imp.val(sum_kol); 
            }
            return false;
        });
        
        $(".quantity_minus").click(function(){
            var parent = $(this).parent("div").parent("div");
             shag = parent.find(".shag");
//                alert(imp);
                shag_val=shag.val();
            imp = parent.find(".quantity_input"); 
            imp_val=imp.val();
             sum_kol = parseInt(imp_val)-parseInt(shag_val);
             if(sum_kol>=1){
                 imp.val(sum_kol); 
             }
             return false;
        });
        
        
 
   
   
   
  
    
});