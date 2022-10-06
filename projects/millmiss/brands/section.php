<?
	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
	$APPLICATION->SetPageProperty("title", "Бренды");
	$APPLICATION->SetTitle("Бренды");
?>

<?
	if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
?>

<? $GLOBALS["arrFilter"]["!PROPERTY_NO_ACTIVE"] = 1; ?>
<? $GLOBALS["arrFilter"]["PROPERTY_CML2_MANUFACTURER_VALUE"] = $_GET["brand"]; ?>
<div class="breadcrumbs">
	<div class="container">
		<?$APPLICATION->IncludeComponent(
			"bitrix:breadcrumb", 
			"altasib.breadcrumb_rdf", 
			array(
			"START_FROM" => "0",
			"PATH" => "",
			"SITE_ID" => "-",
			"COMPONENT_TEMPLATE" => "altasib.breadcrumb_rdf"
			),
			false,
			array(
			"HIDE_ICONS" => "N"
			)
		);?>
	</div>
	
</div>
<div class="container">
	<div class="title_section">
		<h1>Товары бренда - "<?=$_GET["brand"]?>"</h1>
		<?$APPLICATION->AddChainItem($_GET["brand"], "");?>
	</div>
</div>
<div class="content-page">
	
    <div class="container">
		<div class="main_content_perfumery brand_content">
			
			<?
				$APPLICATION->IncludeComponent(
				"bitrix:catalog.section", 
				"brand", 
				array(
				"ACTION_VARIABLE" => "action",
				"ADD_PICT_PROP" => "-",
				"ADD_PROPERTIES_TO_BASKET" => "Y",
				"ADD_SECTIONS_CHAIN" => "Y",
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
				"COMPATIBLE_MODE" => "Y",
				"CONVERT_CURRENCY" => "N",
				"CURRENCY_ID" => "RUB",
				"CUSTOM_FILTER" => "",
				"DETAIL_URL" => "",
				"DISABLE_INIT_JS_IN_COMPONENT" => "N",
				"DISPLAY_BOTTOM_PAGER" => "Y",
				"DISPLAY_TOP_PAGER" => "N",
				"ELEMENT_SORT_FIELD" => "shows",
				"ELEMENT_SORT_FIELD2" => "shows",
				"ELEMENT_SORT_ORDER" => "asc",
				"ELEMENT_SORT_ORDER2" => "asc",
				"FILTER_NAME" => "arrFilter",
				"HIDE_NOT_AVAILABLE" => "Y",
				"HIDE_NOT_AVAILABLE_OFFERS" => "Y",
				"IBLOCK_ID" => "1",
				"IBLOCK_TYPE" => "1c_catalog",
				"INCLUDE_SUBSECTIONS" => "Y",
				"LABEL_PROP" => "-",
				"LINE_ELEMENT_COUNT" => "4",
				"MESSAGE_404" => "",
				"MESS_BTN_ADD_TO_BASKET" => "В корзину",
				"MESS_BTN_BUY" => "Купить",
				"MESS_BTN_DETAIL" => "Подробнее",
				"MESS_BTN_SUBSCRIBE" => "Подписаться",
				"MESS_NOT_AVAILABLE" => "Нет в наличии",
				"META_DESCRIPTION" => "-",
				"META_KEYWORDS" => "-",
				"OFFERS_LIMIT" => "5",
				"PAGER_BASE_LINK_ENABLE" => "N",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "N",
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_TEMPLATE" => "scroll2_modern",
				"PAGER_TITLE" => "Товары",
				"PAGE_ELEMENT_COUNT" => "16",
				"PARTIAL_PRODUCT_PROPERTIES" => "N",
				"PRICE_CODE" => array(
				0 => "Розничное",
				),
				"PRICE_VAT_INCLUDE" => "Y",
				"PRODUCT_ID_VARIABLE" => "id",
				"PRODUCT_PROPERTIES" => array(
				),
				"PRODUCT_PROPS_VARIABLE" => "prop",
				"PRODUCT_QUANTITY_VARIABLE" => "quantity",
				"PRODUCT_SUBSCRIPTION" => "N",
				"PROPERTY_CODE" => array(
				0 => "",
				1 => "",
				),
				"SECTION_CODE" => "",
				"SECTION_ID" => "",
				"SECTION_ID_VARIABLE" => "SECTION_ID",
				"SECTION_URL" => "",
				"SECTION_USER_FIELDS" => array(
				0 => "",
				1 => "",
				),
				"SEF_MODE" => "N",
				"SET_BROWSER_TITLE" => "Y",
				"SET_LAST_MODIFIED" => "N",
				"SET_META_DESCRIPTION" => "Y",
				"SET_META_KEYWORDS" => "Y",
				"SET_STATUS_404" => "N",
				"SET_TITLE" => "Y",
				"SHOW_404" => "N",
				"SHOW_ALL_WO_SECTION" => "Y",
				"SHOW_CLOSE_POPUP" => "N",
				"SHOW_DISCOUNT_PERCENT" => "N",
				"SHOW_OLD_PRICE" => "N",
				"SHOW_PRICE_COUNT" => "1",
				"TEMPLATE_THEME" => "site",
				"USE_MAIN_ELEMENT_SECTION" => "N",
				"USE_PRICE_COUNT" => "N",
				"USE_PRODUCT_QUANTITY" => "N",
				"COMPONENT_TEMPLATE" => "brand",
				"DISPLAY_COMPARE" => "N"
				),
				false
				);
			?>
			
		</div>
	</div>
</div>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>