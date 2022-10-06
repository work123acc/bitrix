<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
	$APPLICATION->SetPageProperty("title", "Спецпредложения");
	$APPLICATION->SetTitle("Спецпредложения");
?>
<main class="main main--with-sidebar">
	
	<div class="sidebar">
		<aside class="sidebar-menu__box">
			<div class="sidebar-menu__current-box">
				<ul class="sidebar-menu__menu">
					<li>
						
						<?$APPLICATION->IncludeComponent(
							"bitrix:menu",
							"element-active-menu",
							Array(
							"ALLOW_MULTI_SELECT" => "N",
							"CHILD_MENU_TYPE" => "left",
							"DELAY" => "N",
							"MAX_LEVEL" => "2",
							"MENU_CACHE_GET_VARS" => array(""),
							"MENU_CACHE_TIME" => "3600",
							"MENU_CACHE_TYPE" => "A",
							"MENU_CACHE_USE_GROUPS" => "Y",
							"ROOT_MENU_TYPE" => "left",
							"USE_EXT" => "Y"
							)
						);?>
						
					</li>
				</ul>
			</div>
			<div class="sidebar-menu__menu">
				
				<?$APPLICATION->IncludeComponent(
					"bitrix:menu",
					"element-left-menu",
					Array(
					"ALLOW_MULTI_SELECT" => "N",
					"CHILD_MENU_TYPE" => "left",
					"DELAY" => "N",
					"MAX_LEVEL" => "2",
					"MENU_CACHE_GET_VARS" => array(""),
					"MENU_CACHE_TIME" => "3600",
					"MENU_CACHE_TYPE" => "A",
					"MENU_CACHE_USE_GROUPS" => "Y",
					"ROOT_MENU_TYPE" => "left",
					"USE_EXT" => "Y"
					)
				);?>
				
			</div>
		</aside>
		<aside class="sidebar-news">
			<div class="sidebar-news__title">
				Свежая новость
			</div>
			<div class="sidebar-news__new">
				
				<?$APPLICATION->IncludeComponent(
					"bitrix:news.list", 
					"tovar-svezhaya-novost", 
					array(
					"ACTIVE_DATE_FORMAT" => "j F Y",
					"ADD_SECTIONS_CHAIN" => "N",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "Y",
					"CACHE_TIME" => "36000000",
					"CACHE_TYPE" => "A",
					"CHECK_DATES" => "Y",
					"DETAIL_URL" => "",
					"DISPLAY_BOTTOM_PAGER" => "N",
					"DISPLAY_DATE" => "Y",
					"DISPLAY_NAME" => "Y",
					"DISPLAY_PICTURE" => "Y",
					"DISPLAY_PREVIEW_TEXT" => "Y",
					"DISPLAY_TOP_PAGER" => "N",
					"FIELD_CODE" => array(
					0 => "ID",
					1 => "NAME",
					2 => "PREVIEW_TEXT",
					3 => "PREVIEW_PICTURE",
					4 => "DETAIL_TEXT",
					5 => "DETAIL_PICTURE",
					6 => "",
					),
					"FILTER_NAME" => "",
					"HIDE_LINK_WHEN_NO_DETAIL" => "N",
					"IBLOCK_ID" => "4",
					"IBLOCK_TYPE" => "content",
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
					"INCLUDE_SUBSECTIONS" => "Y",
					"MESSAGE_404" => "",
					"NEWS_COUNT" => "3",
					"PAGER_BASE_LINK_ENABLE" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_TEMPLATE" => ".default",
					"PAGER_TITLE" => "Новости",
					"PARENT_SECTION" => "",
					"PARENT_SECTION_CODE" => "",
					"PREVIEW_TRUNCATE_LEN" => "",
					"PROPERTY_CODE" => array(
					0 => "",
					1 => "",
					),
					"SET_BROWSER_TITLE" => "N",
					"SET_LAST_MODIFIED" => "N",
					"SET_META_DESCRIPTION" => "N",
					"SET_META_KEYWORDS" => "N",
					"SET_STATUS_404" => "N",
					"SET_TITLE" => "N",
					"SHOW_404" => "N",
					"SORT_BY1" => "ID",
					"SORT_BY2" => "SORT",
					"SORT_ORDER1" => "DESC",
					"SORT_ORDER2" => "ASC",
					"STRICT_SECTION_CHECK" => "N",
					"COMPONENT_TEMPLATE" => "tovar-svezhaya-novost"
					),
					false
				);?>
				
				
				
			</div>
			<a href="/news/" class="sidebar-news__more">
				Архив новостей
			</a>
		</aside>
	</div>
	
	<div class="wrap wrap--with-sidebar">
		<section class="goods goods--category card">
			<div class="wrap">
				<div class="goods__title-box">
					
					<?$APPLICATION->IncludeComponent(
						"bitrix:breadcrumb",
						"altasib.breadcrumb_rdf",
						Array(
						"PATH" => "",
						"SITE_ID" => "s1",
						"START_FROM" => "0"
						)
					);?>
					
					<h2 class="main-title goods__title">
						<?= $APPLICATION->GetTitle(); ?>
					</h2>
				</div>
				
				<? $GLOBALS['arrFilterSpec'] = array('PROPERTY_INDEX_SPEC' => array('VALUE' => 'Y') ); ?>
				
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
					"bitrix:catalog.section",
					"section_spec",
					Array(
					"ACTION_VARIABLE" => "action",
					"ADD_PICT_PROP" => "-",
					"ADD_PROPERTIES_TO_BASKET" => "Y",
					"ADD_SECTIONS_CHAIN" => "N",
					"ADD_TO_BASKET_ACTION" => "ADD",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"BACKGROUND_IMAGE" => "-",
					"BASKET_URL" => "/personal/basket.php",
					"BROWSER_TITLE" => "-",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "Y",
					"CACHE_TIME" => "36000000",
					"CACHE_TYPE" => "A",
					"COMPARE_NAME" => "CATALOG_COMPARE_LIST",
					"COMPARE_PATH" => "",
					"COMPATIBLE_MODE" => "Y",
					"CONVERT_CURRENCY" => "N",
					"CUSTOM_FILTER" => "",
					"DETAIL_URL" => "",
					"DISABLE_INIT_JS_IN_COMPONENT" => "N",
					"DISPLAY_BOTTOM_PAGER" => "Y",
					"DISPLAY_COMPARE" => "Y",
					"DISPLAY_TOP_PAGER" => "N",
					"ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
					"ELEMENT_SORT_FIELD2" => "id",
					"ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
					"ELEMENT_SORT_ORDER2" => "desc",
					"ENLARGE_PRODUCT" => "STRICT",
					"FILTER_NAME" => "arrFilterSpec",
					"HIDE_NOT_AVAILABLE" => "Y",
					"HIDE_NOT_AVAILABLE_OFFERS" => "Y",
					"IBLOCK_ID" => "15",
					"IBLOCK_TYPE" => "1c_catalog",
					"INCLUDE_SUBSECTIONS" => "Y",
					"LABEL_PROP" => array(),
					"LAZY_LOAD" => "N",
					"LINE_ELEMENT_COUNT" => "4",
					"LOAD_ON_SCROLL" => "N",
					"MESSAGE_404" => "",
					"MESS_BTN_ADD_TO_BASKET" => "В корзину",
					"MESS_BTN_BUY" => "Купить",
					"MESS_BTN_COMPARE" => "Сравнить",
					"MESS_BTN_DETAIL" => "Подробнее",
					"MESS_BTN_SUBSCRIBE" => "Подписаться",
					"MESS_NOT_AVAILABLE" => "Нет в наличии",
					"META_DESCRIPTION" => "-",
					"META_KEYWORDS" => "-",
					"OFFERS_CART_PROPERTIES" => array(),
					"OFFERS_FIELD_CODE" => array("ID","NAME","PREVIEW_TEXT","PREVIEW_PICTURE","DETAIL_PICTURE",""),
					"OFFERS_LIMIT" => "5",
					"OFFERS_PROPERTY_CODE" => array("",""),
					"OFFERS_SORT_FIELD" => "sort",
					"OFFERS_SORT_FIELD2" => "id",
					"OFFERS_SORT_ORDER" => "asc",
					"OFFERS_SORT_ORDER2" => "desc",
					"PAGER_BASE_LINK_ENABLE" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_TEMPLATE" => "kanzler-news-navigation",
					"PAGER_TITLE" => "Товары",
					"PAGE_ELEMENT_COUNT" => "28",
					"PARTIAL_PRODUCT_PROPERTIES" => "N",
					"PRICE_CODE" => array("Розничные"),
					"PRICE_VAT_INCLUDE" => "Y",
					"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
					"PRODUCT_DISPLAY_MODE" => "N",
					"PRODUCT_ID_VARIABLE" => "id",
					"PRODUCT_PROPERTIES" => array(),
					"PRODUCT_PROPS_VARIABLE" => "prop",
					"PRODUCT_QUANTITY_VARIABLE" => "quantity",
					"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
					"PRODUCT_SUBSCRIPTION" => "Y",
					"PROPERTY_CODE" => array("INDEX_NOVINKA","INDEX_SPEC",""),
					"PROPERTY_CODE_MOBILE" => array(),
					"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
					"RCM_TYPE" => "personal",
					"SECTION_CODE" => "",
					"SECTION_ID" => "",
					"SECTION_ID_VARIABLE" => "SECTION_ID",
					"SECTION_URL" => "",
					"SECTION_USER_FIELDS" => array("UF_SECTION_HEAD_IMG",""),
					"SEF_MODE" => "N",
					"SET_BROWSER_TITLE" => "N",
					"SET_LAST_MODIFIED" => "N",
					"SET_META_DESCRIPTION" => "N",
					"SET_META_KEYWORDS" => "N",
					"SET_STATUS_404" => "N",
					"SET_TITLE" => "N",
					"SHOW_404" => "N",
					"SHOW_ALL_WO_SECTION" => "Y",
					"SHOW_CLOSE_POPUP" => "N",
					"SHOW_DISCOUNT_PERCENT" => "N",
					"SHOW_FROM_SECTION" => "N",
					"SHOW_MAX_QUANTITY" => "N",
					"SHOW_OLD_PRICE" => "N",
					"SHOW_PRICE_COUNT" => "1",
					"SHOW_SLIDER" => "Y",
					"SLIDER_INTERVAL" => "3000",
					"SLIDER_PROGRESS" => "N",
					"TEMPLATE_THEME" => "blue",
					"USE_ENHANCED_ECOMMERCE" => "N",
					"USE_MAIN_ELEMENT_SECTION" => "N",
					"USE_PRICE_COUNT" => "N",
					"USE_PRODUCT_QUANTITY" => "N"
					)
				);?>
				
			</div>
		</section>
	</div>
	
</main>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>		
