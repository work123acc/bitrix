<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
use Bitrix\Catalog\PriceTable;
use Bitrix\Catalog\ProductTable;
use Bitrix\Iblock\ElementTable;
use Bitrix\Iblock\SectionTable;
use Bitrix\Main\Loader;
use Bitrix\Main\Web\HttpClient;
use Bitrix\Main\Web\Json;
?>

<?php
if($_POST["pass"]==12689029){
 $k= time();
    require_once ($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/csv_data.php");
    $csvFile = new CCSVData('R', true);
    $csvFile->LoadFile($_SERVER["DOCUMENT_ROOT"]."/upload/obmen/EXPORT.csv");
    $csvFile->SetDelimiter(';');
    $arRows = array();
    while ($arRes = $csvFile->Fetch())
    {
     $arRows[] = $arRes;
    }
  // обновление
    Cmodule::IncludeModule('catalog');
    Cmodule::IncludeModule('iblock');
    $bs = new CIBlockSection;
    $arProductId=array();
    $el = new CIBlockElement;
    for($i=$_POST["nachalo"];$i<$_POST["end"];$i++){
        $PRODUCT_NAME = $arRows[$i][3]; // название товара
        $PRODUCT_ARTICUL = $arRows[$i][2]; // артикул товара
        $PRODUCT_XMLID = $arRows[$i][5]; // xml_id товара b2662424-8fff-11df-bafa-001ec9e07635
        $QUANTITY = $arRows[$i][7]; //количество товара
        $PRICE = $arRows[$i][6]; //цена товара
        $PRICE_ID = 4; //id типа цены
        
        $arPriceAll=array(
            "4"=>intval($arRows[$i][6]),  // Смоленск
            "5"=>intval($arRows[$i][20]), // Брянск
            "6"=>intval($arRows[$i][21]), // Калуга
            "7"=>intval($arRows[$i][22]), // Курск
            "8"=>intval($arRows[$i][19]), // Белгород
            "9"=>intval($arRows[$i][23]), // Липецк
            "10"=>intval($arRows[$i][25]) // Тула
            
        );
        $ORDER = $arRows[$i][1]; // под заказ
        $arSelect = Array("ID","IBLOCK_SECTION_ID","ACTIVE");
        $arFilter = Array("XML_ID"=>$PRODUCT_XMLID,"IBLOCK_ID"=>8);
        $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
        if($ob = $res->GetNextElement()) // если есть элемент
        {
            $arFields = $ob->GetFields();
            $PRODUCT_ID=$arFields["ID"];
            $active=$arFields["ACTIVE"];
            $priceListProduct = [];
              $rsProducts = PriceTable::getList([
                 'filter' => [
                    '=PRODUCT_ID' => $PRODUCT_ID
                ],
                   'select' => [
                    'ID',
                    'PRODUCT_ID',
                    'CATALOG_GROUP_ID',
                    'PRICE',
                ],
                'limit' => 32768,
            ]);
             while ($arProduct = $rsProducts->fetch()) {
                        $priceListProduct[$arProduct["CATALOG_GROUP_ID"]]=$arProduct;


             }
              for($j=4;$j<=10;$j++){
                   if(isset($priceListProduct[$j]["ID"])){
                       //обновляем цену
                  $priceResult = PriceTable::update($priceListProduct[$j]["ID"], [
                    'PRICE' => $arPriceAll[$j],
                    
                        ]);
                   if ($priceResult->isSuccess()) {

                    } else {
                        echo $PRODUCT_ID."--".$priceResult->getErrorMessages()."<br />";
                    }
             }else{
                 // добавляем цену
                         
              $priceResult = PriceTable::add([
                                'PRODUCT_ID' => $PRODUCT_ID,
                                'PRICE' => $arPriceAll[$j],
                                'CURRENCY' => 'RUB',
                                'CATALOG_GROUP_ID' => $j,
                                'PRICE_SCALE' => $arPriceAll[$j],
                            ]);
           
                 
             }
                  
              }
            
            
         
            // под заказ
              if($ORDERED){
                CIBlockElement::SetPropertyValuesEx($PRODUCT_ID,8,array("ORDERED"=> 1));
                // обновляем количество
                $productResult = ProductTable::update($PRODUCT_ID, [
                     'ID' => $PRODUCT_ID, 
                     'QUANTITY' => 0,
                ]);
                CIBlockElement::SetPropertyValuesEx($PRODUCT_ID,8,array("RAND"=> $_POST["rand"]));
              }else{
                  CIBlockElement::SetPropertyValuesEx($PRODUCT_ID,8,array("ORDERED"=> 0));
                  // обновляем количество
                // $arFieldsCat = array('QUANTITY' => 100);
//                  if($QUANTITY>0){
                    $productResult = ProductTable::update($PRODUCT_ID, [
                     'ID' => $PRODUCT_ID, 
                     'QUANTITY' => $QUANTITY,
                   ]);
                    CIBlockElement::SetPropertyValuesEx($PRODUCT_ID,8,array("RAND"=> $_POST["rand"]));
                    \Bitrix\Iblock\PropertyIndex\Manager::updateElementIndex(8, $PRODUCT_ID);
                    CIBlockElement::SetPropertyValuesEx($PRODUCT_ID,8,array("NALICHIE"=>188));
//                  }
                 
              }
            if($active=="N")
            {
                $arLoadProductArray["ACTIVE"] ="Y";
                $el->Update($PRODUCT_ID, $arLoadProductArray); //обновляем элемент
            }
       
         
    
          CIBlockElement::SetPropertyValuesEx($PRODUCT_ID,8,array("CML2_ARTICLE"=> $PRODUCT_ARTICUL));
            
  
            $arProductId[]  =$PRODUCT_ID;
        }else{ // елемента нет нужно создать
            
           if($ORDERED)
            {
                $PROP = array();
                $PROP["ORDERED"] = 1;
                $PROP["CML2_ARTICLE"] = $ARTICUL;
                
                $arNewProductArray = array(
                 "IBLOCK_ID"      => 8,
                 "PROPERTY_VALUES"=>   $PROP,
                 "IBLOCK_SECTION_ID" =>1033, // категория новое
                 "NAME" => $PRODUCT_NAME,
                 "XML_ID" => $PRODUCT_XMLID,
                 "ACTIVE" => "Y"
                );
                $product_prop = array(
                    "ID" => $PRODUCT_ID, 
                    "QUANTITY" => 0         
                );
            }
            else
            {
                $PROP = array();
                $PROP["CML2_ARTICLE"] = $PRODUCT_ARTICUL;
                $arNewProductArray = array(
                 "IBLOCK_ID"      => 8,
                 "PROPERTY_VALUES"=>   $PROP,   
                 "IBLOCK_SECTION_ID" =>1033, // категория новое
                 "NAME" => $PRODUCT_NAME,
                 "XML_ID" => $PRODUCT_XMLID,
                 "ACTIVE" => "Y"
                );
                $product_prop = array(
                    "ID" => $PRODUCT_ID, 
                    //"QUANTITY" => 100 
                    "QUANTITY" => $QUANTITY          
                );
            }
            
            if($PRODUCT_ID = $el->Add($arNewProductArray))// добавляем элемент
            {
               $arProductId[]=$PRODUCT_ID;
                   $productResult = ProductTable::add([
                        'ID' => $PRODUCT_ID,
                        'QUANTITY' => $QUANTITY,

                    ]);
                
                if($productResult->isSuccess()) // добавляем товар
                {
                    
                       for($j=4;$j<=10;$j++){
                            //добавляем цену
                            $priceResult = PriceTable::add([
                                'PRODUCT_ID' => $PRODUCT_ID,
                                'PRICE' => $arPriceAll[$j],
                                'CURRENCY' => 'RUB',
                                'CATALOG_GROUP_ID' => $j,
                                'PRICE_SCALE' => $arPriceAll[$j],
                            ]);

                        }
                }


            }else{
                echo "не добавлено <br />";
                echo "<pre>";
                print_r($PRODUCT_ID);
                echo "</pre>";
            } 
            
        }
        
        
        
    }
    
    $t=time()-$k;
    echo $_POST["kol"]." обновлено  - ".count($arProductId)." елементов.За ".$t." сек.<br />";
} 