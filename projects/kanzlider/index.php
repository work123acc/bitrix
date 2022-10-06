<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("");?>
<?$page = $APPLICATION->GetCurPage();?>
<main class="main  main--with-sidebar <?if($page=='/'){?> index-main <?}?>">
	<section class="top-info">

		<?$APPLICATION->IncludeComponent(
			"bitrix:news.list",
			"index-top-info",
			Array(
				"ACTIVE_DATE_FORMAT" => "d.m.Y",
				"ADD_SECTIONS_CHAIN" => "Y",
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
				"DISPLAY_BOTTOM_PAGER" => "Y",
				"DISPLAY_DATE" => "Y",
				"DISPLAY_NAME" => "Y",
				"DISPLAY_PICTURE" => "Y",
				"DISPLAY_PREVIEW_TEXT" => "Y",
				"DISPLAY_TOP_PAGER" => "N",
				"FIELD_CODE" => array("ID","NAME","PREVIEW_TEXT","DETAIL_PICTURE",""),
				"FILTER_NAME" => "",
				"HIDE_LINK_WHEN_NO_DETAIL" => "N",
				"IBLOCK_ID" => "10",
				"IBLOCK_TYPE" => "content",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
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
				"PROPERTY_CODE" => array("HREF1","HREF1_TEXT","HREF2","HREF2_TEXT","","","","","","","","","","",""),
				"SET_BROWSER_TITLE" => "Y",
				"SET_LAST_MODIFIED" => "N",
				"SET_META_DESCRIPTION" => "Y",
				"SET_META_KEYWORDS" => "Y",
				"SET_STATUS_404" => "N",
				"SET_TITLE" => "Y",
				"SHOW_404" => "N",
				"SORT_BY1" => "ID",
				"SORT_BY2" => "SORT",
				"SORT_ORDER1" => "DESC",
				"SORT_ORDER2" => "ASC",
				"STRICT_SECTION_CHECK" => "N"
			)
		);?>

	</section>


	<div class="sidebar">
		<aside class="sidebar-menu__box">
			<div class="sidebar-menu__current-box">
				<ul class="sidebar-menu__menu">
					<li>

						<?$APPLICATION->IncludeComponent(
							"bitrix:menu",
							"element-active-menu",
							Array(
								"ALLOW_MULTI_SELECT" => "N",
								"CHILD_MENU_TYPE" => "left",
								"DELAY" => "N",
								"MAX_LEVEL" => "2",
								"MENU_CACHE_GET_VARS" => array(""),
								"MENU_CACHE_TIME" => "3600",
								"MENU_CACHE_TYPE" => "A",
								"MENU_CACHE_USE_GROUPS" => "Y",
								"ROOT_MENU_TYPE" => "left",
								"USE_EXT" => "Y"
							)
						);?>

					</li>
				</ul>
			</div>
			<div class="sidebar-menu__menu">

				<?$APPLICATION->IncludeComponent(
					"bitrix:menu",
					"element-left-menu",
					Array(
						"ALLOW_MULTI_SELECT" => "N",
						"CHILD_MENU_TYPE" => "left",
						"DELAY" => "N",
						"MAX_LEVEL" => "2",
						"MENU_CACHE_GET_VARS" => array(""),
						"MENU_CACHE_TIME" => "3600",
						"MENU_CACHE_TYPE" => "A",
						"MENU_CACHE_USE_GROUPS" => "Y",
						"ROOT_MENU_TYPE" => "left",
						"USE_EXT" => "Y"
					)
				);?>

			</div>
		</aside>
		<aside class="sidebar-news" style="display: none;">
			<div class="sidebar-news__title">
				Свежая новость
			</div>
			<div class="sidebar-news__new">

				<?$APPLICATION->IncludeComponent(
					"bitrix:news.list",
					"tovar-svezhaya-novost",
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
						"IBLOCK_ID" => "4",
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
						"PROPERTY_CODE" => array("",""),
						"SET_BROWSER_TITLE" => "N",
						"SET_LAST_MODIFIED" => "N",
						"SET_META_DESCRIPTION" => "N",
						"SET_META_KEYWORDS" => "N",
						"SET_STATUS_404" => "N",
						"SET_TITLE" => "N",
						"SHOW_404" => "N",
						"SORT_BY1" => "ID",
						"SORT_BY2" => "SORT",
						"SORT_ORDER1" => "DESC",
						"SORT_ORDER2" => "ASC",
						"STRICT_SECTION_CHECK" => "N"
					)
				);?>



			</div>
			<a href="/news/" class="sidebar-news__more">
				Архив новостей
			</a>
		</aside>
	</div>


	<div class="wrap wrap--with-sidebar">

		<section class="goods  goods--category card">
			<div class="wrap for_slider">


				<?$APPLICATION->IncludeComponent(
					"bitrix:news.list",
					"slider_special",
					Array(
						"ACTIVE_DATE_FORMAT" => "d.m.Y",
						"ADD_SECTIONS_CHAIN" => "Y",
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
						"DISPLAY_BOTTOM_PAGER" => "Y",
						"DISPLAY_DATE" => "Y",
						"DISPLAY_NAME" => "Y",
						"DISPLAY_PICTURE" => "Y",
						"DISPLAY_PREVIEW_TEXT" => "Y",
						"DISPLAY_TOP_PAGER" => "N",
						"FIELD_CODE" => array("NAME","PREVIEW_TEXT","PREVIEW_PICTURE",""),
						"FILTER_NAME" => "",
						"HIDE_LINK_WHEN_NO_DETAIL" => "N",
						"IBLOCK_ID" => "6",
						"IBLOCK_TYPE" => "content",
						"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
						"INCLUDE_SUBSECTIONS" => "Y",
						"MESSAGE_404" => "",
						"NEWS_COUNT" => "20",
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
						"PROPERTY_CODE" => array("NOVINKI",""),
						"SET_BROWSER_TITLE" => "Y",
						"SET_LAST_MODIFIED" => "N",
						"SET_META_DESCRIPTION" => "Y",
						"SET_META_KEYWORDS" => "Y",
						"SET_STATUS_404" => "N",
						"SET_TITLE" => "Y",
						"SHOW_404" => "N",
						"SORT_BY1" => "ACTIVE_FROM",
						"SORT_BY2" => "SORT",
						"SORT_ORDER1" => "DESC",
						"SORT_ORDER2" => "ASC",
						"STRICT_SECTION_CHECK" => "N"
					)
				);?>

				<div class="main-catalog-claster1">
					<div class="main-catalog-offers1">



					</div>


					<?$GLOBALS['length'] = 3;?>
					<?$APPLICATION->IncludeComponent(
						"bitrix:catalog.section.list",
						"index-section-list",
						Array(
							"ADD_SECTIONS_CHAIN" => "Y",
							"CACHE_GROUPS" => "Y",
							"CACHE_TIME" => "36000000",
							"CACHE_TYPE" => "A",
							"COUNT_ELEMENTS" => "Y",
							"IBLOCK_ID" => $indexCatalogID,
							"IBLOCK_TYPE" => "1c_catalog",
							"SECTION_CODE" => "",
							"SECTION_FIELDS" => array("ID","NAME","PICTURE","DETAIL_PICTURE",""),
							"SECTION_ID" => "",
							"SECTION_URL" => "",
							"SECTION_USER_FIELDS" => array("",""),
							"SHOW_PARENT_NAME" => "Y",
							"TOP_DEPTH" => "4",
							"VIEW_MODE" => "LINE"
						)
					);?>

				</div></div> </section> <div style="clear:both;"> </div>

		<section class="main-catalog  clear" style="display:none;">
			<div class="wrap">
				<div class="main-catalog-left-claster">
					<h1 class="main-title main-catalog__catalog-title">Каталог товаров</h1>

					<div class="main-catalog-claster">
						<div class="main-catalog-item  main-catalog-item--first">


							<? //-------------------------Выбор раздела с детальной картинкой----------------------------

							$id = "";
							$indexCatalogID = 15;
							$res = CIBlockSection::GetList( Array("SORT"=>"ASC"), array("IBLOCK_ID"=> $indexCatalogID, "UF_SECTION_HEAD_IMG"=>1), false, Array("ID", "NAME", "PREVIEW_TEXT", "UF_SECTION_HEAD_IMG"), false);
							while($ob = $res->GetNext()) {
								$id = $ob['ID'];
							}
							?>

							<?$APPLICATION->IncludeComponent(
								"bitrix:catalog.section.list",
								"index-mebel-slide",
								Array(
									"ADD_SECTIONS_CHAIN" => "Y",
									"CACHE_GROUPS" => "Y",
									"CACHE_TIME" => "36000000",
									"CACHE_TYPE" => "A",
									"COUNT_ELEMENTS" => "Y",
									"FILTER_NAME" => "aaa",
									"IBLOCK_ID" => $indexCatalogID,
									//"IBLOCK_TYPE" => "catalogs",
									"IBLOCK_TYPE" => "1c_catalog",
									"SECTION_CODE" => "",
									"SECTION_FIELDS" => array("ID","NAME","DESCRIPTION","PICTURE","DETAIL_PICTURE",""),
									"SECTION_ID" => $id,
									"SECTION_URL" => "",
									"SECTION_USER_FIELDS" => array("UF_SECTION_HEAD_IMG",""),
									"SHOW_PARENT_NAME" => "Y",
									"TOP_DEPTH" => "4",
									"VIEW_MODE" => "LINE"
								)
							);?>

						</div>

						<?$GLOBALS['length'] = 4;?>
						<?$APPLICATION->IncludeComponent(
							"bitrix:catalog.section.list",
							"index-section-list",
							Array(
								"ADD_SECTIONS_CHAIN" => "Y",
								"CACHE_GROUPS" => "Y",
								"CACHE_TIME" => "36000000",
								"CACHE_TYPE" => "A",
								"COUNT_ELEMENTS" => "Y",
								"IBLOCK_ID" => $indexCatalogID,
								//"IBLOCK_TYPE" => "catalogs",
								"IBLOCK_TYPE" => "1c_catalog",
								"SECTION_CODE" => "",
								"SECTION_FIELDS" => array("ID","NAME","PICTURE","DETAIL_PICTURE",""),
								"SECTION_ID" => "",
								"SECTION_URL" => "",
								"SECTION_USER_FIELDS" => array("",""),
								"SHOW_PARENT_NAME" => "Y",
								"TOP_DEPTH" => "4",
								"VIEW_MODE" => "LINE"
							)
						);?>

					</div>

					<div class="main-catalog-claster">
						<?$GLOBALS['length'] = 8;?>
						<?$APPLICATION->IncludeComponent(
							"bitrix:catalog.section.list",
							"index-section-list",
							Array(
								"ADD_SECTIONS_CHAIN" => "Y",
								"CACHE_GROUPS" => "Y",
								"CACHE_TIME" => "36000000",
								"CACHE_TYPE" => "A",
								"COUNT_ELEMENTS" => "Y",
								"IBLOCK_ID" => $indexCatalogID,
								//"IBLOCK_TYPE" => "catalogs",
								"IBLOCK_TYPE" => "1c_catalog",
								"SECTION_CODE" => "",
								"SECTION_FIELDS" => array("ID","NAME","PICTURE","DETAIL_PICTURE",""),
								"SECTION_ID" => "",
								"SECTION_URL" => "",
								"SECTION_USER_FIELDS" => array("",""),
								"SHOW_PARENT_NAME" => "Y",
								"TOP_DEPTH" => "4",
								"VIEW_MODE" => "LINE"
							)
						);?>
					</div>
				</div>


				<div class="main-catalog-right-calster">
					<h2 class="main-title main-catalog__offers-title">Специальные предложения</h2>
					<div class="main-catalog-claster">
						<div class="main-catalog-offers">

							<?$APPLICATION->IncludeComponent(
								"bitrix:news.list",
								"catalog-spec-slider",
								Array(
									"ACTIVE_DATE_FORMAT" => "d.m.Y",
									"ADD_SECTIONS_CHAIN" => "Y",
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
									"DISPLAY_BOTTOM_PAGER" => "Y",
									"DISPLAY_DATE" => "Y",
									"DISPLAY_NAME" => "Y",
									"DISPLAY_PICTURE" => "Y",
									"DISPLAY_PREVIEW_TEXT" => "Y",
									"DISPLAY_TOP_PAGER" => "N",
									"FIELD_CODE" => array("NAME","PREVIEW_TEXT","PREVIEW_PICTURE",""),
									"FILTER_NAME" => "",
									"HIDE_LINK_WHEN_NO_DETAIL" => "N",
									"IBLOCK_ID" => "6",
									"IBLOCK_TYPE" => "content",
									"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
									"INCLUDE_SUBSECTIONS" => "Y",
									"MESSAGE_404" => "",
									"NEWS_COUNT" => "20",
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
									"PROPERTY_CODE" => array("NOVINKI",""),
									"SET_BROWSER_TITLE" => "Y",
									"SET_LAST_MODIFIED" => "N",
									"SET_META_DESCRIPTION" => "Y",
									"SET_META_KEYWORDS" => "Y",
									"SET_STATUS_404" => "N",
									"SET_TITLE" => "Y",
									"SHOW_404" => "N",
									"SORT_BY1" => "ACTIVE_FROM",
									"SORT_BY2" => "SORT",
									"SORT_ORDER1" => "DESC",
									"SORT_ORDER2" => "ASC",
									"STRICT_SECTION_CHECK" => "N"
								)
							);?>

						</div>


						<?$GLOBALS['length'] = 3;?>
						<?$APPLICATION->IncludeComponent(
							"bitrix:catalog.section.list",
							"index-section-list",
							Array(
								"ADD_SECTIONS_CHAIN" => "Y",
								"CACHE_GROUPS" => "Y",
								"CACHE_TIME" => "36000000",
								"CACHE_TYPE" => "A",
								"COUNT_ELEMENTS" => "Y",
								"IBLOCK_ID" => $indexCatalogID,
								//"IBLOCK_TYPE" => "catalogs",
								"IBLOCK_TYPE" => "1c_catalog",
								"SECTION_CODE" => "",
								"SECTION_FIELDS" => array("ID","NAME","PICTURE","DETAIL_PICTURE",""),
								"SECTION_ID" => "",
								"SECTION_URL" => "",
								"SECTION_USER_FIELDS" => array("",""),
								"SHOW_PARENT_NAME" => "Y",
								"TOP_DEPTH" => "4",
								"VIEW_MODE" => "LINE"
							)
						);?>

					</div>
					<div class="main-catalog-claster">

						<?$GLOBALS['length'] = 4;?>
						<?$APPLICATION->IncludeComponent(
							"bitrix:catalog.section.list",
							"index-section-list",
							Array(
								"ADD_SECTIONS_CHAIN" => "Y",
								"CACHE_GROUPS" => "Y",
								"CACHE_TIME" => "36000000",
								"CACHE_TYPE" => "A",
								"COUNT_ELEMENTS" => "Y",
								"IBLOCK_ID" => $indexCatalogID,
								//"IBLOCK_TYPE" => "catalogs",
								"IBLOCK_TYPE" => "1c_catalog",
								"SECTION_CODE" => "",
								"SECTION_FIELDS" => array("ID","NAME","PICTURE","DETAIL_PICTURE",""),
								"SECTION_ID" => "",
								"SECTION_URL" => "",
								"SECTION_USER_FIELDS" => array("",""),
								"SHOW_PARENT_NAME" => "Y",
								"TOP_DEPTH" => "4",
								"VIEW_MODE" => "LINE"
							)
						);?>

						<?
						if ($GLOBALS['finalLength'] < $GLOBALS['full']) { ?>
						<div class="main-catalog-item  main-catalog-item--last">
							<a href="/catalog/" class="main-catalog-item-title">Смотреть<br>полный каталог</a>
							</a>
							<? } ?>

						</div>
					</div>
				</div>
		</section>




		<section class="goods  goods--news">
			<div class="wrap">
				<div class="goods__title-box">
					<h2 class="main-title goods__title">
						Новинки каталога
					</h2>
					<a href="/catalog/new/" class="page-more  goods__more">Смотреть все</a>
				</div>

				<?
				$GLOBALS['arrFilterNovinki'] = array('PROPERTY_INDEX_NOVINKA' => array('VALUE' => 'Y') );
				$APPLICATION->IncludeComponent(
					"bitrix:catalog.top",
					"index-catalog-top-novinki",
					Array(
						"ACTION_VARIABLE" => "action",
						"ADD_PICT_PROP" => "-",
						"ADD_PROPERTIES_TO_BASKET" => "Y",
						"ADD_TO_BASKET_ACTION" => "ADD",
						"BASKET_URL" => "/personal/basket.php",
						"CACHE_FILTER" => "N",
						"CACHE_GROUPS" => "Y",
						"CACHE_TIME" => "36000000",
						"CACHE_TYPE" => "A",
						"COMPARE_NAME" => "CATALOG_COMPARE_LIST",
						"COMPARE_PATH" => "",
						"COMPATIBLE_MODE" => "Y",
						"CONVERT_CURRENCY" => "N",
						"CUSTOM_FILTER" => "",
						"DETAIL_URL" => "/catalog/#SECTION_CODE#/#ELEMENT_CODE#.html",
						"DISPLAY_COMPARE" => "Y",
						"ELEMENT_COUNT" => "4",
						"ELEMENT_SORT_FIELD" => "sort",
						"ELEMENT_SORT_FIELD2" => "id",
						"ELEMENT_SORT_ORDER" => "asc",
						"ELEMENT_SORT_ORDER2" => "desc",
						"ENLARGE_PRODUCT" => "STRICT",
						"FILTER_NAME" => "arrFilterNovinki",
						"HIDE_NOT_AVAILABLE" => "Y",
						"HIDE_NOT_AVAILABLE_OFFERS" => "Y",
						"IBLOCK_ID" => "15",
						"IBLOCK_TYPE" => "1c_catalog",
						"LABEL_PROP" => array(),
						"LINE_ELEMENT_COUNT" => "5",
						"MESS_BTN_ADD_TO_BASKET" => "В корзину",
						"MESS_BTN_BUY" => "Купить",
						"MESS_BTN_COMPARE" => "Сравнить",
						"MESS_BTN_DETAIL" => "Подробнее",
						"MESS_NOT_AVAILABLE" => "Нет в наличии",
						"OFFERS_CART_PROPERTIES" => array("CML2_ARTICLE","CML2_BASE_UNIT","CML2_MANUFACTURER","CML2_TRAITS","CML2_TAXES","CML2_ATTRIBUTES","CML2_BAR_CODE"),
						"OFFERS_FIELD_CODE" => array("ID","NAME","PREVIEW_TEXT","PREVIEW_PICTURE","DETAIL_TEXT","DETAIL_PICTURE","IBLOCK_NAME",""),
						"OFFERS_LIMIT" => "5",
						"OFFERS_PROPERTY_CODE" => array("CML2_ARTICLE","CML2_BASE_UNIT","MORE_PHOTO","CML2_MANUFACTURER","CML2_TRAITS","CML2_TAXES","FILES","CML2_ATTRIBUTES","CML2_BAR_CODE",""),
						"OFFERS_SORT_FIELD" => "sort",
						"OFFERS_SORT_FIELD2" => "id",
						"OFFERS_SORT_ORDER" => "asc",
						"OFFERS_SORT_ORDER2" => "desc",
						"PARTIAL_PRODUCT_PROPERTIES" => "N",
						"PRICE_CODE" => array("Розничные"),
						"PRICE_VAT_INCLUDE" => "Y",
						"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons,compare",
						"PRODUCT_DISPLAY_MODE" => "N",
						"PRODUCT_ID_VARIABLE" => "id",
						"PRODUCT_PROPERTIES" => array("CML2_MANUFACTURER","CML2_TRAITS","CML2_TAXES","CML2_ATTRIBUTES"),
						"PRODUCT_PROPS_VARIABLE" => "prop",
						"PRODUCT_QUANTITY_VARIABLE" => "quantity",
						"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
						"PRODUCT_SUBSCRIPTION" => "Y",
						"PROPERTY_CODE" => array("CML2_ARTICLE","CML2_BASE_UNIT","CML2_MANUFACTURER","CML2_TRAITS","CML2_TAXES","CML2_ATTRIBUTES","CML2_BAR_CODE",""),
						"PROPERTY_CODE_MOBILE" => array("CML2_BASE_UNIT"),
						"SECTION_ID_VARIABLE" => "SECTION_ID",
						"SECTION_URL" => "",
						"SEF_MODE" => "N",
						"SHOW_CLOSE_POPUP" => "N",
						"SHOW_DISCOUNT_PERCENT" => "N",
						"SHOW_MAX_QUANTITY" => "N",
						"SHOW_OLD_PRICE" => "N",
						"SHOW_PRICE_COUNT" => "1",
						"SHOW_SLIDER" => "Y",
						"SLIDER_INTERVAL" => "3000",
						"SLIDER_PROGRESS" => "N",
						"TEMPLATE_THEME" => "blue",
						"USE_ENHANCED_ECOMMERCE" => "N",
						"USE_PRICE_COUNT" => "N",
						"USE_PRODUCT_QUANTITY" => "N",
						"VIEW_MODE" => "SECTION"
					)
				);?>

			</div>
		</section>

		<section class="goods  goods--special">
			<div class="wrap">
				<div class="goods__title-box">
					<h2 class="main-title goods__title">
						Спецпредложения
					</h2>
					<a href="/catalog/spec/" class="page-more  goods__more">Смотреть все</a>
				</div>


				<?
				$GLOBALS['arrFilterSpec'] = array('PROPERTY_INDEX_SPEC' => array('VALUE' => 'Y') );
				$APPLICATION->IncludeComponent(
					"bitrix:catalog.top",
					"index-catalog-top-spec",
					Array(
						"ACTION_VARIABLE" => "action",
						"ADD_PICT_PROP" => "-",
						"ADD_PROPERTIES_TO_BASKET" => "Y",
						"ADD_TO_BASKET_ACTION" => "ADD",
						"BASKET_URL" => "/personal/basket.php",
						"CACHE_FILTER" => "N",
						"CACHE_GROUPS" => "Y",
						"CACHE_TIME" => "36000000",
						"CACHE_TYPE" => "A",
						"COMPARE_NAME" => "CATALOG_COMPARE_LIST",
						"COMPARE_PATH" => "",
						"COMPATIBLE_MODE" => "Y",
						"CONVERT_CURRENCY" => "N",
						"CUSTOM_FILTER" => "",
						"DETAIL_URL" => "/catalog/#SECTION_CODE#/#ELEMENT_CODE#.html",
						"DISPLAY_COMPARE" => "Y",
						"ELEMENT_COUNT" => "4",
						"ELEMENT_SORT_FIELD" => "timestamp_x",
						"ELEMENT_SORT_FIELD2" => "id",
						"ELEMENT_SORT_ORDER" => "desc",
						"ELEMENT_SORT_ORDER2" => "desc",
						"ENLARGE_PRODUCT" => "STRICT",
						"FILTER_NAME" => "arrFilterSpec",
						"HIDE_NOT_AVAILABLE" => "Y",
						"HIDE_NOT_AVAILABLE_OFFERS" => "Y",
						"IBLOCK_ID" => "15",
						"IBLOCK_TYPE" => "1c_catalog",
						"LABEL_PROP" => array(),
						"LINE_ELEMENT_COUNT" => "5",
						"MESS_BTN_ADD_TO_BASKET" => "В корзину",
						"MESS_BTN_BUY" => "Купить",
						"MESS_BTN_COMPARE" => "Сравнить",
						"MESS_BTN_DETAIL" => "Подробнее",
						"MESS_NOT_AVAILABLE" => "Нет в наличии",
						"OFFERS_CART_PROPERTIES" => array("CML2_ARTICLE","CML2_BASE_UNIT","CML2_MANUFACTURER","CML2_TRAITS","CML2_TAXES","CML2_ATTRIBUTES","CML2_BAR_CODE"),
						"OFFERS_FIELD_CODE" => array("ID","NAME","PREVIEW_TEXT","PREVIEW_PICTURE","DETAIL_TEXT","DETAIL_PICTURE","IBLOCK_NAME",""),
						"OFFERS_LIMIT" => "5",
						"OFFERS_PROPERTY_CODE" => array("CML2_ARTICLE","CML2_BASE_UNIT","MORE_PHOTO","CML2_MANUFACTURER","CML2_TRAITS","CML2_TAXES","FILES","CML2_ATTRIBUTES","CML2_BAR_CODE",""),
						"OFFERS_SORT_FIELD" => "sort",
						"OFFERS_SORT_FIELD2" => "id",
						"OFFERS_SORT_ORDER" => "asc",
						"OFFERS_SORT_ORDER2" => "desc",
						"PARTIAL_PRODUCT_PROPERTIES" => "N",
						"PRICE_CODE" => array("Розничные"),
						"PRICE_VAT_INCLUDE" => "Y",
						"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons,compare",
						"PRODUCT_DISPLAY_MODE" => "N",
						"PRODUCT_ID_VARIABLE" => "id",
						"PRODUCT_PROPERTIES" => array("CML2_MANUFACTURER","CML2_TRAITS","CML2_TAXES","CML2_ATTRIBUTES"),
						"PRODUCT_PROPS_VARIABLE" => "prop",
						"PRODUCT_QUANTITY_VARIABLE" => "quantity",
						"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
						"PRODUCT_SUBSCRIPTION" => "Y",
						"PROPERTY_CODE" => array("CML2_ARTICLE","CML2_BASE_UNIT","CML2_MANUFACTURER","CML2_TRAITS","CML2_TAXES","CML2_ATTRIBUTES","CML2_BAR_CODE",""),
						"PROPERTY_CODE_MOBILE" => array("CML2_BASE_UNIT"),
						"SECTION_ID_VARIABLE" => "SECTION_ID",
						"SECTION_URL" => "",
						"SEF_MODE" => "N",
						"SHOW_CLOSE_POPUP" => "N",
						"SHOW_DISCOUNT_PERCENT" => "N",
						"SHOW_MAX_QUANTITY" => "N",
						"SHOW_OLD_PRICE" => "N",
						"SHOW_PRICE_COUNT" => "1",
						"SHOW_SLIDER" => "Y",
						"SLIDER_INTERVAL" => "3000",
						"SLIDER_PROGRESS" => "N",
						"TEMPLATE_THEME" => "blue",
						"USE_ENHANCED_ECOMMERCE" => "N",
						"USE_PRICE_COUNT" => "N",
						"USE_PRODUCT_QUANTITY" => "N",
						"VIEW_MODE" => "SECTION"
					)
				);?>



			</div>
		</section>


	</div>


	<div style="height: 45px;"> </div>
	<div style="clear: both;"> </div>
