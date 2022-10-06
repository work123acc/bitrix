<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
	/** @var array $arParams */
	/** @var array $arResult */
	/** @global CMain $APPLICATION */
	/** @global CUser $USER */
	/** @global CDatabase $DB */
	/** @var CBitrixComponentTemplate $this */
	/** @var string $templateName */
	/** @var string $templateFile */
	/** @var string $templateFolder */
	/** @var string $componentPath */
	/** @var CBitrixComponent $component */
	$this->setFrameMode(true);
	
	$item = $arResult['ITEMS'][0];
?>

<div class="info-block__subscription-background" style="background-image: url(<?= $item['DETAIL_PICTURE']['SRC'] ?>)">
</div>
<div class="info-block__subscription-desc">
	<?= $item['PROPERTIES']['ZAGOLOVOK']['~VALUE'] ?>
</div>
<div class="info-block__subscription-title">
	<?= $item['PROPERTIES']['ZAGOLOVOK_SKIDKA']['~VALUE'] ?><br>
	<span><?= $item['PROPERTIES']['SKIDKA']['~VALUE'] ?></span>
</div>
<div class="info-block__subscription-sub-title">
	<?= $item['PROPERTIES']['OPISANIE_SKIDKA']['~VALUE'] ?>
</div>
<form action="" class="info-block__subscription-form">
	<div class="info-block__input-block  input-block--required">
		<input id="input-name" type="text" class="info-block__subscription-form-input  info-block__subscription-form-name" placeholder="Имя">
	</div>
	<div class="info-block__input-block  input-block--required">
		<input id="input-email" type="text" class="info-block__subscription-form-input  info-block__subscription-form-email" placeholder="E-mail">
	</div>
	<div class="info-block__input-block  info-block__input-block--submit">
		<input type="submit" value="Подписаться!">
	</div>
</form>