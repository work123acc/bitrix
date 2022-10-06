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
	if ( $arResult['ITEMS'][0] ) {
		$item = $arResult['ITEMS'][0];
	?>
	
	<a href="<?= $item['~DETAIL_PAGE_URL'] ?>" class="main-catalog-item-link">
		<div class="main-catalog-item__background">
			<img src="<?= $item["DETAIL_PICTURE"]["SRC"] ?>" alt="">
		</div>
		<div class="main-catalog-item-ico">   
			<img src="<?= $item["PREVIEW_PICTURE"]["SRC"] ?>" alt="">
		</div>
		<a href="<?= $item['~DETAIL_PAGE_URL'] ?>" class="main-catalog-item-title">
			<?= $item["~PREVIEW_TEXT"] ?>
		</a>
	</a>
	
<? } ?>