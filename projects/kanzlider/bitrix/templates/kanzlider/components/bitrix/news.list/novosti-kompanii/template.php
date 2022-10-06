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
	
<div class="main-news__slide">	
	<? 
		if ($arResult['ITEMS']) { 
			foreach ($arResult['ITEMS'] as $key=>$item) {
			?>
			
			<div class="main-news__new">
				<div class="main-news__photo">
					<a href="<?= $item['~DETAIL_PAGE_URL'] ?>">
						<img src="<?= $item["DETAIL_PICTURE"]["SRC"] ?>" alt="">
					</a>
					<div class="main-news__date">
						
						<?
							$arDATE = ParseDateTime($item["~DATE_CREATE"], FORMAT_DATETIME);
							echo $arDATE["DD"]." ".ToLower(GetMessage("MONTH_".intval($arDATE["MM"])."_S"))." ".$arDATE["YYYY"];
						?>
						
					</div>
				</div>
				<div class="main-news__new-title">
					<a href="<?= $item['~DETAIL_PAGE_URL'] ?>">
						<?= $item['NAME'] ?>
					</a>
				</div>
				<div class="main-news__description">
					<?= $item['~PREVIEW_TEXT'] ?> 
				</div>
			</div>
			
			<? if ( ( ($key+1) % 2 === 0 ) && ( ($key+1) < count($arResult['ITEMS']) ) ) { ?>
				</div><div class="main-news__slide">
				<? 
				} 				
			}
		}
	?>
	
</div>