<?
	if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
</main>
<div style="clear:both;"> </div>
<?$page = $APPLICATION->GetCurPage(true); ?>
<footer class="footer <?if($page=="/index.php"){?>footer_index<?}?>">
	<div class="wrap">
        <div class="footer-content">
			<div class="footer__logo">
				<div class="footer__logo-image">
					<a href="">
						<img src="<?= SITE_TEMPLATE_PATH ?>/img/head-logo.png" alt="">
					</a>
				</div>
			</div>
			
			
			
			<div class="footer__social">
				
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
					"AREA_FILE_SHOW" => "file",
					"AREA_FILE_SUFFIX" => "inc",
					"EDIT_TEMPLATE" => "",
					"PATH" => SITE_DIR."include/communication_logos_footer.php"
					),
					false
				);?>
				
			</div>
			
			<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
				"AREA_FILE_SHOW" => "file",
				"AREA_FILE_SUFFIX" => "inc",
				"EDIT_TEMPLATE" => "",
				"PATH" => SITE_DIR."include/links_footer.php"
				),
				false
			);?>

			<a  class="privacy_link" href="/privacy/" target="_blank"> <span>  Политика конфиденциальности  </span></a>
			
			
		</div>
		<div class="footer__made">
			
			<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
				"AREA_FILE_SHOW" => "file",
				"AREA_FILE_SUFFIX" => "inc",
				"EDIT_TEMPLATE" => "",
				"PATH" => SITE_DIR."include/made_footer.php"
				),
				false
			);?>
			
			<div class="href_old_site">
				<a href="http://old.kanzlider.ru/">Старый сайт</a>
			</div>
			
		</div>
	</div>
	<nav class="header-nav  header-nav--footer">
        <div class="header-nav__overlay"></div>
        <div class="wrap  header-nav__wrap">
			<ul class="header-nav__menu">
				<li><a href=""></a></li>
				
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
					"USE_EXT" => "Y"
					)
				);?>
				
				
				<?$APPLICATION->IncludeComponent(
					"bitrix:menu",
					"header-top-menu",
					Array(
					"ALLOW_MULTI_SELECT" => "N",
					"CHILD_MENU_TYPE" => "bottom",
					"DELAY" => "N",
					"MAX_LEVEL" => "1",
					"MENU_CACHE_GET_VARS" => array(""),
					"MENU_CACHE_TIME" => "3600",
					"MENU_CACHE_TYPE" => "N",
					"MENU_CACHE_USE_GROUPS" => "Y",
					"ROOT_MENU_TYPE" => "bottom",
					"USE_EXT" => "N"
					)
				);?>
				
			</ul>
		</div>
	</nav>

</footer>

	<div class="overlay_popup"></div>

	<div class="popup" id="add_to_basket">
		<div class="popup_wrap">
			<div class="popup_add">
				<div class="close_popup"></div>
				<h1>Товар добавлен</h1>

				<div class="img_cont">
					<img class="add_prod_img" src="" alt="">
				</div>

				<p class="add_name"></p>
				<div class="popup_price">
					<span class="add_prod_price"></span><span>руб.</span>
				</div>

				<button class="return return_popup">Продолжить покупки</button>
				<a href="/personal/cart/" class="buy" style="color: white; background-color: #ecc905; text-decoration: none;padding: 12px 38px;border: none;font-size: 18px;display: inline-block;outline: none;cursor: pointer;">Оформить заказ</a>
				
				<? /*------------------------------- comment -----------------------------------------* ?>
				<button class="buy">Оформить заказ</button>
				<? /*------------------------------- comment -----------------------------------------*/ ?>
				
			</div>
		</div>
	</div>


</div>
</div>


</body>
</html>