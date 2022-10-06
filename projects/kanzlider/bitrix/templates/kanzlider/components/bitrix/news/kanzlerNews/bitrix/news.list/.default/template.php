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
		
		<div class="news__item">
			<div class="news__photo">
				<a href="<?= $item['~DETAIL_PAGE_URL'] ?>">
					<img src="<?= $item["PREVIEW_PICTURE"]["SRC"] ?>" alt="">
				</a>
			</div>
			<div class="news__content">
				<div class="news__date">
					
					<?
						$arDATE = ParseDateTime($item["TIMESTAMP_X"], FORMAT_DATETIME);
						echo $arDATE["DD"]." ".ToLower(GetMessage("MONTH_".intval($arDATE["MM"])."_S"))." ".$arDATE["YYYY"];
					?>
					
				</div>
				<a href="<?= $item['~DETAIL_PAGE_URL'] ?>" class="news__item-title">
					<?= $item['NAME'] ?>
				</a>
				<div class="news__desc">
					<?= $item["~PREVIEW_TEXT"] ?>
				</div>
			</div>
		</div>
		
		<?
		}
	}
?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]) { ?>
	<br /><?=$arResult["NAV_STRING"]?>
<? } ?>