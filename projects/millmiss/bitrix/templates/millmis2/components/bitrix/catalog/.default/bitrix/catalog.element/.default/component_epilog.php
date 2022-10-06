<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $templateData */
/** @var @global CMain $APPLICATION */
use Bitrix\Main\Loader;
global $APPLICATION;

?>
   <div class="wrap_status_cart">
                                    <div class="cart_info_top">
                                        <div class="price_cart">
                                            <?
                                            if($templateData['PRICES']["Розничное"]["DISCOUNT_VALUE"]>0 and $templateData['PRICES']["Розничное"]["DISCOUNT_VALUE"]<$templateData['PRICES']["Розничное"]["VALUE"]){?>
                                               <span>Цена со скидкой:</span>
                                               <p><?=$templateData['PRICES']["Розничное"]["DISCOUNT_VALUE"]?> <img src="/img/rouble_blue.svg" alt=""></p> 
                                               <span>Полная цена:</span>
                                               <p class="full_priceP"><?=$templateData['PRICES']["Розничное"]["VALUE"]?> <img src="/img/rouble_grey.svg" alt=""></p>
                                            <?}else{?>
                                                <span>Полная цена:</span>
                                            <p><?=$templateData['PRICES']["Розничное"]["VALUE"]?> <img src="/img/rouble_blue.svg" alt=""></p>
                                            <?}
                                            ?>
                                            
                                            										<div class="priceDiscont">
	                                         
	                                           </div>
                                            <div class="number_thing">
                                                <span>Количество:</span>
                                                <input type="hidden" id="product_kol" value="<?=$templateData["Result"]["CATALOG_QUANTITY"]?>" />
                                                <input type="hidden" id="product_id" value="<?=$templateData["Result"]["ID"]?>" />
                                                <input type="button" id="quantity_minus" class="quantity-controls quantity-minus">
                                                <input type="text" id="quantity_input" class="quantity-input " name="quantity[]" value="1">
                                                <input type="button" id="quantity_plus" class="quantity-controls quantity-plus">
                                            </div>
                                        </div>

                                        <div class="btn_cart">
                                            <div class="brand_product_img">
                                              <?if($templateData["Result"]["BRANDS_IMG"]["HREF"]!=""){?>
                                                  <a href="<?=$templateData["Result"]["BRANDS_IMG"]["HREF"]?>">
                                                 <img src="<?=$templateData["Result"]["BRANDS_IMG"]["IMG"]?>" alt="">
                                                </a>
                                                  
                                              <?}?>  
                                            </div>
                                            <?if($templateData["Result"]["CATALOG_QUANTITY"]<=0){?>
                                              <button class="add_basket_btn no_goods show_popup" rel="popup_availability_control" data-id="<?=$templateData["Result"]["ID"]?>">Сообщить о поступлении</button>  
                                            <?}else{?>
                                            <button class="add_basket_btn show_popup" rel="add_to_basket" id="add_cart">Добавить в корзину</button>
                                            <button class="availability_btn show_popup" rel="popup-cart-<?echo $templateData["Result"]["ID"]?>">Наличие в магазинах</button>
                                         <?
       $APPLICATION->IncludeComponent(
	"bitrix:catalog.store.amount", 
	"sklad", 
	array(
		"ELEMENT_ID" => $templateData["Result"]["ID"],
		"STORE_PATH" => $arParams["STORE_PATH"],
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000",
		"MAIN_TITLE" => $arParams["MAIN_TITLE"],
		"USE_MIN_AMOUNT" => "N",
		"MIN_AMOUNT" => $arParams["MIN_AMOUNT"],
		"STORES" => array(
			0 => "1",
			1 => "2",
			2 => "3",
			3 => "4",
			4 => "5",
			5 => "6",
			6 => "7",
			7 => "8",
			8 => "9",
			9 => "10",
			10 => "",
		),
		"SHOW_EMPTY_STORE" => "N",
		"SHOW_GENERAL_STORE_INFORMATION" => "N",
		"USER_FIELDS" => array(
			0 => "UF_NAME_SKLAD",
			1 => $arParams["USER_FIELDS"],
			2 => "",
		),
		"FIELDS" => array(
			0 => "TITLE",
			1 => "DESCRIPTION",
			2 => "PHONE",
			3 => "EMAIL",
			4 => "IMAGE_ID",
			5 => "COORDINATES",
			6 => "SCHEDULE",
			7 => $arParams["FIELDS"],
			8 => "",
		),
		"COMPONENT_TEMPLATE" => "sklad",
		"IBLOCK_TYPE" => "1c_catalog",
		"IBLOCK_ID" => "1",
		"ELEMENT_CODE" => "",
		"OFFER_ID" => ""
	),
	false
);
       }
                ?>
                                        <p>Цена в магазине может<br>отличаться от цены на сайте.</p>
                                            <button class="price_control  show_popup" rel="popup_price_control">Следить за ценой</button>     
                                        </div>
                                    </div>

