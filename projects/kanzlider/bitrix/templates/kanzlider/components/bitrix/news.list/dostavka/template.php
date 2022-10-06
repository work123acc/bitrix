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
	
	if ( $arResult['ITEMS'][0] ) {
		$item = $arResult['ITEMS'][0];
	?>
	
	
	<div class="delivery__left">
		<div class="delivery__buttons">
			<a href="<?= $item['PROPERTIES']['HREF1']['~VALUE'] ?>" class="adv__button delivery__button  delivery__button--price">
				<?= $item['PROPERTIES']['HREF1_TEXT']['~VALUE']['TEXT'] ?>
			</a>
			<a href="<?= $item['PROPERTIES']['HREF2']['~VALUE'] ?>" class="adv__button delivery__button  delivery__button--method">
				<?= $item['PROPERTIES']['HREF2_TEXT']['~VALUE']['TEXT'] ?>
			</a>
		</div>
		<div class="delivery__text">
			<?= $item['~DETAIL_TEXT'] ?> 
		</div>
	</div>
	
<? } ?>

