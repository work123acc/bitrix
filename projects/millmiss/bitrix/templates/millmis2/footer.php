<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();
?>
</div>

<footer class="footer">
    <div class="container">

	<div class="footerTop">
	    <div class="footer_block">
		<ul>
		    <li class="title_footer_block">ИНФОРМАЦИЯ</li>
		    <?
		    $APPLICATION->IncludeComponent(
			    "bitrix:menu", "bottom_menu", array(
			"ROOT_MENU_TYPE" => "bottom_info",
			"MENU_CACHE_TYPE" => "N",
			"MENU_CACHE_TIME" => "36000000",
			"MENU_CACHE_USE_GROUPS" => "N",
			"MENU_THEME" => "site",
			"CACHE_SELECTED_ITEMS" => "N",
			"MENU_CACHE_GET_VARS" => array(
			),
			"MAX_LEVEL" => "3",
			"CHILD_MENU_TYPE" => "",
			"USE_EXT" => "Y",
			"DELAY" => "N",
			"ALLOW_MULTI_SELECT" => "N",
			"COMPONENT_TEMPLATE" => "new_top"
			    ), false
		    );
		    ?>
		</ul>
	    </div>
	    <div class="footer_block">

		<ul>
		    <li class="title_footer_block">ПРОДУКЦИЯ</li>
		    <?
		    $APPLICATION->IncludeComponent(
			    "bitrix:menu", "bottom_menu", array(
			"ROOT_MENU_TYPE" => "bottom_prod",
			"MENU_CACHE_TYPE" => "N",
			"MENU_CACHE_TIME" => "36000000",
			"MENU_CACHE_USE_GROUPS" => "N",
			"MENU_THEME" => "site",
			"CACHE_SELECTED_ITEMS" => "N",
			"MENU_CACHE_GET_VARS" => array(
			),
			"MAX_LEVEL" => "3",
			"CHILD_MENU_TYPE" => "",
			"USE_EXT" => "Y",
			"DELAY" => "N",
			"ALLOW_MULTI_SELECT" => "N",
			"COMPONENT_TEMPLATE" => "new_top"
			    ), false
		    );
		    ?>
		</ul>
	    </div>
	    <div class="footer_block">
		<ul>
		    <li class="title_footer_block">РАЗДЕЛЫ</li>
<?
$APPLICATION->IncludeComponent(
	"bitrix:menu", "bottom_menu", array(
    "ROOT_MENU_TYPE" => "bottom_razdel",
    "MENU_CACHE_TYPE" => "N",
    "MENU_CACHE_TIME" => "36000000",
    "MENU_CACHE_USE_GROUPS" => "N",
    "MENU_THEME" => "site",
    "CACHE_SELECTED_ITEMS" => "N",
    "MENU_CACHE_GET_VARS" => array(
    ),
    "MAX_LEVEL" => "3",
    "CHILD_MENU_TYPE" => "",
    "USE_EXT" => "Y",
    "DELAY" => "N",
    "ALLOW_MULTI_SELECT" => "N",
    "COMPONENT_TEMPLATE" => "new_top"
	), false
);
?>
		</ul>
	    </div>
	    <div class="footer_block" id="lk_block_footer">
		<ul>
		    <li class="title_footer_block">ЛИЧНЫЙ КАБИНЕТ</li>
                    <?
                    global $USER;
if (!$USER->IsAuthorized()){?>
                           <?
				    $APPLICATION->IncludeComponent(
					    "api:auth.ajax", "", Array(
					"LOGIN_BTN_CLASS" => "avater-icon",
					"LOGIN_MESS_HEADER" => "Вход на сайт",
					"LOGIN_MESS_LINK" => "Вход",
					"REGISTER_BTN_CLASS" => "api_button avater-icon",
					"REGISTER_MESS_HEADER" => "Регистрация",
					"REGISTER_MESS_LINK" => "Регистрация",
					"RESTORE_MESS_HEADER" => "Вспомнить пароль"
					    )
				    );
				    ?>
                    <?}else{?>
                       <li><a href="/personal/orders/">Мои заказы</a></li>
		    <li><a href="/personal/">Личные данные</a></li> 
                        <?}
                    ?>
                  
		    
		    
		</ul>
	    </div>
	    <div class="footer_block contact_footer_block">
		<ul>
		    <li class="title_footer_block">КОНТАКТНАЯ ИНФОРМАЦИЯ</li>
		    <li>Оформить заказ на сайте можно <br>круглосуточно</li>
		    <li class="phone_footer">8 4812 38 28 15</li>
		   
		</ul>
	    </div>
	</div>
	<div class="footerBottom">
	    <div class="left_part_footer">
		<span>Принимаем к оплате:</span>
		<img src="<?= SITE_TEMPLATE_PATH ?>/img/visa.svg" alt="">
		<img src="<?= SITE_TEMPLATE_PATH ?>/img/mastercard.svg" alt="">
	    </div>
	    <div class="right_part_footer">
		<span>Подписывайтесь:</span>
		
                <a href="https://vk.com/milmiss32" target="_blanck"><img src="<?= SITE_TEMPLATE_PATH ?>/img/vk.svg" alt=""></a>
		<a href="https://www.instagram.com/milmiss_shop/" target="_blanck"><img src="<?= SITE_TEMPLATE_PATH ?>/img/twitter.svg" alt=""></a>
	    </div>
	</div>
    </div>
</footer>

<div class="hidden"></div>

<div class="overlay_popup"></div>