<!--                                    <div class="products_shop">
                                        <ul>
                                            <li><img src="/img/shops/givenchy.png" alt=""></li>
                                        </ul>
                                        <p>Цена в магазине может отличаться от цены на сайте. </p>
                                    </div>-->

                                    <div class="description_and_recall">
                                        <div class="wrap_btn">
                                            <button class="active_btn">Описание</button>
                                        
                                        </div>
                                        <div class="blocks_wrap">
                                            <div class="about_products">
                                                <ul>
                                                    <li class="id_products">Артикул: <span><?=$templateData["Result"]["PROPERTIES"]["CML2_ARTICLE"]["VALUE"]?></span></li>
                                                    <?
                                                    foreach ($templateData["Result"]["DISPLAY_PROPERTIES"] as $PROPERTI) {?>
                                                       <li><?=$PROPERTI["NAME"]?>: <?=$PROPERTI["VALUE"]?></li> 
                                                    <?}
                                                    ?>
                                                    <?
                                                    foreach ($templateData["Result"]["PROPERTIES"]["SV_TOVAR"]["VALUE"] as $PROPERTI) {?>
                                                       <li><?=$PROPERTI?></li> 
                                                    <?}
                                                    ?>
                                                   
                                                </ul>
                                                <p id="textForCart"><?=$templateData["DETAIL_TEXT"]?></p>
                                                <button class="readmore_btn">Показать полностью</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>


    
  </div> <!--end description_container-->
