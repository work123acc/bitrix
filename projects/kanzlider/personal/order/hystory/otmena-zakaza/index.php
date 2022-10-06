<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
	$APPLICATION->SetTitle("Отмена заказа");
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
		<h1 class="main-title">
			<?= $APPLICATION->GetTitle(); ?>
		</h1>
		
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
		
		<div class="personal_right_section col-md-9 col-sm-12">
			<?$APPLICATION->IncludeComponent(
				"bitrix:sale.personal.order.cancel",
				"order_cancel",
				Array(
				"ID" => $_REQUEST['order_id'],
				"PATH_TO_DETAIL" => "",
				"PATH_TO_LIST" => "/personal/order/hystory/",
				"SET_TITLE" => "Y"
				)
			);?>
		</div>	
	</div>	
</main>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>