</main>
<main class="main">
	<section class="main-news">
		<div class="wrap  main-news__wrap">
			<div class="main-news__title-box">
				<h2 class="main-title  main-news__title">
					Новости компании
				</h2>
				<a href="/news/" class="main-news__archive">Архив новостей</a>
			</div>

			<div class="main-news__content">

				<?$APPLICATION->IncludeComponent(
					"bitrix:news.list",
					"novosti-kompanii",
					Array(
						"ACTIVE_DATE_FORMAT" => "Y-m-d",
						"ADD_SECTIONS_CHAIN" => "Y",
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
						"DISPLAY_BOTTOM_PAGER" => "Y",
						"DISPLAY_DATE" => "Y",
						"DISPLAY_NAME" => "Y",
						"DISPLAY_PICTURE" => "Y",
						"DISPLAY_PREVIEW_TEXT" => "Y",
						"DISPLAY_TOP_PAGER" => "N",
						"FIELD_CODE" => array("ID","NAME","PREVIEW_TEXT","DETAIL_PICTURE","DATE_CREATE","TIMESTAMP_X",""),
						"FILTER_NAME" => "",
						"HIDE_LINK_WHEN_NO_DETAIL" => "N",
						"IBLOCK_ID" => "4",
						"IBLOCK_TYPE" => "content",
						"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
						"INCLUDE_SUBSECTIONS" => "Y",
						"MESSAGE_404" => "",
						"NEWS_COUNT" => "4",
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
						"PROPERTY_CODE" => array("",""),
						"SET_BROWSER_TITLE" => "Y",
						"SET_LAST_MODIFIED" => "N",
						"SET_META_DESCRIPTION" => "Y",
						"SET_META_KEYWORDS" => "Y",
						"SET_STATUS_404" => "N",
						"SET_TITLE" => "Y",
						"SHOW_404" => "N",
						"SORT_BY1" => "SORT",
						"SORT_BY2" => "ID",
						"SORT_ORDER1" => "ASC",
						"SORT_ORDER2" => "DESC",
						"STRICT_SECTION_CHECK" => "N"
					)
				);?>

			</div>
			<a href="/news/" class="big-button main-news__button">Подробнее</a>
		</div>
	</section>

	<section class="brands">
		<div class="wrap">
			<h2 class="brands__title">
				Торговые марки
			</h2>
			<div class="brands-slider">

				<?$APPLICATION->IncludeComponent(
					"bitrix:news.list",
					"torg-marki",
					Array(
						"ACTIVE_DATE_FORMAT" => "d.m.Y",
						"ADD_SECTIONS_CHAIN" => "Y",
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
						"DISPLAY_BOTTOM_PAGER" => "Y",
						"DISPLAY_DATE" => "Y",
						"DISPLAY_NAME" => "Y",
						"DISPLAY_PICTURE" => "Y",
						"DISPLAY_PREVIEW_TEXT" => "Y",
						"DISPLAY_TOP_PAGER" => "N",
						"FIELD_CODE" => array("DETAIL_PICTURE",""),
						"FILTER_NAME" => "",
						"HIDE_LINK_WHEN_NO_DETAIL" => "N",
						"IBLOCK_ID" => "5",
						"IBLOCK_TYPE" => "content",
						"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
						"INCLUDE_SUBSECTIONS" => "Y",
						"MESSAGE_404" => "",
						"NEWS_COUNT" => "20",
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
						"PROPERTY_CODE" => array("",""),
						"SET_BROWSER_TITLE" => "Y",
						"SET_LAST_MODIFIED" => "N",
						"SET_META_DESCRIPTION" => "Y",
						"SET_META_KEYWORDS" => "Y",
						"SET_STATUS_404" => "N",
						"SET_TITLE" => "Y",
						"SHOW_404" => "N",
						"SORT_BY1" => "SORT",
						"SORT_BY2" => "ID",
						"SORT_ORDER1" => "DESC",
						"SORT_ORDER2" => "ASC",
						"STRICT_SECTION_CHECK" => "N"
					)
				);?>

			</div>
		</div>
	</section>

	<section class="info-block">
		<div class="wrap">
			<div class="info-block__subscription">
				<div class="info-block__subscription-background" style="background-image: url(<?= SITE_TEMPLATE_PATH ?>/img/info-image.jpg)">
				</div>
				<div class="info-block__subscription-desc">
					вам по секрету:
				</div>
				<div class="info-block__subscription-title">
					Будьте в курсе<br>
					<span>акций и скидок</span>
				</div>
				<div class="info-block__subscription-sub-title">
					просто подпишитесь на новости!
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
				);?><br>
			</div>


			<div class="info-block__about">

				<?$APPLICATION->IncludeComponent(
					"bitrix:news.list",
					"index-company",
					Array(
						"ACTIVE_DATE_FORMAT" => "d.m.Y",
						"ADD_SECTIONS_CHAIN" => "Y",
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
						"DISPLAY_BOTTOM_PAGER" => "Y",
						"DISPLAY_DATE" => "Y",
						"DISPLAY_NAME" => "Y",
						"DISPLAY_PICTURE" => "Y",
						"DISPLAY_PREVIEW_TEXT" => "Y",
						"DISPLAY_TOP_PAGER" => "N",
						"FIELD_CODE" => array("ID","NAME","PREVIEW_TEXT","DETAIL_TEXT",""),
						"FILTER_NAME" => "",
						"HIDE_LINK_WHEN_NO_DETAIL" => "N",
						"IBLOCK_ID" => "9",
						"IBLOCK_TYPE" => "content",
						"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
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
						"PROPERTY_CODE" => array("HREF","PROP1","PROP1_HREF","PROP1_DESC","PROP2","PROP2_HREF","PROP2_DESC","PROP3","PROP3_HREF","PROP3_DESC",""),
						"SET_BROWSER_TITLE" => "Y",
						"SET_LAST_MODIFIED" => "N",
						"SET_META_DESCRIPTION" => "Y",
						"SET_META_KEYWORDS" => "Y",
						"SET_STATUS_404" => "N",
						"SET_TITLE" => "Y",
						"SHOW_404" => "N",
						"SORT_BY1" => "ID",
						"SORT_BY2" => "SORT",
						"SORT_ORDER1" => "DESC",
						"SORT_ORDER2" => "ASC",
						"STRICT_SECTION_CHECK" => "N"
					)
				);?>

			</div>
		</div>
	</section>

	<? require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php'); ?>