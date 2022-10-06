<?
/**
 * @global CMain $APPLICATION
 * @param array $arParams
 * @param array $arResult
 */
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
?>

<? ShowError($arResult["strProfileError"]); ?>
<?
if ($arResult['DATA_SAVED'] == 'Y') {
    ShowNote(GetMessage('PROFILE_DATA_SAVED'));
}
?>

<? $user = $arResult['arUser']; var_dump($_SERVER['REQUEST_URI']);?>


<div class="main_content_lk">
    <div class="wrap_block">
	<p class="title-page">Изменить личные данные</p>

	<div class="main-wrap-content">
	    <div class="form-lk">

		<form method="post" name="form1" action="" enctype="multipart/form-data" autocomplete="on" class="form-block">
		    <?= $arResult["BX_SESSION_CHECK"] ?>
		    <input type="hidden" name="ID" value=<?= $arResult["ID"] ?> />
		    <input type="hidden" name="LOGIN" maxlength="50" value="<? echo $arResult["arUser"]["LOGIN"] ?>"/>
		    <input type="hidden" name="EMAIL" maxlength="50" value="<? echo $arResult["arUser"]["EMAIL"] ?>"/>
		    
		    <?php /* -------------------- Правка почты и пароля ------------------- */ ?>

		    <? if (preg_match('#^/000/mail/.{0,}$#sui', $_SERVER['REQUEST_URI'])) { ?>
    		    
    		    <div>
    			<label for="email" > Электронная почта*: </label>
    			<input id="email_new" name="EMAIL" pattern="[0-9A-Za-z][0-9A-Za-z\.\-_]{0,}[0-9A-Za-z]@[a-z]{1,}\.[a-z]{2,3}" required="required" type="text" maxlength="50" value="<?= $user["EMAIL"] ?>"/>
    		    </div>
		    
		    <div>
    			<label for="password" > Пароль*: </label>
    			<input name="PASSWORD" required="required" type="password" maxlength="50" value=""/>
    		    </div>

		    <?php /*------------------------- Смена пароля -------------------------*/ ?>

		    <? } else if (preg_match('#^/000/pass/.{0,}$#sui', $_SERVER['REQUEST_URI'])) { ?>
		    <?php /*-------------------------  -------------------------* ?>
		    <div>
    			<label> Текущий пароль*: </label>
    			<input name="PASSWORD" required="required" type="password" maxlength="50" value=""/>
    		    </div>
		    <?php /*-------------------------  -------------------------*/ ?>
		    
		    <div>
    			<label> Новый пароль* : </label>
    			<input name="NEW_PASSWORD" required="required" type="password" maxlength="50" value=""/>
    		    </div>
		    
		    <div>
    			<label> Подтвердите новый пароль* : </label>
    			<input name="NEW_PASSWORD_CONFIRM" required="required" type="password" maxlength="50" value=""/>
    		    </div>

		    <?php /* ------------------------- Правка данных ------------------------- */ ?>

		    <? } else { ?>

    		    <div>
    			<label for="lastname" class="lname" data-icon="u" > Фамилия*: </label>
    			<input id="lastname" maxlength="50" name="LAST_NAME" value="<?= $user['LAST_NAME'] ?>" required="required" type="text"/>
    		    </div>
    		    <div>
    			<label for="firstname" class="fname" data-icon="p"> Имя*: </label>
    			<input id="firstname" maxlength="50" name="NAME" value="<?= $user['NAME'] ?>" required="required" />
    		    </div>

    		    <div>
    			<label for="addname" class="addname" data-icon="p"> Отчество: </label>
    			<input id="addname" maxlength="50" name="SECOND_NAME" value="<?= $user['SECOND_NAME'] ?>" />
    		    </div>
    		    <div>
    			<label for="bithday" class="bithday" data-icon="p"> Дата рождения: </label>

			    <?
			    $APPLICATION->IncludeComponent(
				    'bitrix:main.calendar', '', array(
				'SHOW_INPUT' => 'Y',
				'FORM_NAME' => 'form1',
				'INPUT_NAME' => 'PERSONAL_BIRTHDAY',
				'INPUT_VALUE' => $arResult["arUser"]["PERSONAL_BIRTHDAY"],
				'SHOW_TIME' => 'N'
				    ), null, array('HIDE_ICONS' => 'Y')
			    );

			    //=CalendarDate("PERSONAL_BIRTHDAY", $arResult["arUser"]["PERSONAL_BIRTHDAY"], "form1", "15")
			    ?>
    		    </div>
    		    <div>
    			<label for="discont" class="discont" data-icon="p"> Дисконтная карта: </label>
    			<div class="discont_label checkboxes-form">
    			    <div>
    				<input type="checkbox" name="discont-radio" id="discont-radio" value="sms-status" />
    				<label for="discont-radio"><img src="<?= SITE_TEMPLATE_PATH ?>/img/discont.png" alt=""></label>
    			    </div>
    			</div>
    		    </div>

    		    <div class="phone-number-label">
    			<p><b>Телефон*:</b></p>
    			<input type="text" name="PERSONAL_PHONE" pattern="\+7-[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}" value="<?= $user['PERSONAL_PHONE'] ?>" required/>
    		    </div>

    		    <div class="checkboxes-form">
    			<div>
    			    <p>Подписка на e-mail рассылку</p>
    			    <input type="hidden" name="UF_SUBS_MAIL" value="0"/>
    			    <input type="checkbox" name="UF_SUBS_MAIL" id="sms-status" value="Y" <?
				if ($user['UF_SUBS_MAIL'] === '1') {
				    echo 'checked="checked"';
				}
				?>/>
    			    <label for="sms-status">Подписаться</label>
    			</div>

    			<div>
    			    <p>Подписка на sms-уведомления о статусе заказа</p>
    			    <input type="hidden" name="UF_SUBS_SMS" value="0"/>
    			    <input type="checkbox" name="UF_SUBS_SMS" id="sms-status2" value="Y" <?
				if ($user['UF_SUBS_SMS'] === '1') {
				    echo 'checked="checked"';
				}
				?>/>
    			    <label for="sms-status2">Подписаться</label>
    			</div>
    		    </div>
		    
			
		    <? } ?>

		    <div class="bottom-form">
			<div class="text_right">
			    <div class="empty_width"></div>
			    <span>* - поля, обязательные для заполнения</span>
			</div>
			<input type="submit" name="save" value="Сохранить" class="btn-form">
			<input type="reset" value="Отменить" class="btn-form cancel-btn">
		    </div>		    
		</form>

	    </div>
	</div>
    </div>
</div>