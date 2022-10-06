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

<div class="wrap-full-news">
                    <div class="wrap-img-news">
                        <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="">
                    </div>
                    <div class="title-full-news">
                       <?=$arResult["NAME"]?>  
                    </div>
                    <div class="text-full-news">
                     <?=$arResult["DETAIL_TEXT"]?>  
                    </div>
                    <div class="date-news">
                        <img src="<?=SITE_TEMPLATE_PATH?>/img/calendar.svg" alt="">
                        <span><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
                    </div>
                  
                </div>
