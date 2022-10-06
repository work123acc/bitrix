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
	if ($arResult['ITEMS']) { 
		foreach ($arResult['ITEMS'] as $item) {
		?>
		
		<div class="brands__item">
			<a href="<?= $item['~DETAIL_PAGE_URL'] ?>">
				<img src="<?= $item["DETAIL_PICTURE"]["SRC"] ?>" alt="">
			</a>
		</div>
		
		<?
		}
	}
?>