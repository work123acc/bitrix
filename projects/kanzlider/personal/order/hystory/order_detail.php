<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
	$APPLICATION->SetTitle("Информация о заказе");
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
			
			<? if ($_GET['order_id']) { ?>
				<?$APPLICATION->IncludeComponent(
					"bitrix:sale.personal.order.detail",
					"detail_order",
					Array(
					"ACTIVE_DATE_FORMAT" => "d.m.Y",
					"ALLOW_INNER" => "Y",
					"CACHE_GROUPS" => "N",
					"CACHE_TIME" => "3600",
					"CACHE_TYPE" => "A",
					"CUSTOM_SELECT_PROPS" => array(""),
					"ID" => $_GET['order_id'],
					"ONLY_INNER_FULL" => "Y",
					"PATH_TO_CANCEL" => "",
					"PATH_TO_COPY" => "",
					"PATH_TO_LIST" => "/personal/order/hystory/",
					"PATH_TO_PAYMENT" => "payment.php",
					"PICTURE_HEIGHT" => "110",
					"PICTURE_RESAMPLE_TYPE" => "1",
					"PICTURE_WIDTH" => "110",
					"PROP_1" => array(),
					"PROP_2" => array(),
					"REFRESH_PRICES" => "N",
					"RESTRICT_CHANGE_PAYSYSTEM" => array("0"),
					"SET_TITLE" => "Y"
					)
				);?>
			<? } ?>
			
		</div>	
	</div>	
</main>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>	