</div> <!--end cart_wrap-->
<!--                    подключение торговых предложений-->

                        <?$APPLICATION->IncludeComponent(
	"spektr:recomend.product", 
	".default", 
	array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "N",
		"IBLOCK_ID" => "1",
		"IBLOCK_TYPE" => "1c_catalog",
		"ITEMS_ID" => $templateData["Result"]["ID"],
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?>
 <div class="popup" id="add_to_basket">
        <div class="popup_wrap">
            <div class="popup_add">
                <div class="close_popup"><img src="<?= SITE_TEMPLATE_PATH ?>/img/close.svg" alt=""></div>
                <h1>Товар добавлен</h1>

                <div class="img_cont">
                    <img class="add_prod_img" src="" alt="">
                </div>
                
                <p class="add_name"></p>
                <p class="add_prod_type"></p>

                <button class="return">Продолжить покупки</button>
                <button class="buy" onclick="document.location.href='/personal/cart/'">Оформить заказ</button>
            </div>
        </div>
    </div>

<div class="popup" id="popup_price_control">
        <div class="popup_wrap">
            <form class="price_control_form"  id="price_control_form" action="/" autocomplete="on">
                <input type="hidden" value="<?=$arResult["ID"]?>" name="price_id_hidden" id="price_id_hidden" />
                <div class="close_popup"><img src="<?= SITE_TEMPLATE_PATH ?>/img/close.svg" alt=""></div>
                <h1>Сообщить о снижении цены</h1>
                <div class="inline_part left_inline_part">
                    <label for="lastname_price" class="lname" data-icon="u" > Фамилия: </label>
                    <input id="lastname_price" name="lastname" id="price_fam"  type="text"/>
                    
                    <label for="firstname_price" class="fname"  data-icon="p"> Имя: </label>
                    <input id="firstname_price" name="firstname"  id="price_name"/>
                    
                </div>

                <div class="inline_part">
                    <label for="city_price" class="city"  data-icon="u" > Город: </label>
                    <input id="city_price" name="city" type="text"/>

                    <label for="username_price"id="price_city"  class="uname" data-icon="u" > E-mail*: </label>
                    <input id="username_price" name="username" required="required" type="text"/>
                </div>

                <div class="phone-number-label">
                	<p><b>Мобильный телефон:</b></p>
									<select name="" id="">
										<option value="">+7</option>
										<option value="">+8</option>
										<option value="">+9</option>
									</select>
									<input type="text" id="phone_price" placeholder="960 530 77 00">
									<span>* - поля, обязательные для заполнения</span>
									
                </div>

                <p><b>Как вам удобнее получать уведомление?:</b></p>

                <p class="keeplogin notify">
                    <input type="checkbox" name="email-notify_price" id="email_notify_price" value="1" checked="checked"/>
                    <label for="email_notify_price">e-mail-уведомления о поступлении</label>

                    <input type="checkbox" name="sms-notify_price" id="sms_notify_price" value="1" checked="checked"/>
                    <label for="sms_notify_price">sms-уведомления о поступлении</label>
                    
                    <input type="checkbox" name="soglasie_price" id="soglasie_price" class="soglasie_chek" value="soglasie-notify" checked="checked"/>
                    <label for="soglasie_price">Я даю свое согласие на обработку своих <a href="#">персональных данных</a></label>
                </p>

                <input type="submit" value="Сообщить о снижении цены" id="price_control_success" class="show_popup soglasie_button" rel="price_control_success">
                <span id="ajax_text_price">
                </span>
            </form>
        </div>
    </div>

 <div class="popup" id="popup_availability_control">
     <input type="hidden" id="subscribe_id" value="" />
        <div class="popup_wrap">
            <form class="price_control_form" id="form_subscribe" action="/" autocomplete="on">
              
                <div class="close_popup"><img src="<?= SITE_TEMPLATE_PATH ?>/img/close.svg" alt=""></div>
                <h1>Сообщить о поступлении товара</h1>
                
                <div class="inline_part left_inline_part">
                    <label for="lastname" class="lname" data-icon="u" > Фамилия: </label>
                    <input id="lastname" name="lastname"  type="text"/>
                    
                    <label for="firstname" class="fname" data-icon="p"> Имя: </label>
                    <input id="firstname" name="firstname"  />
                    
                </div>

                <div class="inline_part">
                    <label for="city" class="city" data-icon="u" > Город: </label>
                    <input id="city" name="city" type="text"/>

                    <label for="username" class="uname" data-icon="u" > E-mail*: </label>
                    <?
                    global $USER;
                        if ($USER->IsAuthorized()){?>
                    <input id="subscribe_mail" name="username"  required="required" type="text" value="<?=$USER->GetEmail()?>"/>
                        <?}else{?>
                            
                            <input id="subscribe_mail"  name="username" required="required" type="text"/>
                        <?}?>
                   
                    
                </div>

                <div class="phone-number-label">
                    <p><b>Мобильный телефон:</b></p>
                    <select name="" id="">
                        <option value="">+7</option>
                        <option value="">+8</option>
                    </select>
                    <input type="text" placeholder="960 530 77 00">
                    <span>* - поля, обязательные для заполнения</span>
                                    
                </div>

<!--                <p><b>Как вам удобнее получать уведомление?*:</b></p>-->

                <p class="keeplogin notify">
                    <input type="checkbox"  required="required" name="sms-notify" class="soglasie_chek" id="subscribe_sms-notify" value="sms-notify" checked="checked"/>
                    <label for="subscribe_sms-notify">Я даю свое согласие на обработку своих <a href="#">персональных данных</a></label>
                </p>

                <input type="submit" id="subscribe_button" value="Сообщить о поступлении" class="show_popup soglasie_button" rel="price_availability_success">
                 <span id="subscribe_ajax"> </span>
            </form>
        </div>
    </div>
    <div class="popup" id="ajax_alert">
        <div class="popup_wrap">
            <div class="price_control_success_body">
                <div class="close_popup"><img src="<?= SITE_TEMPLATE_PATH ?>/img/close.svg" alt=""></div>
                
                <p id="ajax_text">Как только цена снизится, на Вашу почту<br> будет отправлено уведомление</p>
                
            </div>
        </div>
    </div>
<?
//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";
?>













