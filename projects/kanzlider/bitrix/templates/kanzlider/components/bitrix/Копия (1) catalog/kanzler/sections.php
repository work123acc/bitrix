<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
	
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
	$this->addExternalCss("/bitrix/css/main/bootstrap.css");
?>

<main class="main">
	<section class="catalog-page  clear">
		<div class="catalog-page__top-block">
			<div class="wrap">
				<h1 class="main-title  catalog-page__title">
					<?= $APPLICATION->GetTitle() ?>
				</h1>
				
				<div class="top-info-search  catalog-page__search">
					<?$APPLICATION->IncludeComponent(
						"bitrix:catalog.search",
						"catalog-section-search",
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
						"IBLOCK_ID" => "2",
						"IBLOCK_TYPE" => "1c_catalog",
						"LINE_ELEMENT_COUNT" => "3",
						"NO_WORD_LOGIC" => "N",
						"OFFERS_CART_PROPERTIES" => array("CML2_ARTICLE","CML2_BASE_UNIT","CML2_MANUFACTURER"),
						"OFFERS_FIELD_CODE" => array("ID","NAME","PREVIEW_TEXT","PREVIEW_PICTURE","DETAIL_TEXT","DETAIL_PICTURE",""),
						"OFFERS_LIMIT" => "5",
						"OFFERS_PROPERTY_CODE" => array("CML2_ARTICLE","CML2_BASE_UNIT",""),
						"OFFERS_SORT_FIELD" => "sort",
						"OFFERS_SORT_FIELD2" => "id",
						"OFFERS_SORT_ORDER" => "asc",
						"OFFERS_SORT_ORDER2" => "desc",
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
						"PRODUCT_PROPERTIES" => array(),
						"PRODUCT_PROPS_VARIABLE" => "prop",
						"PRODUCT_QUANTITY_VARIABLE" => "quantity",
						"PROPERTY_CODE" => array("INDEX_NOVINKA","INDEX_SPEC","MAXIMUM_PRICE","MINIMUM_PRICE","CML2_ARTICLE",""),
						"RESTART" => "N",
						"SECTION_ID_VARIABLE" => "SECTION_ID",
						"SECTION_URL" => "",
						"SHOW_PRICE_COUNT" => "1",
						"USE_LANGUAGE_GUESS" => "Y",
						"USE_PRICE_COUNT" => "N",
						"USE_PRODUCT_QUANTITY" => "N"
						)
					);?>
				</div>
				
				<div class="catalog-page__items">
					<div class="wrap  catalog-page__items-wrap  clear">
						
						<? $APPLICATION->IncludeComponent(
							"bitrix:catalog.section.list",
							"catalog-sections",
							array(
							"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
							"IBLOCK_ID" => $arParams["IBLOCK_ID"],
							"CACHE_TYPE" => $arParams["CACHE_TYPE"],
							"CACHE_TIME" => $arParams["CACHE_TIME"],
							"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
							"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
							"TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
							"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
							"VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
							"SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
							"HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
							"ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : '')
							),
							$component,
							array("HIDE_ICONS" => "Y")
							);
						?>
						
					</div>
				</div>
				
			</div>
		</div>
	</section>
	
	<section class="banner">
		<div class="wrap">
			
			<?$APPLICATION->IncludeComponent(
				"kuznica:banner",
				"catalog-banner",
				Array(
				"ADD_NOFOLLOW" => "N",
				"BANTYPE" => "catalog-banner",
				"CACHE_TIME" => "3600000",
				"CACHE_TYPE" => "A",
				"CNT" => "2",
				"HIDE_WIDTH_HEIGHT" => "N",
				"MODE" => "SINGLE"
				)
			);?>
			
		</div>
	</section>
	
	    <section class="catalog-page-offer">
        <div class="wrap">
          <div class="catalog-page-offer__left">
            <div class="catalog-page-offer__desc">вам по секрету:</div>
            <div class="catalog-page-offer__title">дарим скидку <b>500 рублей</b></div>
          </div>
          <div class="catalog-page-offer__right">
            <div class="catalog-page-offer__sub-title">
              просто за подписку на новости
            </div>
                   <?$APPLICATION->IncludeComponent(
	"asd:subscribe.quick.form",
	"",
	Array(
		"FORMAT" => "text",
		"INC_JQUERY" => "N",
		"NOT_CONFIRM" => "Y",
		"RUBRICS" => array("1"),
		"SHOW_RUBRICS" => "N"
	)
);?> 
          </div>
        </div>
        <a href="" class="catalog-page-offer__close"></a>
      </section>
	
</main>