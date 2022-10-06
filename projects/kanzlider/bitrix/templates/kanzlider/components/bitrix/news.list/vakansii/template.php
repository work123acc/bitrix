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

<div class="jobs__items clear">
	
	<? 
		if ($arResult['ITEMS']) { 
			foreach ($arResult['ITEMS'] as $key=>$item) {
			?>
			
			<div class="jobs__item">
				<div class="jobs__item-title">
					<?= $item['NAME'] ?>
				</div>
				<div class="jobs__item-sub-title">
					Должностные обязанности:
				</div>
				<div class="jobs__item-text">
					<?= $item['~DETAIL_TEXT'] ?> 
				</div>
				<div class="jobs__item-sub-title">
					Требования:
				</div>
				<div class="jobs__item-text">
					<?= $item['~PREVIEW_TEXT'] ?> 
				</div>
			</div>	
			
			<? 
			}
		}
	?>
</div>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]) { ?>
	<br /><?=$arResult["NAV_STRING"]?>
<? } ?>