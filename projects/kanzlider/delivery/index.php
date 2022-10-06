<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
	$APPLICATION->SetTitle("Доставка");
?>
<main class="main"> 
	
	<section>
		<div class="wrap">
			<div class="jobs__top">
				<h1 class="main-title">Оплата</h1>
			</div>
			<p>Оплату за&nbsp;заказ вы&nbsp;можете произвести</p>
			<ul>
				<li>безналичным расчетом;</li>
				<li>наличными курьеру.</li>
			</ul>
			<h2>Как получить товар с&nbsp;максимальной скидкой?</h2>
			<p>Если сумма оплаченного товара в&nbsp;течение календарного месяца менее 8&nbsp;000&nbsp;рублей, то&nbsp;скидка на&nbsp;следующий месяц&nbsp;&mdash; 0&nbsp;%; <br>
				от&nbsp;8&nbsp;000 рублей&nbsp;&mdash; 1&nbsp;%; <br>
				от&nbsp;10&nbsp;000 рублей&nbsp;&mdash; 2&nbsp;%; <br>
				от&nbsp;12&nbsp;000 рублей&nbsp;&mdash; 3&nbsp;%; <br>
				от&nbsp;15&nbsp;000 рублей&nbsp;&mdash; 4&nbsp;%; <br>
				от&nbsp;18&nbsp;000 рублей&nbsp;&mdash; 5&nbsp;%; <br>
				от&nbsp;20&nbsp;000 рублей&nbsp;&mdash; 6&nbsp;%; <br>
				от&nbsp;22&nbsp;000 рублей&nbsp;&mdash; 7&nbsp;%; <br>
				от&nbsp;24&nbsp;000 рублей&nbsp;&mdash; 8&nbsp;%; <br>
				от&nbsp;26&nbsp;000 рублей&nbsp;&mdash; 9&nbsp;%; <br>
				от&nbsp;28&nbsp;000 рублей&nbsp;&mdash; 10&nbsp;%; <br>
				от&nbsp;30&nbsp;000 рублей&nbsp;&mdash; 11&nbsp;%; <br>
				от&nbsp;32&nbsp;000 рублей&nbsp;&mdash; 12&nbsp;%; <br>
				от&nbsp;34&nbsp;000 рублей&nbsp;&mdash; 13&nbsp;%; <br>
				от&nbsp;36&nbsp;000 рублей&nbsp;&mdash; 14&nbsp;%; <br>
				от&nbsp;38&nbsp;000 рублей&nbsp;&mdash; 15&nbsp;%; <br>
				от&nbsp;40&nbsp;000 рублей&nbsp;&mdash; 16&nbsp;%; <br>
				от&nbsp;42&nbsp;000 рублей&nbsp;&mdash; 17&nbsp;%; <br>
			от&nbsp;45&nbsp;000 рублей&nbsp;&mdash; 18&nbsp;%.</p>
			<p>Скидка не&nbsp;распространяется на&nbsp;товар по&nbsp;спеццене.</p>
		</div>
	</section> 
	
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
			<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A87e725cd8e9d6605b39ef6ce7e7055073a02f8e9f3427164d1940379a074aba7&amp;width=100%25&amp;height=560&amp;lang=ru_RU&amp;scroll=true"></script>
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
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>