<div class="popup" id="popup1">
    <div class="popup_wrap">
	<form class="enter_email" action="mysuperscript.php" autocomplete="on">
	    <div class="close_popup"><img src="<?= SITE_TEMPLATE_PATH ?>/img/close.svg" alt=""></div>
	    <h1>Вход по e-mail:</h1>
	    <p>
		<label for="username" class="uname" data-icon="u" > Ваш e-mail: </label>
		<input id="username" name="username" required="required" type="text" placeholder="qwert@mail.ru"/>
	    </p>
	    <p>
		<label for="password" class="youpasswd" data-icon="p"> Пароль </label>
		<input id="password" name="password" required="required" type="password" placeholder="Введите пароль" />
	    </p>
	    <p class="keeplogin">
		<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" />
		<label for="loginkeeping">Запомнить меня на сайте</label>
	    </p>
	    <p class="login button">
	    <div class="forgetpass show_popup" rel="popup2">Забыли пароль?</div>
	    <input type="submit" value="Вход/ Регистрация" />
	    </p>
	</form>
    </div>
</div>

<div class="popup" id="popup2">
    <div class="popup_wrap">
	<form class="enter_email" action="mysuperscript.php" autocomplete="on">
	    <div class="close_popup"><img src="<?= SITE_TEMPLATE_PATH ?>/img/close.svg" alt=""></div>
	    <h1>Восстановление пароля:</h1>
	    <p>
		<label for="username" class="uname" data-icon="u" > Ваш e-mail: </label>
		<input id="username" name="username" required="required" type="text" placeholder="qwert@mail.ru"/>
	    </p>
	    <p>
		<label for="captcha" class="youcaptcha" data-icon="p"> Введите символы: </label>
		<input id="captcha" name="captcha" required="required" type="text" placeholder="Введите символы" />
	    </p>
	    <p class="keeplogin">
		<input type="checkbox" name="loginkeeping2" id="loginkeeping2" value="loginkeeping" />
		<label for="loginkeeping2">Запомнить меня на сайте</label>
	    </p>
	    <div class="popup_captcha">
		<div class="wrap_captcha">
		    <img src="<?= SITE_TEMPLATE_PATH ?>/img/captcha_example.svg" alt="">
		</div>
		<div class="refresh_captcha">
		    <img src="<?= SITE_TEMPLATE_PATH ?>/img/refresh.svg" alt="">
		    <p>Поменять<br>картинку</p>
		</div>
		<p>Введите адрес электронной почты, указанный при регистрации. Затем нажмите «Восстановить»</p>
	    </div>
	    <p class="login button">
	    <div class="cancel_password">Отмена</div>
	    <input type="submit" value="Восстановить" />
	    </p>
	</form>
    </div>
</div>

<div class="popup" id="popup3">
    <div class="popup_wrap">
	<form class="enter_city" action="mysuperscript.php" autocomplete="on">
	    <div class="close_popup"><img src="<?= SITE_TEMPLATE_PATH ?>/img/close.svg" alt=""></div>
	    <h1>Выберите Ваш город</h1>
	    <p class="city_search">
		<input id="city" name="city" type="text" value="Смоленск"/>
		<input class="this_my_sity" type="submit" value="Это мой город" />
	    </p>
	    <div class="filter_city">
		<ul>
		    <li>Смоленск</li>
		    <li>Орел</li>
		    <li>Брянск</li>
		    <li>Новозыбков</li>
		</ul>
	    </div>
	</form>
    </div>
</div>

<div class="popup" id="popup4">
    <div class="popup_wrap">
	<div class="products_popup">
	    <ul>
		<li>
		    <div class="img_wrap">
			<img src="<?= SITE_TEMPLATE_PATH ?>/img/products/mini_1.png" alt="">
		    </div>
		    <div class="name_products_popup">
			Nasomatto Baraonda Parfum
		    </div>
		</li>
		<li>
		    <div class="img_wrap">
			<img src="<?= SITE_TEMPLATE_PATH ?>/img/products/mini_2.png" alt="">
		    </div>
		    <div class="name_products_popup">
			Starck Peau D'Ailleurs Eau De Toilette
		    </div>
		</li>
		<li>
		    <div class="img_wrap">
			<img src="<?= SITE_TEMPLATE_PATH ?>/img/products/mini_3.png" alt="">
		    </div>
		    <div class="name_products_popup">
			Alexander McQueen Parfum
		    </div>
		</li>
		<li>
		    <div class="img_wrap">
			<img src="<?= SITE_TEMPLATE_PATH ?>/img/products/mini_4.png" alt="">
		    </div>
		    <div class="name_products_popup">
			Alexander McQueen Eau De Parfum
		    </div>
		</li>
	    </ul>
	</div>
    </div>
</div>
<!--[if lt IE 9]>
	<script src="<?= SITE_TEMPLATE_PATH ?>/libs/html5shiv/es5-shim.min.js"></script>
	<script src="<?= SITE_TEMPLATE_PATH ?>/libs/html5shiv/html5shiv.min.js"></script>
	<script src="<?= SITE_TEMPLATE_PATH ?>/libs/html5shiv/html5shiv-printshiv.min.js"></script>
	<script src="<?= SITE_TEMPLATE_PATH ?>/libs/respond/respond.min.js"></script>
	<![endif]-->


<script src="<?= SITE_TEMPLATE_PATH ?>/libs/owl/owl.carousel.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/extras.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/slick.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/menu.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/nouislider.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/jquery.magnific-popup.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/common.js"></script>

</body>
</html>