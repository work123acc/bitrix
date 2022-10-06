<?
	if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<?
			CJSCore::Init(array("jquery"));
			
		?>
		<?$APPLICATION->ShowHead();?>
		<title><?$APPLICATION->ShowTitle();?></title>
		<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" /> 
		<meta name= "viewport" content= "width=device-width, initial-scale=1.0, user-scalable=no" >
		<link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/fonts/fonts.css">
		<link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/normalize.css">
		<link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/slick.css">
		<link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/slick-theme.css">
		<link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/main.css">
		<link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/responsive.css">
		
		<script src="<?= SITE_TEMPLATE_PATH ?>/js/jquery-3.1.1.min.js"></script>
		<script src="<?= SITE_TEMPLATE_PATH ?>/js/slick.min.js"></script>
		<script src="<?= SITE_TEMPLATE_PATH ?>/js/jquery.dotdotdot.min.js"></script>
		<script src="<?= SITE_TEMPLATE_PATH ?>/js/ie.js"></script>
		<script src="<?= SITE_TEMPLATE_PATH ?>/js/masonry.pkgd.min.js"></script>
		<script src="<?= SITE_TEMPLATE_PATH ?>/js/main.js"></script>
		
	</head>
	<body>
		<div id="panel">
			<?$APPLICATION->ShowPanel();?>
		</div>
		<div class="wrapper">
			<header class="header  header--desktop">
				<div class="wrap  header__wrap">
					<div class="header-logo">
						<div class="header-logo__img">
							<a href="/">
								<img src="<?= SITE_TEMPLATE_PATH ?>/img/head-logo.png" alt="">
							</a>
						</div>
						<div class="header-logo__text">
							
							<?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"EDIT_TEMPLATE" => "",
								"PATH" => SITE_DIR."include/header_name.php"
								),
								false
							);?>
							
						</div>
					</div>
					<div class="header-communications">
						<div class="header-communications__item">
							
							<?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"EDIT_TEMPLATE" => "",
								"PATH" => SITE_DIR."include/mail_to.php"
								),
								false
							);?>
							
						</div>
						<div class="header-communications__item">
							
							<?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"EDIT_TEMPLATE" => "",
								"PATH" => SITE_DIR."include/communication_logos.php"
								),
								false
							);?>
							
						</div>
						<div class="header-communications__item">
							
							<?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"EDIT_TEMPLATE" => "",
								"PATH" => SITE_DIR."include/adress.php"
								),
								false
							);?>
							
						</div>
						<div class="header-communications__item">
							
							<?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"EDIT_TEMPLATE" => "",
								"PATH" => SITE_DIR."include/icq.php"
								),
								false
							);?>
							
						</div>
					</div>
					<div class="header-authorization">
						
						<?
							$APPLICATION->IncludeComponent(
	"api:auth.ajax", 
	".default", 
	array(
		"LOGIN_BTN_CLASS" => "api_button api_button_small",
		"LOGIN_MESS_HEADER" => "Вход в личный кабинет",
		"LOGIN_MESS_LINK" => "Авторизация",
		"LOGOUT_URL" => "/?logout=yes",
		"PROFILE_URL" => "/personal/",
		"REGISTER_BTN_CLASS" => "api_button api_button_small",
		"REGISTER_MESS_HEADER" => "Регистрация",
		"REGISTER_MESS_LINK" => "Регистрация",
		"RESTORE_MESS_HEADER" => "Вспомнить пароль",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);
						?>
						
					</div>
					<div class="header-cart" id="basket_div">
						<?
							$APPLICATION->IncludeComponent(
							"bitrix:sale.basket.basket.line", 
							".default", 
							array(
							"PATH_TO_BASKET" => "/personal/cart/",
							"PATH_TO_ORDER" => "/personal/order/make/",
							"SHOW_PERSONAL_LINK" => "N",
							"SHOW_NUM_PRODUCTS" => "Y",
							"SHOW_TOTAL_PRICE" => "Y",
							"SHOW_PRODUCTS" => "N",
							"POSITION_FIXED" => "N",
							"SHOW_DELAY" => "Y",
							"SHOW_NOTAVAIL" => "Y",
							"SHOW_SUBSCRIBE" => "Y",
							"COMPONENT_TEMPLATE" => ".default",
							"SHOW_EMPTY_VALUES" => "Y",
							"PATH_TO_PERSONAL" => SITE_DIR."personal/",
							"SHOW_AUTHOR" => "N",
							"PATH_TO_REGISTER" => SITE_DIR."login/",
							"PATH_TO_PROFILE" => SITE_DIR."personal/",
							"HIDE_ON_BASKET_PAGES" => "N",
							"PATH_TO_AUTHORIZE" => "",
							"SHOW_IMAGE" => "Y",
							"SHOW_PRICE" => "Y",
							"SHOW_SUMMARY" => "Y"
							),
							false
							);
						?>
					</div>
				</div>
				<nav class="header-nav">
					<div class="header-nav__overlay"></div>
					<div class="wrap  header-nav__wrap">
						<ul class="header-nav__menu  header-nav__menu--top">
							<li><a href="/"></a></li>
							
							<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"catalog-top-menu", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "left",
		"USE_EXT" => "Y",
		"COMPONENT_TEMPLATE" => "catalog-top-menu"
	),
	false
);?>
							
							<?$APPLICATION->IncludeComponent(
								"bitrix:menu",
								"header-top-menu",
								Array(
								"ALLOW_MULTI_SELECT" => "N",
								"CHILD_MENU_TYPE" => "top",
								"DELAY" => "N",
								"MAX_LEVEL" => "1",
								"MENU_CACHE_GET_VARS" => array(""),
								"MENU_CACHE_TIME" => "3600",
								"MENU_CACHE_TYPE" => "N",
								"MENU_CACHE_USE_GROUPS" => "Y",
								"ROOT_MENU_TYPE" => "top",
								"USE_EXT" => "N"
								)
							);?>
							
						</ul>
						
						<div class="header-nav__phone">


							<div class="top-info--right">


								<div class="top-info-search">

									<?$page = $APPLICATION->GetCurPage();
									//echo $page; ?>
									<?if($page!='/catalog/' and $page!='/catalog/index.php') {?>
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
                                <?}?>
								</div>
							</div>

							
							<?
								$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"EDIT_TEMPLATE" => "",
								"PATH" => SITE_DIR."include/phone.php"
								),
								false
								);
							?>
							
						</div>
					</div>
				</nav>
			</header>
			<header class="header  header--mobile clear">
				<div class="wrap  header__wrap">
					<div class="header-logo">
						<div class="header-logo__img">
							<a href="">
								<img src="<?= SITE_TEMPLATE_PATH ?>/img/head-logo.png" alt="">
							</a>
						</div>
						<div class="header-logo__text">
							
							<?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"EDIT_TEMPLATE" => "",
								"PATH" => SITE_DIR."include/header_name.php"
								),
								false
							);?>
							
						</div>
					</div>
					<div class="header-addrress">
						
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							Array(
							"AREA_FILE_SHOW" => "file",
							"AREA_FILE_SUFFIX" => "inc",
							"EDIT_TEMPLATE" => "",
							"PATH" => SITE_DIR."include/mob-phone.php"
							),
							false
						);?>
						
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							Array(
							"AREA_FILE_SHOW" => "file",
							"AREA_FILE_SUFFIX" => "inc",
							"EDIT_TEMPLATE" => "",
							"PATH" => SITE_DIR."include/mob-adress.php"
							),
							false
						);?>
						
					</div>
					<div class="header-authorization">
						
						<?$APPLICATION->IncludeComponent(
							"api:auth.ajax",
							"",
							Array(
							"LOGIN_BTN_CLASS" => "api_button api_button_small",
							"LOGIN_MESS_HEADER" => "Вход на сайт",
							"LOGIN_MESS_LINK" => "Авторизация",
							"LOGOUT_URL" => "?logout=yes",
							"PROFILE_URL" => "/000/",
							"REGISTER_BTN_CLASS" => "api_button api_button_small",
							"REGISTER_MESS_HEADER" => "Регистрация",
							"REGISTER_MESS_LINK" => "Регистрация",
							"RESTORE_MESS_HEADER" => "Вспомнить пароль"
							)
						);?>
						
					</div>
				</div>
				<div class="header-line">
					<a href="" class="mobile-menu-overflow"></a>
					<div class="wrap">
						<button class="header__menu-button cmn-toggle-switch cmn-toggle-switch__htx">
							<span>toggle menu</span>
						</button>
						<div class="header-cart">
							
							<?$APPLICATION->IncludeComponent(
								"bitrix:sale.basket.basket.line",
								"mobile",
								Array(
								"HIDE_ON_BASKET_PAGES" => "N",
								"PATH_TO_AUTHORIZE" => "",
								"PATH_TO_BASKET" => "/personal/cart/",
								"PATH_TO_ORDER" => "/personal/order/make/",
								"PATH_TO_PERSONAL" => SITE_DIR."personal/",
								"PATH_TO_PROFILE" => SITE_DIR."personal/",
								"PATH_TO_REGISTER" => SITE_DIR."login/",
								"POSITION_FIXED" => "N",
								"SHOW_AUTHOR" => "N",
								"SHOW_DELAY" => "Y",
								"SHOW_EMPTY_VALUES" => "Y",
								"SHOW_IMAGE" => "Y",
								"SHOW_NOTAVAIL" => "Y",
								"SHOW_NUM_PRODUCTS" => "N",
								"SHOW_PERSONAL_LINK" => "N",
								"SHOW_PRICE" => "Y",
								"SHOW_PRODUCTS" => "N",
								"SHOW_SUBSCRIBE" => "Y",
								"SHOW_SUMMARY" => "Y",
								"SHOW_TOTAL_PRICE" => "Y"
								)
							);?>
							
						</div>
						<div class="header-menu">
							<div class="header-communications">
								<div class="header-communications__item">
									
									<?$APPLICATION->IncludeComponent(
										"bitrix:main.include",
										"",
										Array(
										"AREA_FILE_SHOW" => "file",
										"AREA_FILE_SUFFIX" => "inc",
										"EDIT_TEMPLATE" => "",
										"PATH" => SITE_DIR."include/mail_to.php"
										),
										false
									);?>
									
								</div>
								<div class="header-communications__item">
									
									<?$APPLICATION->IncludeComponent(
										"bitrix:main.include",
										"",
										Array(
										"AREA_FILE_SHOW" => "file",
										"AREA_FILE_SUFFIX" => "inc",
										"EDIT_TEMPLATE" => "",
										"PATH" => SITE_DIR."include/communication_logos.php"
										),
										false
									);?>
									
								</div>
								<div class="header-communications__item">
									
									<?$APPLICATION->IncludeComponent(
										"bitrix:main.include",
										"",
										Array(
										"AREA_FILE_SHOW" => "file",
										"AREA_FILE_SUFFIX" => "inc",
										"EDIT_TEMPLATE" => "",
										"PATH" => SITE_DIR."include/adress.php"
										),
										false
									);?>
									
								</div>
								<div class="header-communications__item">
									
									<?$APPLICATION->IncludeComponent(
										"bitrix:main.include",
										"",
										Array(
										"AREA_FILE_SHOW" => "file",
										"AREA_FILE_SUFFIX" => "inc",
										"EDIT_TEMPLATE" => "",
										"PATH" => SITE_DIR."include/icq.php"
										),
										false
									);?>
									
								</div>
							</div>
							<nav class="header-nav">
								<ul class="header-nav__menu  header-nav__menu--top">
									<li><a href="/"></a></li>
									
									<?$APPLICATION->IncludeComponent(
										"bitrix:menu",
										"catalog-top-menu",
										Array(
										"ALLOW_MULTI_SELECT" => "N",
										"CHILD_MENU_TYPE" => "left",
										"DELAY" => "N",
										"MAX_LEVEL" => "4",
										"MENU_CACHE_GET_VARS" => array(""),
										"MENU_CACHE_TIME" => "3600",
										"MENU_CACHE_TYPE" => "N",
										"MENU_CACHE_USE_GROUPS" => "Y",
										"ROOT_MENU_TYPE" => "left",
										//"ROOT_MENU_TYPE" => "top",
										"USE_EXT" => "Y"
										)
									);?>
									
									
									
									
									<?$APPLICATION->IncludeComponent(
										"bitrix:menu",
										"header-top-menu",
										Array(
										"ALLOW_MULTI_SELECT" => "N",
										"CHILD_MENU_TYPE" => "top",
										"DELAY" => "N",
										"MAX_LEVEL" => "1",
										"MENU_CACHE_GET_VARS" => array(""),
										"MENU_CACHE_TIME" => "3600",
										"MENU_CACHE_TYPE" => "N",
										"MENU_CACHE_USE_GROUPS" => "Y",
										"ROOT_MENU_TYPE" => "top",
										"USE_EXT" => "N"
										)
									);?>
									
									
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</header>																																							