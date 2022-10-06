<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule('iblock');
CModule::IncludeModule('catalog');
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
?>
<?
if($_POST["id"]!=""){
    
    if(Add2BasketByProductID($_POST["id"],$_POST["kol"])>0){
       echo 1;
   }else{
       echo 0;
   } 
    
    
}



?>