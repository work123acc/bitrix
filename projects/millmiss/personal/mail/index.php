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
    $APPLICATION->IncludeComponent(
	    "bitrix:main.profile", "mail", Array(
	"CHECK_RIGHTS" => "N",
	"SEND_INFO" => "N",
	"SET_TITLE" => "Y",
	"USER_PROPERTY" => array(),
	"USER_PROPERTY_NAME" => ""
	    )
    );
    ?>
</div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>