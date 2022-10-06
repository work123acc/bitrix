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
<div class="owl-carousel owl-slider_header">
<?foreach($arResult["ITEMS"] as $arItem):?>
    <div>
        <?if($arItem["PROPERTIES"]["href"]["VALUE"]!=""){?>
        <a href="<?=$arItem["PROPERTIES"]["href"]["VALUE"]?>">
             <img src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>" alt="">
        </a>
        <?}else{?>
             <img src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>" alt="">
        <?}?>
           
    </div>
    
						
<?endforeach;?>
						
</div>
<?
//echo "<pre>";
//print_r($arItem);
//echo "</pre>";
?>

