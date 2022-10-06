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

<? if ($arResult['NavPageCount'] > 1) { 
	$active = 'PAGEN_' . $arResult["NavNum"];
?>

<div class="wrap">
	<div class="pagination  news__pagination">
		<div class="pagination__title">страницы</div>
		
		<? for ($i=1; $i<=$arResult['NavPageCount']; $i++) {
			if (!$_GET[$active]) {
				$_GET[$active] = 1;
			}
			
			if ( intval($_GET[$active]) === $i) {
				$class = ' active';
			} else {
				$class = '';
			}			
		?>	
		
		<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?= $i ?>" class="pagination__button<?= $class ?>">
			<?= $i ?>
		</a>	
		
		<? } ?>
		
	</div>
</div>

<? } ?>