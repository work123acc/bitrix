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
    		    
    		    <div>
    			<label for="email" > Электронная почта*: </label>
    			<input id="email_new" name="EMAIL" pattern="[0-9A-Za-z][0-9A-Za-z\.\-_]{0,}[0-9A-Za-z]@[a-z]{1,}\.[a-z]{2,3}" required="required" type="text" maxlength="50" value="<?= $user["EMAIL"] ?>"/>
    		    </div>
		    
		    <div>
    			<label for="password" > Пароль*: </label>
    			<input name="PASSWORD" required="required" type="password" maxlength="50" value=""/>
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