<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
	
	use Bitrix\Main\Loader,
	Bitrix\Main\ModuleManager;
?>
<div id="parfumery-page">
    <div class="breadcrumbs">
        <div class="container">
			<?$APPLICATION->IncludeComponent(
				"bitrix:breadcrumb", 
				"altasib.breadcrumb_rdf", 
				array(
				"START_FROM" => "0",
				"PATH" => "",
				"SITE_ID" => "-",
				"COMPONENT_TEMPLATE" => "altasib.breadcrumb_rdf"
				),
				false,
				array(
				"HIDE_ICONS" => "N"
				)
			);?>
		</div>
		
	</div>
    
    <div class="content-page">
        <div class="container">
			<div class="filter_mobile">
				
				
				<div class="line_between">
					
				</div>
				
				
				<div class="bottom_filter_mobile">
					
					<div class="selected_filters">
						<?$APPLICATION->IncludeComponent(
							"bitrix:catalog.section.list",
							"mobile",
							array(
							"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
							"IBLOCK_ID" => $arParams["IBLOCK_ID"],
							"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
							"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
							"CACHE_TYPE" => $arParams["CACHE_TYPE"],
							"CACHE_TIME" => $arParams["CACHE_TIME"],
							"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
							"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
							"TOP_DEPTH" => 5,
							"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
							"VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
							"SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
							"HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
							"ADD_SECTIONS_CHAIN" => "N"
							),
							$component,
							array("HIDE_ICONS" => "Y")
						);?>
						
					</div>
				</div>
			</div>
            <div class="left-sidebar perfumery_filters">
                <div class="sidebar-menu-page">
					
					<?$APPLICATION->IncludeComponent(
						"bitrix:catalog.section.list",
						"",
						array(
						"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
						"IBLOCK_ID" => $arParams["IBLOCK_ID"],
						"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
						"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
						"CACHE_TYPE" => $arParams["CACHE_TYPE"],
						"CACHE_TIME" => $arParams["CACHE_TIME"],
						"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
						"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
						"TOP_DEPTH" => 5,
						"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
						"VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
						"SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
						"HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
						"ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : '')
						),
						$component,
						array("HIDE_ICONS" => "Y")
					);?>
				</div>
                <div class="filter-sidebar">
                    <h3>Фильтровать</h3>
                    <?$APPLICATION->IncludeComponent(
						"bitrix:catalog.smart.filter",
						"",
						array(
						"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
						"IBLOCK_ID" => $arParams["IBLOCK_ID"],
						"SECTION_ID" => $arCurSection['ID'],
						"FILTER_NAME" => $arParams["FILTER_NAME"],
						"PRICE_CODE" => $arParams["PRICE_CODE"],
						"CACHE_TYPE" => $arParams["CACHE_TYPE"],
						"CACHE_TIME" => $arParams["CACHE_TIME"],
						"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
						"SAVE_IN_SESSION" => "N",
						"FILTER_VIEW_MODE" => $arParams["FILTER_VIEW_MODE"],
						"XML_EXPORT" => "Y",
						"SECTION_TITLE" => "NAME",
						"SECTION_DESCRIPTION" => "DESCRIPTION",
						'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
						"TEMPLATE_THEME" => $arParams["TEMPLATE_THEME"],
						'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
						'CURRENCY_ID' => $arParams['CURRENCY_ID'],
						"SEF_MODE" => $arParams["SEF_MODE"],
						"SEF_RULE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["smart_filter"],
						"SMART_FILTER_PATH" => $arResult["VARIABLES"]["SMART_FILTER_PATH"],
						"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
						"INSTANT_RELOAD" => $arParams["INSTANT_RELOAD"],
						),
						$component,
						array('HIDE_ICONS' => 'Y')
					);?>
				</div>
			</div>
            <div class="main_content_perfumery">
                <div class="sort_control">
                    <div class="products_found">
						<span>Показать товары по: </span>
						<div class="prods_num">
							<a href="<?=$APPLICATION->GetCurPageParam(false, array("count"))?>">15</a>
							<a href="<?=$APPLICATION->GetCurPageParam("count=30", array("count"))?>">30</a>
							<a href="<?=$APPLICATION->GetCurPageParam("count=45", array("count"))?>">45</a>
							<a href="<?=$APPLICATION->GetCurPageParam("count=60", array("count"))?>">60</a>
							<?
                                if($_GET["count"]!=""){
                                    $arParams["PAGE_ELEMENT_COUNT"]=$_GET["count"];
								}
							?>
						</div>
					</div>
                    <div class="sort_products">
						Сортировать по
						<?
							$flag_price_asc=true;
							$flag_price_desc=true;
							$flag_name_asc=true;
							$flag_name_desc=true;
							$flag_pop=true;
							if($_GET['sort']=="price"){
								if($_GET['order']=="asc"){
									$arParams["ELEMENT_SORT_FIELD"] = "PROPERTY_MAXIMUM_PRICE";
									$arParams["ELEMENT_SORT_ORDER"]= "asc";
								$flag_price_asc=false;?>
								<span class="sort_item">цене по возрастанию</span>
								<?}else{
									$arParams["ELEMENT_SORT_FIELD"] = "PROPERTY_MAXIMUM_PRICE";
									$arParams["ELEMENT_SORT_ORDER"]= "desc";
								$flag_price_desc=false;?>
								<span class="sort_item">цене по убыванию</span>
								<? }
								}else{
								if($_GET['sort']=="name"){
									if($_GET['order']=="asc"){
										$arParams["ELEMENT_SORT_FIELD"] = "PROPERTY_NAME_TOVAR_SITE";
										$arParams["ELEMENT_SORT_ORDER"]= "asc";
										$flag_name_asc=false;  
									?>    
									<span class="sort_item">названию (А-Я)</span>
									<?}else{
										$arParams["ELEMENT_SORT_FIELD"] = "PROPERTY_NAME_TOVAR_SITE";
										$arParams["ELEMENT_SORT_ORDER"]= "desc";
										$flag_name_desc=false;
									?>  
									<span class="sort_item">названию (Я-А)</span>
									<?}
									}else{
									$flag_pop=true
								?>
								<span class="sort_item">популярности</span>
								<?}
							}
							
						?>
						
						<img src="<?= SITE_TEMPLATE_PATH ?>/img/enter.svg" alt="">
						<ul class="select-list animated fadeIn" >
							<?if($flag_price_asc){?>
								<li class="select-point"><a href="<?=$APPLICATION->GetCurPageParam("sort=price&order=asc", array("sort","order","name"))?>">цене по возрастанию</a></li>
							<?}?>
							<?if($flag_price_desc){?>
								<li class="select-point"><a href="<?=$APPLICATION->GetCurPageParam("sort=price&order=desc", array("sort","order","name"))?>">цене по убыванию</a></li>
							<?}?>
							<?if($flag_name_asc){?>
								<li class="select-point"><a href="<?=$APPLICATION->GetCurPageParam("sort=name&order=asc", array("sort","order","name"))?>">названию (А-Я)</a></li>
							<?}?>
							<?if($flag_name_desc){?>
								<li class="select-point"><a href="<?=$APPLICATION->GetCurPageParam("sort=name&order=desc", array("sort","order","name"))?>">названию (Я-А)</a></li>
							<?}?>
							<?if($flag_pop){?>
								<li class="select-point"><a href="<?=$APPLICATION->GetCurPageParam(false,array("sort","order","name"))?>">популярности</a></li>
							<?}?>
							
							
						</ul>
					</div>
				</div>
                <?$intSectionID = 0;
				?>
                <? $GLOBALS["arrFilter"]["!PROPERTY_NO_ACTIVE"]=1;?>
				<?$intSectionID = $APPLICATION->IncludeComponent(
					"bitrix:catalog.section",
					"",
					array(
					"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
					"IBLOCK_ID" => $arParams["IBLOCK_ID"],
					"ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
					"ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
					"ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
					"ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
					"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
					"META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
					"META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
					"BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
					"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
					"INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
					"BASKET_URL" => $arParams["BASKET_URL"],
					"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
					"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
					"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
					"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
					"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
					"FILTER_NAME" => $arParams["FILTER_NAME"],
					"CACHE_TYPE" => $arParams["CACHE_TYPE"],
					"CACHE_TIME" => $arParams["CACHE_TIME"],
					"CACHE_FILTER" => $arParams["CACHE_FILTER"],
					"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
					"SET_TITLE" => $arParams["SET_TITLE"],
					"MESSAGE_404" => $arParams["MESSAGE_404"],
					"SET_STATUS_404" => $arParams["SET_STATUS_404"],
					"SHOW_404" => $arParams["SHOW_404"],
					"FILE_404" => $arParams["FILE_404"],
					"DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
					"PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
					"LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
					"PRICE_CODE" => $arParams["PRICE_CODE"],
					"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
					"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
					
					"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
					"USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
					"ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
					"PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
					"PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"],
					
					"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
					"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
					"PAGER_TITLE" => $arParams["PAGER_TITLE"],
					"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
					"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
					"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
					"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
					"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
					"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
					"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
					"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
					
					"OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
					"OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
					"OFFERS_PROPERTY_CODE" => $arParams["LIST_OFFERS_PROPERTY_CODE"],
					"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
					"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
					"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
					"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
					"OFFERS_LIMIT" => $arParams["LIST_OFFERS_LIMIT"],
					
					"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
					"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
					"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
					"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
					"USE_MAIN_ELEMENT_SECTION" => $arParams["USE_MAIN_ELEMENT_SECTION"],
					'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
					'CURRENCY_ID' => $arParams['CURRENCY_ID'],
					'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
					
					'LABEL_PROP' => $arParams['LABEL_PROP'],
					'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'],
					'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
					
					'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
					'OFFER_TREE_PROPS' => $arParams['OFFER_TREE_PROPS'],
					'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
					'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
					'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
					'MESS_BTN_BUY' => $arParams['MESS_BTN_BUY'],
					'MESS_BTN_ADD_TO_BASKET' => $arParams['MESS_BTN_ADD_TO_BASKET'],
					'MESS_BTN_SUBSCRIBE' => $arParams['MESS_BTN_SUBSCRIBE'],
					'MESS_BTN_DETAIL' => $arParams['MESS_BTN_DETAIL'],
					'MESS_NOT_AVAILABLE' => $arParams['MESS_NOT_AVAILABLE'],
					
					'TEMPLATE_THEME' => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
					"ADD_SECTIONS_CHAIN" => "N",
					'ADD_TO_BASKET_ACTION' => $basketAction,
					'SHOW_CLOSE_POPUP' => isset($arParams['COMMON_SHOW_CLOSE_POPUP']) ? $arParams['COMMON_SHOW_CLOSE_POPUP'] : '',
					'COMPARE_PATH' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['compare'],
					'BACKGROUND_IMAGE' => (isset($arParams['SECTION_BACKGROUND_IMAGE']) ? $arParams['SECTION_BACKGROUND_IMAGE'] : ''),
					'DISABLE_INIT_JS_IN_COMPONENT' => (isset($arParams['DISABLE_INIT_JS_IN_COMPONENT']) ? $arParams['DISABLE_INIT_JS_IN_COMPONENT'] : '')
					),
					$component
				);?>
                
			</div>
		</div>
        
	</div> 
    
    
    
    
    
    
    
    
</div>