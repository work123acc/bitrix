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

<? $user = $arResult['arUser']; ?>


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