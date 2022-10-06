<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

$GLOBALS['TEMPLATE_THIS_ELEMENT_ID'] = $arResult['ID'];
$GLOBALS['TEMPLATE_THIS_SECTION_ID'] = $arResult['IBLOCK_SECTION_ID'];

 
$this->setFrameMode(true);
$this->addExternalCss('/bitrix/css/main/bootstrap.css');

$templateLibrary = array('popup', 'fx');
$currencyList = '';

if (!empty($arResult['CURRENCIES']))
{
	$templateLibrary[] = 'currency';
	$currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}

$templateData = array(
	'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
	'TEMPLATE_LIBRARY' => $templateLibrary,
	'CURRENCIES' => $currencyList,
	'ITEM' => array(
		'ID' => $arResult['ID'],
		'IBLOCK_ID' => $arResult['IBLOCK_ID'],
		'OFFERS_SELECTED' => $arResult['OFFERS_SELECTED'],
		'JS_OFFERS' => $arResult['JS_OFFERS']
	)
);
unset($currencyList, $templateLibrary);

$mainId = $this->GetEditAreaId($arResult['ID']);
$itemIds = array(
	'ID' => $mainId,
	'DISCOUNT_PERCENT_ID' => $mainId.'_dsc_pict',
	'STICKER_ID' => $mainId.'_sticker',
	'BIG_SLIDER_ID' => $mainId.'_big_slider',
	'BIG_IMG_CONT_ID' => $mainId.'_bigimg_cont',
	'SLIDER_CONT_ID' => $mainId.'_slider_cont',
	'OLD_PRICE_ID' => $mainId.'_old_price',
	'PRICE_ID' => $mainId.'_price',
	'DISCOUNT_PRICE_ID' => $mainId.'_price_discount',
	'PRICE_TOTAL' => $mainId.'_price_total',
	'SLIDER_CONT_OF_ID' => $mainId.'_slider_cont_',
	'QUANTITY_ID' => $mainId.'_quantity',
	'QUANTITY_DOWN_ID' => $mainId.'_quant_down',
	'QUANTITY_UP_ID' => $mainId.'_quant_up',
	'QUANTITY_MEASURE' => $mainId.'_quant_measure',
	'QUANTITY_LIMIT' => $mainId.'_quant_limit',
	'BUY_LINK' => $mainId.'_buy_link',
	'ADD_BASKET_LINK' => $mainId.'_add_basket_link',
	'BASKET_ACTIONS_ID' => $mainId.'_basket_actions',
	'NOT_AVAILABLE_MESS' => $mainId.'_not_avail',
	'COMPARE_LINK' => $mainId.'_compare_link',
	'TREE_ID' => $mainId.'_skudiv',
	'DISPLAY_PROP_DIV' => $mainId.'_sku_prop',
	'DISPLAY_MAIN_PROP_DIV' => $mainId.'_main_sku_prop',
	'OFFER_GROUP' => $mainId.'_set_group_',
	'BASKET_PROP_DIV' => $mainId.'_basket_prop',
	'SUBSCRIBE_LINK' => $mainId.'_subscribe',
	'TABS_ID' => $mainId.'_tabs',
	'TAB_CONTAINERS_ID' => $mainId.'_tab_containers',
	'SMALL_CARD_PANEL_ID' => $mainId.'_small_card_panel',
	'TABS_PANEL_ID' => $mainId.'_tabs_panel'
);
$obName = $templateData['JS_OBJ'] = 'ob'.preg_replace('/[^a-zA-Z0-9_]/', 'x', $mainId);
$name = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
	: $arResult['NAME'];
$title = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE']
	: $arResult['NAME'];
$alt = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT']
	: $arResult['NAME'];

$haveOffers = !empty($arResult['OFFERS']);
if ($haveOffers)
{
	$actualItem = isset($arResult['OFFERS'][$arResult['OFFERS_SELECTED']])
		? $arResult['OFFERS'][$arResult['OFFERS_SELECTED']]
		: reset($arResult['OFFERS']);
	$showSliderControls = false;

	foreach ($arResult['OFFERS'] as $offer)
	{
		if ($offer['MORE_PHOTO_COUNT'] > 1)
		{
			$showSliderControls = true;
			break;
		}
	}
}
else
{
	$actualItem = $arResult;
	$showSliderControls = $arResult['MORE_PHOTO_COUNT'] > 1;
}

$skuProps = array();
$price = $actualItem['ITEM_PRICES'][$actualItem['ITEM_PRICE_SELECTED']];
$measureRatio = $actualItem['ITEM_MEASURE_RATIOS'][$actualItem['ITEM_MEASURE_RATIO_SELECTED']]['RATIO'];
$showDiscount = $price['PERCENT'] > 0;

