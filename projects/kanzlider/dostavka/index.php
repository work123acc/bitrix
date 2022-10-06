<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
	$APPLICATION->SetTitle("Доставка");
?>
<main class="main"> <section class="delivery">
	<section class="delivery">
		<div class="wrap">
			<div class="delivery__top">
				<h1 class="main-title delivery__title">
				Доставка </h1>
			</div>
			<div class="delivery-content">
				
				<?$APPLICATION->IncludeComponent(
					"bitrix:news.list",
					"dostavka",
					Array(
					"ACTIVE_DATE_FORMAT" => "d.m.Y",
					"ADD_SECTIONS_CHAIN" => "N",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "Y",
					"CACHE_TIME" => "36000000",
					"CACHE_TYPE" => "A",
					"CHECK_DATES" => "Y",
					"DETAIL_URL" => "",
					"DISPLAY_BOTTOM_PAGER" => "N",
					"DISPLAY_DATE" => "Y",
					"DISPLAY_NAME" => "Y",
					"DISPLAY_PICTURE" => "Y",
					"DISPLAY_PREVIEW_TEXT" => "Y",
					"DISPLAY_TOP_PAGER" => "N",
					"FIELD_CODE" => array("ID","NAME","PREVIEW_TEXT","PREVIEW_PICTURE","DETAIL_TEXT","DETAIL_PICTURE",""),
					"FILTER_NAME" => "",
					"HIDE_LINK_WHEN_NO_DETAIL" => "N",
					"IBLOCK_ID" => "10",
					"IBLOCK_TYPE" => "content",
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
					"INCLUDE_SUBSECTIONS" => "Y",
					"MESSAGE_404" => "",
					"NEWS_COUNT" => "1",
					"PAGER_BASE_LINK_ENABLE" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_TEMPLATE" => ".default",
					"PAGER_TITLE" => "Новости",
					"PARENT_SECTION" => "",
					"PARENT_SECTION_CODE" => "",
					"PREVIEW_TRUNCATE_LEN" => "",
					"PROPERTY_CODE" => array("HREF1","HREF1_TEXT","HREF2","HREF2_TEXT","PIC1","PIC2"),
					"SET_BROWSER_TITLE" => "N",
					"SET_LAST_MODIFIED" => "N",
					"SET_META_DESCRIPTION" => "N",
					"SET_META_KEYWORDS" => "N",
					"SET_STATUS_404" => "N",
					"SET_TITLE" => "N",
					"SHOW_404" => "N",
					"SORT_BY1" => "ID",
					"SORT_BY2" => "SORT",
					"SORT_ORDER1" => "ASC",
					"SORT_ORDER2" => "ASC",
					"STRICT_SECTION_CHECK" => "N"
					)
				);?>
				
				<div class="delivery__right">
					
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"",
						Array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"EDIT_TEMPLATE" => "",
						"PATH" => SITE_DIR."include/dostavka-phone.php"
						),
						false
					);?>
					
				</div>
			</div>
		</div>
	</section> 
	
	<section class="delivery__map">
		<div style="max-width: 1425px; margin: auto;">
			<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A35d665e4403c3abf7f22526ba007ee9614db97e394ee000908f2dee322bcffee&amp;width=100%25&amp;height=550&amp;lang=ru_RU&amp;scroll=true"></script>
		</div>
	</section> 
	
	<section class="catalog-page-offer  catalog-page-offer--delivery">
		<div class="wrap">
			
			<?$APPLICATION->IncludeComponent(
				"asd:subscribe.quick.form",
				"catalog-podpiska",
				//"",
				Array(
				"FORMAT" => "html",
				"INC_JQUERY" => "N",
				"NOT_CONFIRM" => "Y",
				"RUBRICS" => array("1"),
				"SHOW_RUBRICS" => "Y"
				)
			);?>
			
		</div>
		<a href="" class="catalog-page-offer__close"></a>
	</section>
	
</main>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>		