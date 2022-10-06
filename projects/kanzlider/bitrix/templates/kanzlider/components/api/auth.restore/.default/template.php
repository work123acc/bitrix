<?php
use Bitrix\Main\Web\Json,
	 Bitrix\Main\Page\Asset,
	 Bitrix\Main\Page\AssetLocation,
	 Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();

/**
 * Bitrix vars
 *
 * @var CBitrixComponentTemplate $this
 * @var ApiQaList                $component
 *
 * @var array                    $arParams
 * @var array                    $arResult
 *
 * @var string                   $templateName
 * @var string                   $templateFile
 * @var string                   $templateFolder
 * @var array                    $templateData
 *
 * @var string                   $componentPath
 * @var string                   $parentTemplateFolder
 *
 * @var CDatabase                $DB
 * @var CUser                    $USER
 * @var CMain                    $APPLICATION
 */

Loc::loadMessages(__FILE__);

if(method_exists($this, 'setFrameMode'))
	$this->setFrameMode(true);

$dataCss = $templateFolder . '/styles.css';
$dataJs  = $templateFolder . '/scripts.js';

$this->addExternalCss($dataCss);
$this->addExternalJs($dataJs);
?>
	<div id="api_auth_restore_<?=$arResult['FORM_ID']?>"
	     class="api_auth_restore"
	     data-css="<?=$dataCss?>"
	     data-js="<?=$dataJs?>">
		<form id="api_auth_restore_form_<?=$arResult['FORM_ID']?>"
		      action="<?=$arParams["RESTORE_URL"]?>"
		      name="api_auth_restore_form_<?=$arResult['FORM_ID']?>"
		      method="post"
		      class="api_form">
			<? if($arParams['BACK_URL'] != ''): ?>
				<input type="hidden" name="backurl" value="<?=$arParams['BACK_URL']?>"/>
			<? endif ?>
			<div class="api_error"></div>
			<div class="api_row">
				<input type="text" name="LOGIN" maxlength="255" value="<?=$arParams['LAST_LOGIN']?>">
			</div>
			<? if($arParams['USE_PRIVACY'] == 'Y' && $arParams['MESS_PRIVACY']): ?>
				<div class="api_row api_privacy">
					<input type="checkbox" name="PRIVACY_ACCEPTED" value="Y" class="api_field" <?=$arResult['PRIVACY_ACCEPTED'] == 'Y' ? ' checked' : ''?>>
					<? if($arParams['MESS_PRIVACY_LINK']): ?>
						<a href="<?=$arParams['~MESS_PRIVACY_LINK']?>" target="_blank"><?=$arParams['~MESS_PRIVACY']?></a>
					<? else: ?>
						<?=$arParams['~MESS_PRIVACY']?>
					<? endif ?>
				</div>
			<? endif ?>
			<div class="api_row">
				<button type="button" class="api_button api_button_primary api_button_large api_button_wait api_width_1_1"><?=Loc::getMessage('API_AUTH_RESTORE_BUTTON')?></button>
			</div>
			<div class="api_row">
				<a class="api_link api_auth_login"
				   href="<?=$arParams['LOGIN_URL']?>"
				   data-header="<?=CUtil::JSEscape($arParams['~LOGIN_MESS_HEADER'])?>"><?=Loc::getMessage('API_AUTH_RESTORE_LOGIN_URL')?></a>
			</div>
		</form>
	</div>
<?
ob_start();
?>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$.fn.apiAuthRestore({
				wrapperId: '#api_auth_restore_<?=$arResult['FORM_ID']?>',
				formId: '#api_auth_restore_form_<?=$arResult['FORM_ID']?>',
				usePrivacy: '<?=$arParams['USE_PRIVACY'] == 'Y'?>',
				mess: {
					'PRIVACY_CONFIRM': '<?=CUtil::JSEscape($arParams['MESS_PRIVACY_CONFIRM'])?>',
				}
			});
		});
	</script>
<?
$script = ob_get_contents();
ob_end_clean();
Asset::getInstance()->addString($script, true, AssetLocation::AFTER_JS);
?>