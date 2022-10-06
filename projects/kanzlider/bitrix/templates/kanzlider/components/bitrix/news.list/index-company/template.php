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
	
	<div class="info-block__about-title">
		<?= $item['~PREVIEW_TEXT'] ?> 
		<a href="<?= $item['PROPERTIES']['HREF']['~VALUE'] ?>" class="page-more  info-block__about-more">Подробнее</a>
	</div>
	
	<div class="info-block__about-text">
		<?= $item['~DETAIL_TEXT'] ?> 
	</div>
	
	<div class="info-block__about-advantages">
		
		<div class="info-block__about-advantage-block">
			<div class="info-block__about-advantage-ico">
				<img src="<?= CFile::GetPath( $item['PROPERTIES']['PROP1_IMG']['VALUE'] ) ?>" alt="">
			</div>
			<a href="<?= $item['PROPERTIES']['PROP1_HREF']['~VALUE'] ?>" class="info-block__about-advantage-title">
				<?= $item['PROPERTIES']['PROP1']['~VALUE'] ?>
			</a>
			<div class="info-block__about-advantage-sub-title">
				<?= $item['PROPERTIES']['PROP1_DESC']['~VALUE'] ?>
			</div>
		</div>
		
		<div class="info-block__about-advantage-block">
			<div class="info-block__about-advantage-ico">
				<img src="<?= CFile::GetPath( $item['PROPERTIES']['PROP2_IMG']['VALUE'] ) ?>" alt="">
			</div>
			<a href="<?= $item['PROPERTIES']['PROP2_HREF']['~VALUE'] ?>" class="info-block__about-advantage-title">
				<?= $item['PROPERTIES']['PROP2']['~VALUE'] ?>
			</a>
			<div class="info-block__about-advantage-sub-title">
				<?= $item['PROPERTIES']['PROP2_DESC']['~VALUE'] ?>
			</div>
		</div>
		
		<div class="info-block__about-advantage-block">
			<div class="info-block__about-advantage-ico">
				<img src="<?= CFile::GetPath( $item['PROPERTIES']['PROP3_IMG']['VALUE'] ) ?>" alt="">
			</div>
			<a href="<?= $item['PROPERTIES']['PROP3_HREF']['~VALUE'] ?>" class="info-block__about-advantage-title">
				<?= $item['PROPERTIES']['PROP3']['~VALUE'] ?>
			</a>
			<div class="info-block__about-advantage-sub-title">
				<?= $item['PROPERTIES']['PROP3_DESC']['~VALUE'] ?>
			</div>
		</div>
	</div>
	
<? } ?>

