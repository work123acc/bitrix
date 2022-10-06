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
 	//my_dump( $arResult['SECTION'] ) ;
?>	

<? 
	if ( $arResult['SECTION']['ID'] > 0 ) {
		$item = $arResult['SECTION'];
	?>
	
	<a href="<?= $item['~SECTION_PAGE_URL'] ?>>" class="main-catalog-item-link">
		<div class="main-catalog-item__background">			
			<img src="<?= CFile::GetPath($item["PICTURE"]) ?>" alt="">
		</div>
		<div class="main-catalog-item-ico">   
			<img src="<?= CFile::GetPath($item["DETAIL_PICTURE"]) ?>" alt="">
		</div>
		<a href="<?= $item['~SECTION_PAGE_URL'] ?>" class="main-catalog-item-title">
			<?= $item["DESCRIPTION"] ?>
		</a>
	</a>
	
<? } ?>
