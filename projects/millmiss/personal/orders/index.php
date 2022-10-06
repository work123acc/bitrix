<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Личный кабинет");
?>
<div class="breadcrumbs">
    <div class="container">
	<?
	$APPLICATION->IncludeComponent(
		"bitrix:breadcrumb", "personal", Array(
	    "PATH" => "",
	    "SITE_ID" => "s1",
	    "START_FROM" => "0"
		)
	);
	?>
    </div>
</div>
<div class="container">
    <div class="left-sidebar">
	<div class="sidebar-lk">
	    <p class="title-sidebar">
		Личный кабинет
	    </p>
	    <ul>
		<?
		$APPLICATION->IncludeComponent(
			"bitrix:menu", "cabinetMenu", Array(
		    "ALLOW_MULTI_SELECT" => "N",
		    "CHILD_MENU_TYPE" => "",
		    "DELAY" => "N",
		    "MAX_LEVEL" => "1",
		    "MENU_CACHE_GET_VARS" => array(""),
		    "MENU_CACHE_TIME" => "3600",
		    "MENU_CACHE_TYPE" => "N",
		    "MENU_CACHE_USE_GROUPS" => "Y",
		    "ROOT_MENU_TYPE" => "cabinet",
		    "USE_EXT" => "N"
			)
		);
		?>
	    </ul>
	</div>
    </div>
    <div class="mob_title_lk">
	Личный кабинет
    </div>
    <div class="menu_lk_list">
	<ul>
	    <? /*
	      $APPLICATION->IncludeComponent(
	      "bitrix:menu", "cabinetMenuMobile", Array(
	      "ALLOW_MULTI_SELECT" => "N",
	      "CHILD_MENU_TYPE" => "",
	      "DELAY" => "N",
	      "MAX_LEVEL" => "1",
	      "MENU_CACHE_GET_VARS" => array(""),
	      "MENU_CACHE_TIME" => "3600",
	      "MENU_CACHE_TYPE" => "N",
	      "MENU_CACHE_USE_GROUPS" => "Y",
	      "ROOT_MENU_TYPE" => "cabinet",
	      "USE_EXT" => "N"
	      )
	      ); */
	    ?>
	</ul>
    </div>
    <?
    if ($_GET['order'] === 'status') {
	$sort = 'STATUS';
    } else if ($_GET['order'] === 'price') {
	$sort = 'PRICE';
    } else if ($_GET['order'] === 'number') {
	$sort = 'ACCOUNT_NUMBER';
    } else {
	$sort = 'DATE_INSERT';
    }
    ?>
    <?
    $APPLICATION->IncludeComponent(
	    "bitrix:sale.personal.order.list", "orderList", Array(
	"ACTIVE_DATE_FORMAT" => "",
	"ALLOW_INNER" => "N",
	"CACHE_GROUPS" => "Y",
	"CACHE_TIME" => "3600",
	"CACHE_TYPE" => "A",
	"DEFAULT_SORT" => $sort,
	"HISTORIC_STATUSES" => array(),
	"ID" => "",
	"NAV_TEMPLATE" => "",
	"ONLY_INNER_FULL" => "N",
	"ORDERS_PER_PAGE" => "20",
	"PATH_TO_BASKET" => "",
	"PATH_TO_CANCEL" => "",
	"PATH_TO_CATALOG" => "/catalog/",
	"PATH_TO_COPY" => "",
	"PATH_TO_DETAIL" => "",
	"PATH_TO_PAYMENT" => "payment.php",
	"RESTRICT_CHANGE_PAYSYSTEM" => array("0"),
	"SAVE_IN_SESSION" => "Y",
	"SET_TITLE" => "Y",
	"STATUS_COLOR_F" => "green",
	"STATUS_COLOR_N" => "green",
	"STATUS_COLOR_PSEUDO_CANCELLED" => "green"
	    )
    );
    ?>
</div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>