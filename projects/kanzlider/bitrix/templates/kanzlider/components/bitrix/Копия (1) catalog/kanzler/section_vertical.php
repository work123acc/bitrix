<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
	
	use Bitrix\Main\Loader;
	use Bitrix\Main\ModuleManager;
	
	/**
		* @global CMain $APPLICATION
		* @var CBitrixComponent $component
		* @var array $arParams
		* @var array $arResult
		* @var array $arCurSection
	*/
	
	
?>
<main class="main">
	<section class="goods  goods--category">
		<div class="wrap">
			<div class="goods--category__top">
				<div class="goods--category__title-box">
					
					<?$APPLICATION->IncludeComponent(
						"bitrix:breadcrumb",
						"altasib.breadcrumb_rdf",
						Array(
						"PATH" => "",
						"SITE_ID" => "s1",
						"START_FROM" => "0"
						)
					);?>
					
					
					<?
						$APPLICATION->IncludeComponent(
						"bitrix:catalog.section.list",
						"zagolovok",
						array(
						"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
						"IBLOCK_ID" => $arParams["IBLOCK_ID"],
						"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
						"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
						"CACHE_TYPE" => $arParams["CACHE_TYPE"],
						"CACHE_TIME" => $arParams["CACHE_TIME"],
						"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
						"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
						"TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
						"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
						"VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
						"SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
						"HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
						"ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : '')
						),
						$component,
						array("HIDE_ICONS" => "Y")
					);?>
					
				</div>
				<div class="goods--category__search-box">
					
					<?$APPLICATION->IncludeComponent(
						"bitrix:catalog.search",
						"catalog-section-search",
						Array(
						"ACTION_VARIABLE" => "action",
						"AJAX_MODE" => "N",
						"AJAX_OPTION_ADDITIONAL" => "",
						"AJAX_OPTION_HISTORY" => "N",
						"AJAX_OPTION_JUMP" => "N",
						"AJAX_OPTION_STYLE" => "Y",
						"BASKET_URL" => "/personal/basket.php",
						"CACHE_TIME" => "36000000",
						"CACHE_TYPE" => "A",
						"CHECK_DATES" => "N",
						"CONVERT_CURRENCY" => "N",
						"DETAIL_URL" => "",
						"DISPLAY_BOTTOM_PAGER" => "Y",
						"DISPLAY_COMPARE" => "N",
						"DISPLAY_TOP_PAGER" => "N",
						"ELEMENT_SORT_FIELD" => "sort",
						"ELEMENT_SORT_FIELD2" => "id",
						"ELEMENT_SORT_ORDER" => "asc",
						"ELEMENT_SORT_ORDER2" => "desc",
						"HIDE_NOT_AVAILABLE" => "N",
						"IBLOCK_ID" => "2",
						"IBLOCK_TYPE" => "1c_catalog",
						"LINE_ELEMENT_COUNT" => "3",
						"NO_WORD_LOGIC" => "N",
						"OFFERS_CART_PROPERTIES" => array("CML2_ARTICLE","CML2_BASE_UNIT","CML2_MANUFACTURER"),
						"OFFERS_FIELD_CODE" => array("ID","NAME","PREVIEW_TEXT","PREVIEW_PICTURE","DETAIL_TEXT","DETAIL_PICTURE",""),
						"OFFERS_LIMIT" => "5",
						"OFFERS_PROPERTY_CODE" => array("CML2_ARTICLE","CML2_BASE_UNIT",""),
						"OFFERS_SORT_FIELD" => "sort",
						"OFFERS_SORT_FIELD2" => "id",
						"OFFERS_SORT_ORDER" => "asc",
						"OFFERS_SORT_ORDER2" => "desc",
						"PAGER_DESC_NUMBERING" => "N",
						"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
						"PAGER_SHOW_ALL" => "N",
						"PAGER_SHOW_ALWAYS" => "N",
						"PAGER_TEMPLATE" => ".default",
						"PAGER_TITLE" => "Товары",
						"PAGE_ELEMENT_COUNT" => "30",
						"PRICE_CODE" => array("Розничные"),
						"PRICE_VAT_INCLUDE" => "Y",
						"PRODUCT_ID_VARIABLE" => "id",
						"PRODUCT_PROPERTIES" => array(),
						"PRODUCT_PROPS_VARIABLE" => "prop",
						"PRODUCT_QUANTITY_VARIABLE" => "quantity",
						"PROPERTY_CODE" => array("INDEX_NOVINKA","INDEX_SPEC","MAXIMUM_PRICE","MINIMUM_PRICE","CML2_ARTICLE",""),
						"RESTART" => "N",
						"SECTION_ID_VARIABLE" => "SECTION_ID",
						"SECTION_URL" => "",
						"SHOW_PRICE_COUNT" => "1",
						"USE_LANGUAGE_GUESS" => "Y",
						"USE_PRICE_COUNT" => "N",
						"USE_PRODUCT_QUANTITY" => "N"
						)
					);?>
					
					
				</div>
				
				
				<div class="goods--category__sort-box">
					<div class="goods--category__sort-left">
						<div class="goods--category__sort-title">
							В сравнении товаров: <a href="/catalog/compare/" id="compare_count">
								<?$APPLICATION->IncludeComponent(
									"bitrix:catalog.compare.list",
									"count",
									Array(
									"ACTION_VARIABLE" => "action",
									"AJAX_MODE" => "N",
									"AJAX_OPTION_ADDITIONAL" => "",
									"COMPARE_URL" => "/catalog/compare/",
									"DETAIL_URL" => "",
									"IBLOCK_ID" => "3",
									"IBLOCK_TYPE" => "1c_catalog",
									"NAME" => "CATALOG_COMPARE_LIST",
									"AJAX_OPTION_JUMP" => "N",
									"AJAX_OPTION_STYLE" => "Y",
									"AJAX_OPTION_HISTORY" => "N",
									"POSITION" => "top left",
									"POSITION_FIXED" => "Y",
									"PRODUCT_ID_VARIABLE" => "id"
									)
								);?>
								
							</a> 
						</div>
                                            <div class="goods--category__sort-title">
							Сортировать: 
						</div>
                                            <?
                                              if($_GET['sort']==""){?>
                                                <a href="<?=$APPLICATION->GetCurPageParam("sort=price&order=asc", array("sort","order","name"))?>" class="goods--category__sort-button active up  goods--category__sort-button--price">
							по цене
						</a> 
                                                 <a href="<?=$APPLICATION->GetCurPageParam("sort=name&order=asc", array("sort","order","name"))?>" class="goods--category__sort-button active up  goods--category__sort-button--popularity">
							по популярности
						</a>       
                                                    <a href="<?=$APPLICATION->GetCurPageParam(false, array("sort","order","name"))?>" class="goods--category__sort-button active up  goods--category__sort-button--popularity">
							по умолчанию
						</a>     
                                              <?}else{
                                                  if($_GET['sort']=="price"){
                                                      if($_GET['order']=="asc"){
                                                          $arParams["ELEMENT_SORT_FIELD"] = "PROPERTY_MAXIMUM_PRICE";
                                                          $arParams["ELEMENT_SORT_ORDER"]= "asc";?>
                                                            <a href="<?=$APPLICATION->GetCurPageParam("sort=price&order=desc", array("sort","order","name"))?>" class="goods--category__sort-button active down  goods--category__sort-button--price">
                                                                        по цене
                                                                </a> 
                                            <a href="<?=$APPLICATION->GetCurPageParam("sort=name&order=asc", array("sort","order","name"))?>" class="goods--category__sort-button active up  goods--category__sort-button--popularity">
							по популярности
						</a> 
                                            <a href="<?=$APPLICATION->GetCurPageParam(false, array("sort","order","name"))?>" class="goods--category__sort-button active up  goods--category__sort-button--popularity">
							по умолчанию
						</a> 
                                                      <?}else{
                                                          $arParams["ELEMENT_SORT_FIELD"] = "PROPERTY_MAXIMUM_PRICE";
                                                          $arParams["ELEMENT_SORT_ORDER"]= "desc";?>
                                                            <a href="<?=$APPLICATION->GetCurPageParam("sort=price&order=asc", array("sort","order","name"))?>" class="goods--category__sort-button active up  goods--category__sort-button--price">
                                                                        по цене
                                                                </a> 
                                            <a href="<?=$APPLICATION->GetCurPageParam("sort=name&order=asc", array("sort","order","name"))?>" class="goods--category__sort-button active up  goods--category__sort-button--popularity">
							по популярности
						</a> 
                                                   <a href="<?=$APPLICATION->GetCurPageParam(false, array("sort","order","name"))?>" class="goods--category__sort-button active up  goods--category__sort-button--popularity">
							по умолчанию
						</a>        
                                                      <?}
                                                  }else{ //shows
                                                    if($_GET['sort']=="name"){
                                                        if($_GET['order']=="asc"){
                                                          $arParams["ELEMENT_SORT_FIELD"] = "shows";
                                                          $arParams["ELEMENT_SORT_ORDER"]= "asc";
                                                            
                                                        ?>
                                                          <a href="<?=$APPLICATION->GetCurPageParam("sort=price&order=asc", array("sort","order","name"))?>" class="goods--category__sort-button active up  goods--category__sort-button--price">
							по цене
						       </a> 
                                            <a href="<?=$APPLICATION->GetCurPageParam("sort=name&order=desc", array("sort","order","name"))?>" class="goods--category__sort-button active down  goods--category__sort-button--popularity">
							по популярности
						</a>
                                            
                                            
                                                         <a href="<?=$APPLICATION->GetCurPageParam(false, array("sort","order","name"))?>" class="goods--category__sort-button active up  goods--category__sort-button--popularity">
							по умолчанию
						        </a> 
                                                        <?}else{
                                                           $arParams["ELEMENT_SORT_FIELD"] = "shows";
                                                          $arParams["ELEMENT_SORT_ORDER"]= "desc"; 
                                                         ?>  
                                                            <a href="<?=$APPLICATION->GetCurPageParam("sort=price&order=asc", array("sort","order","name"))?>" class="goods--category__sort-button active up  goods--category__sort-button--price">
							по цене
						     </a> 
                                            
                                            <a href="<?=$APPLICATION->GetCurPageParam("sort=name&order=asc", array("sort","order","name"))?>" class="goods--category__sort-button active up  goods--category__sort-button--popularity">
							по популярности
						</a>
                                            
                                                       <a href="<?=$APPLICATION->GetCurPageParam(false, array("sort","order","name"))?>" class="goods--category__sort-button active up  goods--category__sort-button--popularity">
							по умолчанию
						      </a> 
                                                        <?}
                                                        ?>
                                                       
                                                    <?}
                                                      
                                                  }
                                                  
                                                  
                                              }?>
                                          
                                            
                                            
						
						
						
						
					</div>
					<div class="goods--category__sort-right">
						<div class="goods--category__sort-title">
							Вид: 
						</div>
						<a href="" class="goods--category__sort-button  goods--category__sort-button--cards">
							карточками
						</a>
						<a href="" class="goods--category__sort-button  goods--category__sort-button--table">
							таблицей
						</a>
					</div>
				</div>
			</div>
			
			<?$APPLICATION->IncludeComponent(
				"bitrix:catalog.section",
				"",
				array(
				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
				"IBLOCK_ID" => $arParams["IBLOCK_ID"],
				"ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
				"ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
				"ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
				"ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
				"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
				"PROPERTY_CODE_MOBILE" => $arParams["LIST_PROPERTY_CODE_MOBILE"],
				"META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
				"META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
				"BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
				"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
				"INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
				"BASKET_URL" => $arParams["BASKET_URL"],
				"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
				"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
				"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
				"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
				"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
				"FILTER_NAME" => $arParams["FILTER_NAME"],
				"CACHE_TYPE" => $arParams["CACHE_TYPE"],
				"CACHE_TIME" => $arParams["CACHE_TIME"],
				"CACHE_FILTER" => $arParams["CACHE_FILTER"],
				"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
				"SET_TITLE" => $arParams["SET_TITLE"],
				"MESSAGE_404" => $arParams["~MESSAGE_404"],
				"SET_STATUS_404" => $arParams["SET_STATUS_404"],
				"SHOW_404" => $arParams["SHOW_404"],
				"FILE_404" => $arParams["FILE_404"],
				"DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
				"PAGE_ELEMENT_COUNT" => 20,
				"LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
				"PRICE_CODE" => $arParams["PRICE_CODE"],
				"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
				"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
				
				"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
				"USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
				"ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
				"PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
				"PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"],
				
				"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
				"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
				"PAGER_TITLE" => $arParams["PAGER_TITLE"],
				"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
				"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
				"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
				"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
				"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
				"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
				"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
				"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
				"LAZY_LOAD" => $arParams["LAZY_LOAD"],
				"MESS_BTN_LAZY_LOAD" => $arParams["~MESS_BTN_LAZY_LOAD"],
				"LOAD_ON_SCROLL" => $arParams["LOAD_ON_SCROLL"],
				
				"OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
				"OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
				"OFFERS_PROPERTY_CODE" => $arParams["LIST_OFFERS_PROPERTY_CODE"],
				"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
				"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
				"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
				"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
				"OFFERS_LIMIT" => $arParams["LIST_OFFERS_LIMIT"],
				
				"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
				"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
				"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
				"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
				"USE_MAIN_ELEMENT_SECTION" => $arParams["USE_MAIN_ELEMENT_SECTION"],
				'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
				'CURRENCY_ID' => $arParams['CURRENCY_ID'],
				'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
				'HIDE_NOT_AVAILABLE_OFFERS' => $arParams["HIDE_NOT_AVAILABLE_OFFERS"],
				
				'LABEL_PROP' => $arParams['LABEL_PROP'],
				'LABEL_PROP_MOBILE' => $arParams['LABEL_PROP_MOBILE'],
				'LABEL_PROP_POSITION' => $arParams['LABEL_PROP_POSITION'],
				'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'],
				'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
				'PRODUCT_BLOCKS_ORDER' => $arParams['LIST_PRODUCT_BLOCKS_ORDER'],
				'PRODUCT_ROW_VARIANTS' => $arParams['LIST_PRODUCT_ROW_VARIANTS'],
				'ENLARGE_PRODUCT' => $arParams['LIST_ENLARGE_PRODUCT'],
				'ENLARGE_PROP' => isset($arParams['LIST_ENLARGE_PROP']) ? $arParams['LIST_ENLARGE_PROP'] : '',
				'SHOW_SLIDER' => $arParams['LIST_SHOW_SLIDER'],
				'SLIDER_INTERVAL' => isset($arParams['LIST_SLIDER_INTERVAL']) ? $arParams['LIST_SLIDER_INTERVAL'] : '',
				'SLIDER_PROGRESS' => isset($arParams['LIST_SLIDER_PROGRESS']) ? $arParams['LIST_SLIDER_PROGRESS'] : '',
				
				'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
				'OFFER_TREE_PROPS' => $arParams['OFFER_TREE_PROPS'],
				'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
				'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
				'DISCOUNT_PERCENT_POSITION' => $arParams['DISCOUNT_PERCENT_POSITION'],
				'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
				'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
				'MESS_SHOW_MAX_QUANTITY' => (isset($arParams['~MESS_SHOW_MAX_QUANTITY']) ? $arParams['~MESS_SHOW_MAX_QUANTITY'] : ''),
				'RELATIVE_QUANTITY_FACTOR' => (isset($arParams['RELATIVE_QUANTITY_FACTOR']) ? $arParams['RELATIVE_QUANTITY_FACTOR'] : ''),
				'MESS_RELATIVE_QUANTITY_MANY' => (isset($arParams['~MESS_RELATIVE_QUANTITY_MANY']) ? $arParams['~MESS_RELATIVE_QUANTITY_MANY'] : ''),
				'MESS_RELATIVE_QUANTITY_FEW' => (isset($arParams['~MESS_RELATIVE_QUANTITY_FEW']) ? $arParams['~MESS_RELATIVE_QUANTITY_FEW'] : ''),
				'MESS_BTN_BUY' => (isset($arParams['~MESS_BTN_BUY']) ? $arParams['~MESS_BTN_BUY'] : ''),
				'MESS_BTN_ADD_TO_BASKET' => (isset($arParams['~MESS_BTN_ADD_TO_BASKET']) ? $arParams['~MESS_BTN_ADD_TO_BASKET'] : ''),
				'MESS_BTN_SUBSCRIBE' => (isset($arParams['~MESS_BTN_SUBSCRIBE']) ? $arParams['~MESS_BTN_SUBSCRIBE'] : ''),
				'MESS_BTN_DETAIL' => (isset($arParams['~MESS_BTN_DETAIL']) ? $arParams['~MESS_BTN_DETAIL'] : ''),
				'MESS_NOT_AVAILABLE' => (isset($arParams['~MESS_NOT_AVAILABLE']) ? $arParams['~MESS_NOT_AVAILABLE'] : ''),
				'MESS_BTN_COMPARE' => (isset($arParams['~MESS_BTN_COMPARE']) ? $arParams['~MESS_BTN_COMPARE'] : ''),
				
				'USE_ENHANCED_ECOMMERCE' => (isset($arParams['USE_ENHANCED_ECOMMERCE']) ? $arParams['USE_ENHANCED_ECOMMERCE'] : ''),
				'DATA_LAYER_NAME' => (isset($arParams['DATA_LAYER_NAME']) ? $arParams['DATA_LAYER_NAME'] : ''),
				'BRAND_PROPERTY' => (isset($arParams['BRAND_PROPERTY']) ? $arParams['BRAND_PROPERTY'] : ''),
				
				'TEMPLATE_THEME' => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
				"ADD_SECTIONS_CHAIN" => "N",
				'ADD_TO_BASKET_ACTION' => $basketAction,
				'SHOW_CLOSE_POPUP' => isset($arParams['COMMON_SHOW_CLOSE_POPUP']) ? $arParams['COMMON_SHOW_CLOSE_POPUP'] : '',
				'COMPARE_PATH' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['compare'],
				'COMPARE_NAME' => $arParams['COMPARE_NAME'],
				'BACKGROUND_IMAGE' => (isset($arParams['SECTION_BACKGROUND_IMAGE']) ? $arParams['SECTION_BACKGROUND_IMAGE'] : ''),
				'COMPATIBLE_MODE' => (isset($arParams['COMPATIBLE_MODE']) ? $arParams['COMPATIBLE_MODE'] : ''),
				'DISABLE_INIT_JS_IN_COMPONENT' => (isset($arParams['DISABLE_INIT_JS_IN_COMPONENT']) ? $arParams['DISABLE_INIT_JS_IN_COMPONENT'] : '')
				),
				$component
				);
			?>
			
			
		</div>
	</section>
