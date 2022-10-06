<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?> 
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.compare.list",
	"",
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