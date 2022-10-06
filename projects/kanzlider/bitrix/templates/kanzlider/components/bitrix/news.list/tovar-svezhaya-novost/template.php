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
	
	<div class="sidebar-news__photo">
		<a href="<?= $item['DETAIL_PAGE_URL']?>" tabindex="0">
			<img src="<?= $item['PREVIEW_PICTURE']['SRC']?>" alt="">
		</a>
		<div class="sidebar-news__date">
			<?
				$arDATE = ParseDateTime($item["~DATE_CREATE"], FORMAT_DATETIME);
				echo $arDATE["DD"]." ".ToLower(GetMessage("MONTH_".intval($arDATE["MM"])."_S"))." ".$arDATE["YYYY"];
			?>
		</div>
	</div>
	<div class="sidebar-news__new-title">
		<a href="<?= $item['DETAIL_PAGE_URL']?>"><?= $item['NAME']?></a>
	</div>
	<div class="sidebar-news__description">
		<?= $item['~PREVIEW_TEXT']?> 
	</div>
	<a href="<?= $item['DETAIL_PAGE_URL']?>" class="big-button  sidebar-news__more-button">Подробнее</a>
	
<? } ?>

