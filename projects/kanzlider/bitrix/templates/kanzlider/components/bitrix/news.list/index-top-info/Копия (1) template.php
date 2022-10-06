<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
	/** @var array $arParams */
	/** @var array $arResult */
	/** @global CMain $APPLICATION */
	/** @global CUser $USER */
	/** @global CDatabase $DB */
	/** @var CBitrixComponentTemplate $this */
	/** @var string $templateName */
	/** @var string $templateFile */
	/** @var string $templateFolder */
	/** @var string $componentPath */
	/** @var CBitrixComponent $component */
	$this->setFrameMode(true);
	
	if ( $arResult['ITEMS'][0] ) {
		$item = $arResult['ITEMS'][0];
	?>
	
	<div class="wrap  top-info__wrap">
		<div class="top-info--left">
			<div class="top-info-welcome">
				
				<div class="top-info-welcome__image">
					<img src="<?= $item['DETAIL_PICTURE']['SRC'] ?>" alt="">
				</div>
				
				<div class="top-info-welcome__text">					
					<?= $item['~PREVIEW_TEXT'] ?>					
					<a class="more  top-info-welcome__more" href="/about_us/">читать полностью</a>
					
					<a href="<?= $item['PROPERTIES']['HREF1']['~VALUE'] ?>" class="adv__button  top-info-welcome__delivery">
						<?= $item['PROPERTIES']['HREF1_TEXT']['~VALUE']['TEXT'] ?>
					</a>
				</div>
			</div>
		</div>
		
		<div class="top-info--right">
			<a href="<?= $item['PROPERTIES']['HREF2']['~VALUE'] ?>" class="adv__button  top-info-opt">
				<?= $item['PROPERTIES']['HREF2_TEXT']['~VALUE']['TEXT'] ?>
			</a>
			
			<div class="top-info-search">
				
				
				<?$APPLICATION->IncludeComponent(
					"bitrix:catalog.search",
					"index-catalog-search",
					Array(
					"ACTION_VARIABLE" => "action",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"BASKET_URL" => "/personal/basket.php",
					"CACHE_TIME" => "36000000",
					"CACHE_TYPE" => "A",
					"CHECK_DATES" => "N",
					"CONVERT_CURRENCY" => "N",
					"DETAIL_URL" => "",
					"DISPLAY_BOTTOM_PAGER" => "Y",
					"DISPLAY_COMPARE" => "N",
					"DISPLAY_TOP_PAGER" => "N",
					"ELEMENT_SORT_FIELD" => "sort",
					"ELEMENT_SORT_FIELD2" => "id",
					"ELEMENT_SORT_ORDER" => "asc",
					"ELEMENT_SORT_ORDER2" => "desc",
					"HIDE_NOT_AVAILABLE" => "N",
					"IBLOCK_ID" => "3",
					"IBLOCK_TYPE" => "1c_catalog",
					"LINE_ELEMENT_COUNT" => "3",
					"NO_WORD_LOGIC" => "N",
					"OFFERS_LIMIT" => "5",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_TEMPLATE" => ".default",
					"PAGER_TITLE" => "Товары",
					"PAGE_ELEMENT_COUNT" => "30",
					"PRICE_CODE" => array("Розничные"),
					"PRICE_VAT_INCLUDE" => "Y",
					"PRODUCT_ID_VARIABLE" => "id",
					"PRODUCT_PROPERTIES" => array("CML2_MANUFACTURER","CML2_TRAITS","CML2_TAXES"),
					"PRODUCT_PROPS_VARIABLE" => "prop",
					"PRODUCT_QUANTITY_VARIABLE" => "quantity",
					"PROPERTY_CODE" => array("CML2_ARTICLE","CML2_BASE_UNIT","CML2_ATTRIBUTES","CML2_BAR_CODE",""),
					"RESTART" => "Y",
					"SECTION_ID_VARIABLE" => "SECTION_ID",
					"SECTION_URL" => "/catalog/",
					"SHOW_PRICE_COUNT" => "1",
					"USE_LANGUAGE_GUESS" => "Y",
					"USE_PRICE_COUNT" => "N",
					"USE_PRODUCT_QUANTITY" => "N"
					)
				);?>				
				
			</div>
		</div>
	</div>
	
<? } ?>

