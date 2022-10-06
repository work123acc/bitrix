<?
	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
	$APPLICATION->SetTitle("История заказов");
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
			
			<?
				$APPLICATION->IncludeComponent(
					"bitrix:sale.personal.order.list", 
					"order_hystory", 
					array(
						"ACTIVE_DATE_FORMAT" => "d.m.Y",
						"ALLOW_INNER" => "N",
						"CACHE_GROUPS" => "Y",
						"CACHE_TIME" => "3600",
						"CACHE_TYPE" => "A",
						"DEFAULT_SORT" => "ID",
						"HISTORIC_STATUSES" => array(
							0 => "F",
						),
						"ID" => $ID,
						"NAV_TEMPLATE" => "",
						"ONLY_INNER_FULL" => "N",
						"ORDERS_PER_PAGE" => "20",
						"PATH_TO_BASKET" => "/personal/cart/",
						"PATH_TO_CANCEL" => "/personal/order/hystory/otmena-zakaza/?order_id=#ID#",
						"PATH_TO_CATALOG" => "/catalog/",
						"PATH_TO_COPY" => "",
						"PATH_TO_DETAIL" => "",
						"PATH_TO_PAYMENT" => "/personal/order/hystory/payment/",
						"RESTRICT_CHANGE_PAYSYSTEM" => array(
							0 => "0",
						),
						"SAVE_IN_SESSION" => "Y",
						"SET_TITLE" => "Y",
						"STATUS_COLOR_F" => "gray",
						"STATUS_COLOR_N" => "green",
						"STATUS_COLOR_PSEUDO_CANCELLED" => "red",
						"COMPONENT_TEMPLATE" => "order_hystory",
						"REFRESH_PRICES" => "N",
						"STATUS_COLOR_wt" => "gray"
					),
					false
				);
				
			?>
		</div>	
	</div>	
</main>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>				