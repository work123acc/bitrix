<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
$templateLibrary = array('popup');
$currencyList = '';
if (!empty($arResult['CURRENCIES']))
{
	$templateLibrary[] = 'currency';
	$currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}
$templateData = array(
	'TEMPLATE_THEME' => $this->GetFolder().'/themes/'.$arParams['TEMPLATE_THEME'].'/style.css',
	'TEMPLATE_CLASS' => 'bx_'.$arParams['TEMPLATE_THEME'],
	'TEMPLATE_LIBRARY' => $templateLibrary,
	'CURRENCIES' => $currencyList
);
unset($currencyList, $templateLibrary);

$strMainID = $this->GetEditAreaId($arResult['ID']);
$arItemIDs = array(
	'ID' => $strMainID,
	'PICT' => $strMainID.'_pict',
	'DISCOUNT_PICT_ID' => $strMainID.'_dsc_pict',
	'STICKER_ID' => $strMainID.'_sticker',
	'BIG_SLIDER_ID' => $strMainID.'_big_slider',
	'BIG_IMG_CONT_ID' => $strMainID.'_bigimg_cont',
	'SLIDER_CONT_ID' => $strMainID.'_slider_cont',
	'SLIDER_LIST' => $strMainID.'_slider_list',
	'SLIDER_LEFT' => $strMainID.'_slider_left',
	'SLIDER_RIGHT' => $strMainID.'_slider_right',
	'OLD_PRICE' => $strMainID.'_old_price',
	'PRICE' => $strMainID.'_price',
	'DISCOUNT_PRICE' => $strMainID.'_price_discount',
	'SLIDER_CONT_OF_ID' => $strMainID.'_slider_cont_',
	'SLIDER_LIST_OF_ID' => $strMainID.'_slider_list_',
	'SLIDER_LEFT_OF_ID' => $strMainID.'_slider_left_',
	'SLIDER_RIGHT_OF_ID' => $strMainID.'_slider_right_',
	'QUANTITY' => $strMainID.'_quantity',
	'QUANTITY_DOWN' => $strMainID.'_quant_down',
	'QUANTITY_UP' => $strMainID.'_quant_up',
	'QUANTITY_MEASURE' => $strMainID.'_quant_measure',
	'QUANTITY_LIMIT' => $strMainID.'_quant_limit',
	'BASIS_PRICE' => $strMainID.'_basis_price',
	'BUY_LINK' => $strMainID.'_buy_link',
	'ADD_BASKET_LINK' => $strMainID.'_add_basket_link',
	'BASKET_ACTIONS' => $strMainID.'_basket_actions',
	'NOT_AVAILABLE_MESS' => $strMainID.'_not_avail',
	'COMPARE_LINK' => $strMainID.'_compare_link',
	'PROP' => $strMainID.'_prop_',
	'PROP_DIV' => $strMainID.'_skudiv',
	'DISPLAY_PROP_DIV' => $strMainID.'_sku_prop',
	'OFFER_GROUP' => $strMainID.'_set_group_',
	'BASKET_PROP_DIV' => $strMainID.'_basket_prop',
	'SUBSCRIBE_LINK' => $strMainID.'_subscribe',
);
$strObName = 'ob'.preg_replace("/[^a-zA-Z0-9_]/", "x", $strMainID);
$templateData['JS_OBJ'] = $strObName;

$strTitle = (
	isset($arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"]) && $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"] != ''
	? $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"]
	: $arResult['NAME']
);
$strAlt = (
	isset($arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"]) && $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"] != ''
	? $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"]
	: $arResult['NAME']
);
?>
<div class="back_to_search">
    <a onclick="history.back(); return false;" href="#">
        <img src="/img/back.svg" alt="">
        <span>К результатам поиска</span>
    </a>
</div>
<div class="cart_wrap">
    <div class="img_container">
        <div class="cart-carousel">
         <div>
              <?$file = CFile::ResizeImageGet($arResult['DETAIL_PICTURE']['ID'], array('width'=>370, 'height'=>390), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
             <img src="<?=$file["src"]?>" alt="">
         </div>
        </div>
    </div>
    <div class="description_container">
        <div class="title_cart">
            <h1><?=$arResult['PROPERTIES']['NAME_TOVAR_SITE']["VALUE"]?></h1>
             <div class="title_prod">
                                     
                                        <ul>
                                            <?
//                                            echo "<pre>";
//                                            print_r($arResult['PROPERTIES']);
//                                            echo "</pre>";
                                                    foreach ($arResult['PROPERTIES']["SV_TOVAR"]["VALUE"] as $key => $sv) {?>
                                                        
                                                    <?}
                                            ?> 
                                                    <?php
                                                      $descr="";
                    $arDescr=array(
                        $arResult['PROPERTIES']["TIP_NABORA_1"]["VALUE"],
                        $arResult['PROPERTIES']["TIP_PARFYUMERII"]["VALUE"],
                        $arResult['PROPERTIES']["TIP_KOSMETIKI"]["VALUE"],
                        $arResult['PROPERTIES']["TIP_KOSMETIKI_1"]["VALUE"],
                        $arResult['PROPERTIES']["TIP_NABORA"]["VALUE"],
                        $arResult['PROPERTIES']["TIP_KOSMETIKI_2"]["VALUE"],
                        $arResult['PROPERTIES']["TIP_KOSMETIKI_DLYA_GLAZ"]["VALUE"],
                        $arResult['PROPERTIES']["TIP_KOSMETIKI_DLYA_NOGTEY"]["VALUE"],
                        $arResult['PROPERTIES']["TIP_KOSMETIKI_DLYA_BROVEY"]["VALUE"],
                        $arResult['PROPERTIES']["TIP_AKSESSUARA_DLYA_MAKIYAZHA"]["VALUE"],
                        $arResult['PROPERTIES']["TIP_UKHODA_DLYA_LITSA"]["VALUE"],
                        $arResult['PROPERTIES']["TIP_UKHODA_ZA_TELOM"]["VALUE"],
                        $arResult['PROPERTIES']["TIP_UKHODA_ZA_RUKAMI"]["VALUE"],
                        $arResult['PROPERTIES']["TIP_UKHODA_ZA_NOGAMI"]["VALUE"],
                        $arResult['PROPERTIES']["TIP_UKHODA_ZA_VOLOSAMI"]["VALUE"],
                        $arResult['PROPERTIES']["TIP_TOVARA_DLYA_MUZHCHIN"]["VALUE"],
                        $arResult['PROPERTIES']["TIP_KOLGOTOK"]["VALUE"],
                        
                    );
                    for ($j = 0; $j < count($arDescr); $j++) {
                        if($arDescr[$j]!=""){
                            $descr=$arDescr[$j];
                            break;
                            
                        }
                    }
                                                    ?>              
                                          <li><?=$descr?></li>   
                           </ul>

                                    </div>                       
        </div>
       

<?
    // перенос данных в component_epilog $templateData там доступен 
  
    $templateData["DETAIL_PAGE_URL"] =$arResult["DETAIL_PAGE_URL"];
    $templateData["PRICES"]=$arResult["PRICES"];
    $templateData["DETAIL_TEXT"]=$arResult["DETAIL_TEXT"];
    $templateData["Result"]=$arResult;
    ?>


    
    

  