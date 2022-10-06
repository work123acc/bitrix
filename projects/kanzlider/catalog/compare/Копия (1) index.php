<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("compare");
?><div class="wrap">
	<h1 class="main-title delivery__title">Список сравнения</h1>
	 <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.compare.result", 
	".default", 
	array(
		"ACTION_VARIABLE" => "action",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BASKET_URL" => "/personal/cart/",
		"CONVERT_CURRENCY" => "N",
		"DETAIL_URL" => "",
		"DISPLAY_ELEMENT_SELECT_BOX" => "N",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD_BOX" => "name",
		"ELEMENT_SORT_FIELD_BOX2" => "id",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER_BOX" => "asc",
		"ELEMENT_SORT_ORDER_BOX2" => "desc",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_PICTURE",
			2 => "DETAIL_PICTURE",
		),
		"HIDE_NOT_AVAILABLE" => "N",
		"IBLOCK_ID" => "16",
		"IBLOCK_TYPE" => "1c_catalog",
		"NAME" => "CATALOG_COMPARE_LIST",
		"PRICE_CODE" => array(
			0 => "Розничные",
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_ID_VARIABLE" => "id",
		"PROPERTY_CODE" => array(
			0 => "CML2_ARTICLE",
			1 => "",
		),
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SHOW_PRICE_COUNT" => "1",
		"TEMPLATE_THEME" => "blue",
		"USE_PRICE_COUNT" => "N",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?>
</div>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>