$showDescription = !empty($arResult['PREVIEW_TEXT']) || !empty($arResult['DETAIL_TEXT']);
$showBuyBtn = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION']);
$buyButtonClassName = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-default' : 'btn-link';
$showAddBtn = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION']);
$showButtonClassName = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-default' : 'btn-link';
$showSubscribe = $arParams['PRODUCT_SUBSCRIPTION'] === 'Y' && ($arResult['CATALOG_SUBSCRIBE'] === 'Y' || $haveOffers);

$arParams['MESS_BTN_BUY'] = $arParams['MESS_BTN_BUY'] ?: Loc::getMessage('CT_BCE_CATALOG_BUY');
$arParams['MESS_BTN_ADD_TO_BASKET'] = $arParams['MESS_BTN_ADD_TO_BASKET'] ?: Loc::getMessage('CT_BCE_CATALOG_ADD');
$arParams['MESS_NOT_AVAILABLE'] = $arParams['MESS_NOT_AVAILABLE'] ?: Loc::getMessage('CT_BCE_CATALOG_NOT_AVAILABLE');
$arParams['MESS_BTN_COMPARE'] = $arParams['MESS_BTN_COMPARE'] ?: Loc::getMessage('CT_BCE_CATALOG_COMPARE');
$arParams['MESS_PRICE_RANGES_TITLE'] = $arParams['MESS_PRICE_RANGES_TITLE'] ?: Loc::getMessage('CT_BCE_CATALOG_PRICE_RANGES_TITLE');
$arParams['MESS_DESCRIPTION_TAB'] = $arParams['MESS_DESCRIPTION_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_DESCRIPTION_TAB');
$arParams['MESS_PROPERTIES_TAB'] = $arParams['MESS_PROPERTIES_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_PROPERTIES_TAB');
$arParams['MESS_COMMENTS_TAB'] = $arParams['MESS_COMMENTS_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_COMMENTS_TAB');
$arParams['MESS_SHOW_MAX_QUANTITY'] = $arParams['MESS_SHOW_MAX_QUANTITY'] ?: Loc::getMessage('CT_BCE_CATALOG_SHOW_MAX_QUANTITY');
$arParams['MESS_RELATIVE_QUANTITY_MANY'] = $arParams['MESS_RELATIVE_QUANTITY_MANY'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['MESS_RELATIVE_QUANTITY_FEW'] = $arParams['MESS_RELATIVE_QUANTITY_FEW'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_FEW');

$positionClassMap = array(
	'left' => 'product-item-label-left',
	'center' => 'product-item-label-center',
	'right' => 'product-item-label-right',
	'bottom' => 'product-item-label-bottom',
	'middle' => 'product-item-label-middle',
	'top' => 'product-item-label-top'
);

$discountPositionClass = 'product-item-label-big';
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION']))
{
	foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos)
	{
		$discountPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}

$labelPositionClass = 'product-item-label-big';
if (!empty($arParams['LABEL_PROP_POSITION']))
{
	foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos)
	{
		$labelPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}
?>
<div class="card__top">
              <div class="card__title-box">
             <?$APPLICATION->IncludeComponent(
					"bitrix:breadcrumb",
					"altasib.breadcrumb_rdf",
					Array(
					"PATH" => "",
					"SITE_ID" => "s1",
					"START_FROM" => "0"
					)
				);?>
				
                <h1 class="main-title card__title">
                  <?=$name?>
                </h1>
              </div>
            </div>
<div class="card__product">
   
              <div class="card__product-left">
                <div class="card__image">
           <?if (!empty($actualItem['MORE_PHOTO']))
            {?><div class="card__image-images">
                    <?foreach ($actualItem['MORE_PHOTO'] as $key => $photo)
                    {
                            ?>
                           
                                    <img src="<?=$photo['SRC']?>" alt="<?=$alt?>" title="<?=$title?>"<?=($key == 0 ? ' itemprop="image"' : '')?>>
                          
                            <?
                    }?>
                 </div>
                    <div class="card__image-pagination">
                        <?foreach ($actualItem['MORE_PHOTO'] as $key => $photo)
                    {
                            ?>
                           <div class="card__image-pagination__item">
                              <img src="<?=$photo['SRC']?>" alt="<?=$alt?>" title="<?=$title?>"<?=($key == 0 ? ' itemprop="image"' : '')?>>
                            </div>
                                   
                          
                            <?
                    }?>
                    </div>
            <?}?>
                </div>
                <div class="card__product-social">
                  <span class="card__product-social-title">Поделиться:</span>
                  <script type="text/javascript">(function() {
                    if (window.pluso)if (typeof window.pluso.start == "function") return;
                    if (window.ifpluso==undefined) { window.ifpluso = 1;
                      var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                      s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
                      s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
                      var h=d[g]('body')[0];
                      h.appendChild(s);
                    }})();</script>
                    <div class="pluso" data-background="transparent" data-options="medium,round,line,horizontal,nocounter,theme=02" data-services="facebook,twitter,vkontakte,odnoklassniki,google,livejournal"></div>
                  </div>
                  <div class="card__product-advantage-buttons">
                    <a href="javascript:void(0)" id="compare_<?=$arResult["OFFERS"][0]["ID"]?>" class="adv__button card__product-advantage-button  card__product-advantage-button--compare" onclick="docompare(<?=$arResult["OFFERS"][0]["ID"]?>)">Сравнить</a>
                    <a href="" class="adv__button card__product-advantage-button  card__product-advantage-button--favorite js-wishlist" data-wishiblock="<?=$arResult["IBLOCK_ID"]?>" data-wishid="<?=$arResult["IBLOCK_ID"]?>">Добавить в избранное</a>
                  </div>
                </div>
                <div class="card__product-right">
                  <div class="card__product-logo">
                    <img src="img/product-logo.jpg" alt="">
                  </div>
                  <div class="card__product-code">
                    код: <span><?=$arResult["PROPERTIES"]["CODE_1C"]["VALUE"]?></span>
                  </div>
                  <div class="card__product-text">
                   <?=$arResult['PREVIEW_TEXT']?> 
                  </div>
                  <div class="card__product-characters">
                    <div class="card__product-char">
                     <?if($arResult["OFFERS"][0]["CATALOG_QUANTITY"]>25){?>
                        В наличии <b>более 25</b> шт.
                    <?}else{
                        if($arResult["OFFERS"][0]["CATALOG_QUANTITY"]==0 or $arResult["OFFERS"][0]["CATALOG_QUANTITY"]<0){?>
                            Нет в наличии
                        <?}else{?>
                          В наличии <b><?=$arResult["OFFERS"][0]["CATALOG_QUANTITY"]?></b> шт.
                        <?}?>
                        
                    <?}?>
                    
                    </div>
                    <div class="card__product-char">
                      Количество в упаковке <b><?=$arResult["PROPERTIES"]["CML2_BASE_UNIT"]["~DESCRIPTION"]?></b> шт.
                    </div>
                      <?if($arResult["PROPERTIES"]["MIN_PART"]["VALUE"]!=""){?>
                          <div class="card__product-char">
                      Минимальная партия <b><?=$arResult["PROPERTIES"]["MIN_PART"]["VALUE"]?></b> шт.
                    </div>
                       <?}?>
                    
                  </div>
                    <?if($arResult["PROPERTIES"]["PRICE_SALE"]["VALUE"]!=""){?>
                        
                        <div class="card__product-price-discount">
                    цена с max скидкой: <span><?=$arResult["PROPERTIES"]["PRICE_SALE"]["VALUE"]?></span> <span>Р</span>
                  </div>
                   <?}?>
                  
                    <div id="cart_ajax" style="height: 30px; margin: 10px 0"></div>
                  <div class="card__product-price-block">
                    <input type="number" id="quantity_input" min="1" class="card__product-count" value="1">
                    <input type="hidden" value="<?=$arResult["OFFERS"][0]["CATALOG_QUANTITY"]?>" id="product_kol"/>
                    <input type="hidden" value="<?=$arResult["OFFERS"][0]["ID"]?>" id="product_id"/>  
                    <div class="card__product-count-buttons">
                      <a href=""  id="quantity_plus" class="card__product-count-button  card__product-count-button--up"></a>
                      <a href="" id="quantity_minus" class="card__product-count-button  card__product-count-button--down"></a>
                    </div>
                
                    <div class="card__product-price"><?=$price["RATIO_PRICE"]?> <span>Р</span></div>
                    <a href="" class="card__product-add-cart" id="add_cart">
                      В корзину
                    </a>
                  </div>
                    <button data-module="buyoneclick" data-id="<?=$arResult["OFFERS"][0]["ID"]?>" class="card__product-fast-buy">
                    Купить в один клик
                  </button>
                </div>
                <div class="card__product-info-block">
                  <div class="card__product-info-item">
                    <div class="card__product-info-desc">
                      <span>Доставка:</span>
                      Мы доставляем ваш заказ в течении 24 часов в любую точку Иркутска
                    </div>
                    <a href="/dostavka/" class="card__product-info-button">
                      подробнее о доставке
                    </a>
                  </div>
                  <div class="card__product-info-item">
                    <div class="card__product-info-desc">
                      <span>Оплата заказа:</span>
                      Принимаем банковские карты Visa и Mastercard, переводы платежных систем Webmoney и Qiwi 
                    </div>
                    <a href="/dostavka/" class="card__product-info-button">
                      подробнее об оплате
                    </a>
                  </div>
                </div>
              </div>
<script>
	function docompare(ID) {
		$.post("/ajax/compare.php",{id: ID, action: "ADD_TO_COMPARE_LIST"}, function(data){
			$("#compare_"+ID).text("Уже в сравнении");
			$("#compare_"+ID).removeAttr("onclick");
			$.post("/ajax/compare_count.php",{}, function(data){
				$("#compare_count").text(data);
			});
		});		
	}
</script>