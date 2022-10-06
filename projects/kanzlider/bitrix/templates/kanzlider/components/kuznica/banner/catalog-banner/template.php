<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
	/** @var $this CBitrixComponentTemplate */
	$this->setFrameMode(true);
	
	if(count($arResult["ITEMS"]) == 0) {
		return false;
	}
	
	foreach($arResult["ITEMS"] as $num=>$strBanner) { 
	?>
	
	<div class="banner__block">
		<div class="banner__image">
			<?= $strBanner ?>
		</div>
		<a href="<?= $arResult["BANNERS"][$num]["URL"] ?>" class="banner__title">
			<?= $arResult["BANNERS"][$num]["NAME"] ?>
		</a>
		<a href="<?= $arResult["BANNERS"][$num]["URL"] ?>" class="banner__more">Узнать больше</a>
	</div>
	
<? } ?>