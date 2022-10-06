<?use Alexkova\Market\Core;

$BXReady = \Alexkova\Market\Core::getInstance();
?>

<?
// LeftMenu
global $arLeftMenu;
if (strlen($arLeftMenu["TYPE"])) {
	switch ($arLeftMenu["TYPE"]) {
		case "with_catalog": $BXReady->setAreaType('left_menu_type', 'v3'); break;
		case "only_catalog": $BXReady->setAreaType('left_menu_type', 'v2'); break;
		case "without_catalog": $BXReady->setAreaType('left_menu_type', 'v1'); break;
	}
}
if ($BXReady->getArea('left_menu_type')){
	include($BXReady->getAreaPath('left_menu_type'));
};
// end LeftMenu
?>

<?if (CModule::IncludeModule('sender')):?>
<?$APPLICATION->IncludeComponent("alexkova.market:sender.subscribe", "market_column", array(
	"COMPONENT_TEMPLATE" => "market_column",
		"USE_PERSONALIZATION" => "Y",
		"SHOW_HIDDEN" => "N",
		"PAGE" => "/site2/personal/subscribe/subscr_edit.php",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"SHOW_RUBRICS" => "Y"
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "N"
	)
);?>
<?endif;?>



<?Alexkova\Market\Core::getInstance()->showBannerPlace("LEFT");?>

<? if ($_SERVER["PHP_SELF"] !== '/personal/basket/index.php'){ ?>
	<?$APPLICATION->IncludeComponent(
		"bitrix:main.include",
		"named_area",
		Array(
			"AREA_FILE_SHOW" => "file",
			"AREA_FILE_SUFFIX" => "inc",
			"EDIT_TEMPLATE" => "",
			"PATH" => SITE_DIR."include/banner_link_dvizhenie.php",
			"INCLUDE_PTITLE" => GetMessage("GHANGE_FOOTER_CATALOG")
		),
		false
	);?>
<? } ?>
