<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
	/** @var $this CBitrixComponentTemplate */
	$this->setFrameMode(true);
	
	if(count($arResult["ITEMS"]) == 0) {
		return false;
	}
	
	foreach($arResult["ITEMS"] as $num=>$strBanner) { 
	?>
	<aside class="sidebar-banner">
		<a href="<?= $arResult["BANNERS"][$num]["URL"] ?>">
			<div class="sidebar-banner__bg">
				<?= $strBanner ?>
			</div>
			<div class="sidebar-banner__text">
				<?= $arResult["BANNERS"][$num]["NAME"] ?>
			</div>
		</a>
	</aside>
	
<? } ?>