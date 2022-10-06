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
?>
<? 
	if ( count($arResult['ITEMS']) > 0 ) {
		foreach ($arResult['ITEMS'] as $item) { 
		?>
		
		<a href="<?= $item['PROPERTIES']['HREF']['VALUE'] ?>" class="slide main-catalog-offers__link">
			<div class="main-catalog-offers__background">
				<img src="<?= $item["PREVIEW_PICTURE"]["SRC"] ?>" alt="">
			</div>						
			
			<div class="main-catalog-offers__title">
				<?= $item['~PREVIEW_TEXT'] ?> 
			</div>
		</a>
		<?
		}
	}
?>