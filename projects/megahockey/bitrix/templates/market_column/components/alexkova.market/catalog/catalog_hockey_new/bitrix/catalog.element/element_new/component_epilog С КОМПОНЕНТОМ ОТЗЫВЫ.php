<?
	if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
	/** @var array $templateData */
	/** @var @global CMain $APPLICATION */
	global $MESS;
	include_once(GetLangFileName(dirname(__FILE__) . '/lang/', '/template.php'));
	
	global $APPLICATION;
	global $moreSettings;
	
	if ($arParams["ZOOM_ON"] == "Y")
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/zoomsl-3.0.js");
	
	if (isset($arParams["DETAIL_DISPLAY_SHOW_VIDEO"]) && $arParams["DETAIL_DISPLAY_SHOW_VIDEO"] == "Y" && (!isset($arParams["VIDEO_PLAYER"]) || $arParams["VIDEO_PLAYER"] == "MEJ")) {
		$APPLICATION->AddHeadScript($templateFolder . "/js/mediaelement-and-player.min.js");
		$APPLICATION->SetAdditionalCSS($templateFolder . '/css/mediaelementplayer.min.css', true);
	}
	
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/slick/slick.js');
	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/js/slick/slick.css', true);
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/fancybox/jquery.fancybox.pack.js');
	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/js/fancybox/jquery.fancybox.css');
	
	$useReview = ('Y' == $arParams['USE_REVIEW']);
	
	
	if (!empty($_REQUEST["offer"]) && isset($arResult["OFFERS"][$_REQUEST["offer"]]))
    $arResult["FIRST_SKU_SELECT"] = $_REQUEST["offer"];
	//$tabsArray=$arResult["TabsArray"];
?>
<?php
	$tabsArray = array();
	//$tabsArray['Бонус'] =\COption::GetOptionString( "askaron.settings", "UF_TAB_BONUS" ); 
	$tabsArray['Описание'] = \COption::GetOptionString( "askaron.settings", "UF_TAB_OPISANIE" );
	$tabsArray['Подарки'] = \COption::GetOptionString( "askaron.settings", "UF_TAB_PODARKI" );
	//$tabsArray['Гарантия'] = \COption::GetOptionString( "askaron.settings", "UF_TAB_GARANTIYA" );
	//$tabsArray['Видео'] = \COption::GetOptionString( "askaron.settings", "UF_TAB_VIDEO" );
	$tabsArray['Система скидок'] = \COption::GetOptionString( "askaron.settings", "UF_TAB_SKIDKI" );
	$tabsArray['Доставка'] = \COption::GetOptionString( "askaron.settings", "UF_TAB_DOSTAVKA" );	
	$tabsArray['Оплата'] = \COption::GetOptionString( "askaron.settings", "UF_TAB_OPLATA" );	
	$tabsArray['Отзывы'] = \COption::GetOptionString( "askaron.settings", "UF_TAB_OTZYVY" );	
	asort($tabsArray);
?>

<div class="bxr-detail-tab bxr-detail-offers tab_detail_text" data-tab="<?= $tabsArray['Описание'] ?>" style="display: block !important;">
    <?= htmlspecialchars_decode($arResult['DETAIL_TEXT']); ?>
</div>

<? if (is_array($arResult["TABS"]) && count($arResult["TABS"]) > 0) { ?>
	<? if ($arResult['PROPERTIES']['SKIDKI']['VALUE'] === 'Y') { ?>
		<div class="bxr-detail-tab bxr-detail-offers" data-tab="<?= $tabsArray['Система скидок'] ?>">
			<?
				$APPLICATION->IncludeComponent(
				"bitrix:main.include", "", Array(
				"AREA_FILE_SHOW" => "file",
				"AREA_FILE_SUFFIX" => "inc",
				"EDIT_TEMPLATE" => "",
				"PATH" => SITE_DIR . "include/discounts.php"
				)
				);
			?> 
		</div>
	<? } ?>
	
	<? if ($arResult['PROPERTIES']['DOSTAVKA']['VALUE'] === 'Y') { ?>
		<div class="bxr-detail-tab bxr-detail-offers" data-tab="<?= $tabsArray['Доставка'] ?>">
			<?
				$APPLICATION->IncludeComponent(
				"bitrix:main.include", "", Array(
				"AREA_FILE_SHOW" => "file",
				"AREA_FILE_SUFFIX" => "inc",
				"EDIT_TEMPLATE" => "",
				"PATH" => SITE_DIR . "include/delivery.php"
				)
				);
			?> 
		</div>
	<? } ?>
	
	<? if ($arResult['PROPERTIES']['OPLATA']['VALUE'] === 'Y') { ?>
		<div class="bxr-detail-tab bxr-detail-offers" data-tab="<?= $tabsArray['Оплата'] ?>">
			<?
				$APPLICATION->IncludeComponent(
				"bitrix:main.include", "", Array(
				"AREA_FILE_SHOW" => "file",
				"AREA_FILE_SUFFIX" => "inc",
				"EDIT_TEMPLATE" => "",
				"PATH" => SITE_DIR . "include/payment.php"
				)
				);
			?> 
		</div>
	<? } ?>
	
	<? if ($arResult['PROPERTIES']['COMMENTS']['VALUE'] === 'Y') { ?>		
		<div class="bxr-detail-tab bxr-detail-offers" data-tab="<?= $tabsArray['Отзывы'] ?>">
			<? $APPLICATION->IncludeComponent("bitrix:catalog.comments",
				"element_otzyv", 
				Array(
				"ELEMENT_ID" => $arResult["ID"],    
				"ELEMENT_CODE" => "",   
				"IBLOCK_ID" => $arParams["IBLOCK_ID"],
				"URL_TO_COMMENT" => "",
				"WIDTH" => "",  
				"COMMENTS_COUNT" => "10",   
				"BLOG_USE" => $arParams["BLOG_USE"],    
				"FB_USE" => $arParams["FB_USE"],    
				"FB_APP_ID" => $arParams["FB_APP_ID"],
				"VK_USE" => $arParams["VK_USE"],    
				"VK_API_ID" => $arParams["VK_API_ID"],
				"CACHE_TYPE" => $arParams["CACHE_TYPE"],    
				"CACHE_TIME" => $arParams["CACHE_TIME"],    
				"BLOG_TITLE" => "",
				"BLOG_URL" => "catalog_comments"."_".SITE_ID,
				"PATH_TO_SMILE" => "",
				"EMAIL_NOTIFY" => $arParams["BLOG_EMAIL_NOTIFY"],
				"AJAX_POST" => "Y",
				"SHOW_SPAM" => "Y",
				"SHOW_RATING" => "N",
				"FB_TITLE" => "",
				"FB_USER_ADMIN_ID" => "",
				"FB_COLORSCHEME" => "light",
				"FB_ORDER_BY" => "reverse_time",
				"VK_TITLE" => "",
				"TEMPLATE_THEME" => $arParams["~TEMPLATE_THEME"],   
				),
				false,
				array("HIDE_ICONS" => "Y")
			);?>
		</div>
	<? } ?>
	
<? } ?>

<?
	//unset($GLOBALS['tabsArray']);
	//unset($GLOBALS['PREVIEW_TEXT']);
?>
</div>
</div>

<script>
	(function($) {
		$(document).ready(function() {
			setTimeout( function() {
				var a = document.getElementsByClassName('tab_detail_text');
				a[0].style.display = 'block';
			}, 1500);
		});
	})(jQuery);
	
</script>															