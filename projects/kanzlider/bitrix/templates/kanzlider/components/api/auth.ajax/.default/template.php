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
			<div class="header-authorization__title">вы вошли как:</div>
			<div class="header-authorization__name-block">
				
				<a href="/personal/" class="header-authorization__name">
					<? if ( $USER->GetFullName() ) {
						echo $USER->GetFullName();
						} else {
						echo $USER->GetLogin();
					}?>
				</a>
				
				<?
					$rsUsers = CUser::GetList($by = "NAME", $order = "desc",  array("ID" => $USER->GetID() ) , array( 'SELECT'=> array('UF_SKIDKA') )  );
					while ($arUser = $rsUsers->GetNext()) {
						$skidka = intval( $arUser['UF_SKIDKA'] );
					}
				?>
				
				<span class="header-authorization__discount">ваша скидка <?= $skidka ?> %</span>
				
			</div>
			<a href="/personal/" class="header-authorization__button  header-authorization__button--logged">личный кабинет</a>
			<a href="?logout=yes"  class="header-authorization__button  header-authorization__button--logged"><?=Loc::getMessage('AAAP_AJAX_LOGOUT')?></a>
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
						<div class="reg_type_but active">Физ. лицо</div>
						<div class="reg_type_but">Юр. лицо</div>
						
						<div class="reg_type_panel">
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
						
						<div class="reg_type_panel" style="display:none;">
							<? $APPLICATION->IncludeComponent(
								'api:auth.register',
								'newReg',
								array(
								'RESTORE_URL'          => '#api_auth_restore',
								'LOGIN_URL'            => '#api_auth_login',
								'LOGIN_MESS_HEADER'    => $arParams['~LOGIN_MESS_HEADER'],
								'REGISTER_MESS_HEADER' => $arParams['~REGISTER_MESS_HEADER'],
								'RESTORE_MESS_HEADER'  => $arParams['~RESTORE_MESS_HEADER'],
								)
							); ?>
						</div>
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
		
		var a = document.getElementsByClassName('reg_type_but');
		var b = document.getElementsByClassName('reg_type_panel');
		
		if (a[0] && a[1] && b[0] && b[1] ) {
			a[1].onclick = function() {
				a[1].className += ' active';
				a[0].className = 'reg_type_but';
				b[1].style.display = 'block';
				b[0].style.display = 'none';
			}
			a[0].onclick = function() {
				a[0].className += ' active';
				a[1].className = 'reg_type_but';
				b[0].style.display = 'block';
				b[1].style.display = 'none';
			}
		}
	});	
</script>
<?
	$script = ob_get_contents();
	ob_end_clean();
	Asset::getInstance()->addString($script, true, AssetLocation::AFTER_JS);
?>				