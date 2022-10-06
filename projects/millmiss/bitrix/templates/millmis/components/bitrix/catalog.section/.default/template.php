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
$minPrice = (isset($arItem['RATIO_PRICE']) ? $arItem['RATIO_PRICE'] : $arItem['MIN_PRICE']);


?>
<div class="prods_row">
    <?foreach ($arResult['ITEMS'] as $key => $arItem){
        
        $productTitle = (
		isset($arItem['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'])&& $arItem['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'] != ''
		? $arItem['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
		: $arItem['NAME']
	);
$minPrice = false;
	if (isset($arItem['MIN_PRICE']) || isset($arItem['RATIO_PRICE']))
		
        ?>
        <div class="prod_item">
            <div class="wrap_img">
                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                        <?if($arItem['PREVIEW_PICTURE']['SRC']==""){?>
                            <img src="/img/products/kat_1.png" alt="">
                        <?}else{?>
                            <?$file = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE']['ID'], array('width'=>209, 'height'=>180), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
<!--                            <img src="<?=$file["src"]?>" alt="">-->
                            <img src="<?=$arItem['DETAIL_PICTURE']["SRC"]?>" style="max-width: 209px" alt="">
                        <?}?>
                        
                    </a>
            </div>
            <div class="about">
                    <p class="title"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["PROPERTIES"]["NAIMENOVANIE_DLYA_SAYTA"]["VALUE"]?></a></p>
                    
            </div>
            <p class="price"><?=$arItem['MIN_PRICE']["VALUE"]?> <img src="/img/rouble_blue.svg" alt=""></p>
    </div>
        
    <?}?>
</div>
<div class="next_more">
    <?
    if ($arParams["DISPLAY_BOTTOM_PAGER"])
	{
		?><? echo $arResult["NAV_STRING"]; ?><?
	}
    ?>
</div>
<?
//    echo "<pre>";
//print_r($arResult);
//echo "</pre>";
?>