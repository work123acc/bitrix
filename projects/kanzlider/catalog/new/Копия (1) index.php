<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
	$APPLICATION->SetPageProperty("title", "Новинки каталога");
	$APPLICATION->SetTitle("Новинки каталога");
?>
<div class="wrap">
	<div class="goods__title-box">
		<h2 class="main-title goods__title">
			<?= $APPLICATION->GetTitle(); ?>
		</h2>
	</div>
	
	<? $GLOBALS['arrFilterNovinki'] = array('PROPERTY_INDEX_NOVINKA' => array('VALUE' => 'Y') ); ?>
	
	<div class="goods--category__sort-box">
		<div class="goods--category__sort-left">
			<div class="goods--category__sort-title">
				Сортировать:
			</div>
			
			
			<? if($_GET['sort']=="") { ?>
				<a href="<?=$APPLICATION->GetCurPageParam("sort=price&order=desc", array("sort","order","name"))?>" class="goods--category__sort-button active down  goods--category__sort-button--price">
					по цене
				</a>
				<a href="<?=$APPLICATION->GetCurPageParam("sort=name&order=asc", array("sort","order","name"))?>" class="goods--category__sort-button active up  goods--category__sort-button--popularity">
					по популярности
				</a>
				
				<? 
				} 
				else {
					if($_GET['sort']=="price") {
						if($_GET['order']=="asc") {
							$arParams["ELEMENT_SORT_FIELD"] = "catalog_PRICE_1"; //"PROPERTY_MAXIMUM_PRICE";
							$arParams["ELEMENT_SORT_ORDER"]= "asc";
						?>
						<a href="<?=$APPLICATION->GetCurPageParam("sort=price&order=desc", array("sort","order","name"))?>" class="goods--category__sort-button active down  goods--category__sort-button--price">
							по цене
						</a>
						<a href="<?=$APPLICATION->GetCurPageParam("sort=name&order=asc", array("sort","order","name"))?>" class="goods--category__sort-button active up  goods--category__sort-button--popularity">
							по популярности
						</a>
						
						<?
						}
						else {
							$arParams["ELEMENT_SORT_FIELD"] = "catalog_PRICE_1"; //"PROPERTY_MAXIMUM_PRICE";
							$arParams["ELEMENT_SORT_ORDER"]= "desc";
						?>
						<a href="<?=$APPLICATION->GetCurPageParam("sort=price&order=asc", array("sort","order","name"))?>" class="goods--category__sort-button active up  goods--category__sort-button--price">
							по цене
						</a>
						<a href="<?=$APPLICATION->GetCurPageParam("sort=name&order=asc", array("sort","order","name"))?>" class="goods--category__sort-button active up  goods--category__sort-button--popularity">
							по популярности
						</a>
						
						<?
						}
					}
					else { //shows
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
							
							
							
							<?
							}
							else{
								$arParams["ELEMENT_SORT_FIELD"] = "shows";
								$arParams["ELEMENT_SORT_ORDER"]= "desc";
							?>
							<a href="<?=$APPLICATION->GetCurPageParam("sort=price&order=asc", array("sort","order","name"))?>" class="goods--category__sort-button active up  goods--category__sort-button--price">
								по цене
							</a>
							
							<a href="<?=$APPLICATION->GetCurPageParam("sort=name&order=asc", array("sort","order","name"))?>" class="goods--category__sort-button active up  goods--category__sort-button--popularity">
								по популярности
							</a>
							
							
						<? } ?>
						
						<?
						}					
					}				
				}
			?>
		</div>
	</div>
	
	<?$APPLICATION->IncludeComponent(
		"bitrix:catalog.top",
		"catalog-top-novinki-new",
		Array(
		"ACTION_VARIABLE" => "action",
		"ADD_PICT_PROP" => "-",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_TO_BASKET_ACTION" => "ADD",
		"BASKET_URL" => "/personal/basket.php",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPARE_NAME" => "CATALOG_COMPARE_LIST",
		"COMPARE_PATH" => "",
		"COMPATIBLE_MODE" => "Y",
		"CONVERT_CURRENCY" => "N",
		"CUSTOM_FILTER" => "",
		"DETAIL_URL" => "/catalog/#SECTION_CODE#/#ELEMENT_CODE#.html",
		"DISPLAY_COMPARE" => "Y",
		"ELEMENT_COUNT" => "4",
		"ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],							
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
		"ELEMENT_SORT_ORDER2" => "desc",
		"ENLARGE_PRODUCT" => "STRICT",
		"FILTER_NAME" => "arrFilterNovinki",
		"HIDE_NOT_AVAILABLE" => "Y",
		"HIDE_NOT_AVAILABLE_OFFERS" => "Y",
		"IBLOCK_ID" => "15",
		"IBLOCK_TYPE" => "1c_catalog",
		"LABEL_PROP" => array(),
		"LINE_ELEMENT_COUNT" => "4",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_COMPARE" => "Сравнить",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"OFFERS_CART_PROPERTIES" => array("CML2_ARTICLE","CML2_BASE_UNIT","CML2_MANUFACTURER","CML2_TRAITS","CML2_TAXES","CML2_ATTRIBUTES","CML2_BAR_CODE"),
		"OFFERS_FIELD_CODE" => array("ID","NAME","PREVIEW_TEXT","PREVIEW_PICTURE","DETAIL_TEXT","DETAIL_PICTURE","IBLOCK_NAME",""),
		"OFFERS_LIMIT" => "5",
		"OFFERS_PROPERTY_CODE" => array("CML2_ARTICLE","CML2_BASE_UNIT","MORE_PHOTO","CML2_MANUFACTURER","CML2_TRAITS","CML2_TAXES","FILES","CML2_ATTRIBUTES","CML2_BAR_CODE",""),
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_FIELD2" => "id",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_ORDER2" => "desc",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => array("Розничные"),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons,compare",
		"PRODUCT_DISPLAY_MODE" => "N",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPERTIES" => array("CML2_MANUFACTURER","CML2_TRAITS","CML2_TAXES","CML2_ATTRIBUTES"),
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
		"PRODUCT_SUBSCRIPTION" => "Y",
		"PROPERTY_CODE" => array("CML2_ARTICLE","CML2_BASE_UNIT","CML2_MANUFACTURER","CML2_TRAITS","CML2_TAXES","CML2_ATTRIBUTES","CML2_BAR_CODE",""),
		"PROPERTY_CODE_MOBILE" => array("CML2_BASE_UNIT"),
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => "",
		"SEF_MODE" => "N",
		"SHOW_CLOSE_POPUP" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_MAX_QUANTITY" => "N",
		"SHOW_OLD_PRICE" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"SHOW_SLIDER" => "Y",
		"SLIDER_INTERVAL" => "3000",
		"SLIDER_PROGRESS" => "N",
		"TEMPLATE_THEME" => "blue",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"VIEW_MODE" => "SECTION"
		)
	);?>		
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>		