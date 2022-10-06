<?php
	use Bitrix\Main\Page\Asset,
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
	
	$this->addExternalCss($templateFolder . '/styles.css');
	$this->addExternalJs($templateFolder . '/scripts.js');
?>
<div class="api_auth_ajax">
	
	<? if($USER->IsAuthorized()) { ?>
		<div class="api_profile">
			<a href="/personal/">Личный кабинет</a>
			<a href="?logout=yes"><?=Loc::getMessage('AAAP_AJAX_LOGOUT')?></a>
		</div>
		
	<? } else { ?>
	
		<? if($arParams['LOGIN_MESS_LINK']) { ?>
			<a class="api_link <?=$arParams['~LOGIN_BTN_CLASS']?> header-authorization__button  header-authorization__button--login" href="#api_auth_login"
			data-header="<?=CUtil::JSEscape($arParams['~LOGIN_MESS_HEADER'])?>">		
				<?=$arParams['~LOGIN_MESS_LINK']?>		
			</a>
		<? } ?>
		
		<? if($arParams['REGISTER_MESS_LINK']) { ?>
			<a class="api_link <?=$arParams['~REGISTER_BTN_CLASS']?> header-authorization__button  header-authorization__button--register" href="#api_auth_register"
			data-header="<?=CUtil::JSEscape($arParams['~REGISTER_MESS_HEADER'])?>">		
				<?=$arParams['~REGISTER_MESS_LINK']?>		
			</a>
		<? } ?>
		
		<div id="api_auth_ajax_modal" class="api_modal">
			<div class="api_modal_dialog">
				<div class="api_modal_close"></div>
				<div class="api_modal_header"></div>
				<div class="api_modal_content">
					<div id="api_auth_login">
						
						<? $APPLICATION->IncludeComponent(
							'api:auth.login',
							'',
							array(
							'RESTORE_URL'          => '#api_auth_restore',
							'REGISTER_URL'         => '#api_auth_register',
							'LOGIN_MESS_HEADER'    => $arParams['~LOGIN_MESS_HEADER'],
							'REGISTER_MESS_HEADER' => $arParams['~REGISTER_MESS_HEADER'],
							'RESTORE_MESS_HEADER'  => $arParams['~RESTORE_MESS_HEADER'],
							)
						); ?>
					</div>
					<div id="api_auth_register">
						<? $APPLICATION->IncludeComponent(
							'api:auth.register',
							'',
							array(
							'RESTORE_URL'          => '#api_auth_restore',
							'LOGIN_URL'            => '#api_auth_login',
							'LOGIN_MESS_HEADER'    => $arParams['~LOGIN_MESS_HEADER'],
							'REGISTER_MESS_HEADER' => $arParams['~REGISTER_MESS_HEADER'],
							'RESTORE_MESS_HEADER'  => $arParams['~RESTORE_MESS_HEADER'],
							)
						); ?>
					</div>
					<div id="api_auth_restore">
						<? $APPLICATION->IncludeComponent(
							'api:auth.restore',
							'',
							array(
							'LOGIN_URL'            => '#api_auth_login',
							'LOGIN_MESS_HEADER'    => $arParams['~LOGIN_MESS_HEADER'],
							'REGISTER_MESS_HEADER' => $arParams['~REGISTER_MESS_HEADER'],
							'RESTORE_MESS_HEADER'  => $arParams['~RESTORE_MESS_HEADER'],
							)
						); ?>
					</div>
				</div>
			</div>
		</div>
	<? } ?>
</div>
<?
	ob_start();
?>
<script type="text/javascript">
	jQuery(document).ready(function ($) {
		$.fn.apiAuthAjax({
			modalId: '#api_auth_ajax_modal',
			authId: '.api_auth_ajax',
		});
		});	
	</script>
	<?
		$script = ob_get_contents();
		ob_end_clean();
		Asset::getInstance()->addString($script, true, AssetLocation::AFTER_JS);
	?>		