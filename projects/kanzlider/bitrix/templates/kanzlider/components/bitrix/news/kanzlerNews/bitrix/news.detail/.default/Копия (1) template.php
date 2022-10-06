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

<div class="new-open__top">
	<div class="new-open__breadcrumbs breadcrumbs">
		
		<?$APPLICATION->IncludeComponent(
			"bitrix:breadcrumb",
			"news-detail-crumb",
			Array(
			"PATH" => "",
			"SITE_ID" => "s1",
			"START_FROM" => "0"
			)
		);?>
		
	</div>
	<h1 class="new-open__title">
		<?= $arResult['NAME'] ?>
	</h1>
</div>

<div class="new-open__content">
	<div class="new-open__content-block">
		<div class="new-open__image">
			<img src="<?= $arResult['DETAIL_PICTURE']['SRC'] ?>" alt="">
		</div>
		<div class="new-open__text">
			<?= $arResult['~DETAIL_TEXT'] ?>			
		</div>
	</div>
</div>
