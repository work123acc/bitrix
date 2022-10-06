<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>
<main class="main">
	<div class="wrap">
		
		<?$APPLICATION->IncludeComponent(
			"bitrix:breadcrumb",
			"altasib.breadcrumb_rdf",
			Array(
			"PATH" => "",
			"SITE_ID" => "s1",
			"START_FROM" => "0"
			)
		);?>

		<?$APPLICATION->IncludeComponent(
			"bitrix:menu",
			"personal-menu",
			Array(
			"ALLOW_MULTI_SELECT" => "N",
			"CHILD_MENU_TYPE" => "left",
			"DELAY" => "N",
			"MAX_LEVEL" => "1",
			"MENU_CACHE_GET_VARS" => array(""),
			"MENU_CACHE_TIME" => "3600",
			"MENU_CACHE_TYPE" => "A",
			"MENU_CACHE_USE_GROUPS" => "Y",
			"ROOT_MENU_TYPE" => "cabinet",
			"USE_EXT" => "N"
			)
		);?>
		
		<?$APPLICATION->IncludeComponent(
			"api:auth.profile",
			"cabinet",
			Array(
			"CHECK_RIGHTS" => "N",
			"CUSTOM_FIELDS" => array(),
			"READONLY_FIELDS" => array(),
			"REQUIRED_FIELDS" => array("EMAIL"),
			"SHOW_LABEL" => "Y",
			"USER_FIELDS" => array("EMAIL")
			)
		);?>
		
	</div>	
</main>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>