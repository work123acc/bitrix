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
<div class="wrap_news">
    

<?foreach($arResult["ITEMS"] as $arItem):?>
	 <div class="news_item">
             <? $file = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE']["ID"], array('width'=>391, 'height'=>241), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
                        <img src="<?=$file["src"]?>" alt="">
                        <h3><?=$arItem["NAME"]?></h3>
                        <p><?=$arItem["PREVIEW_TEXT"]?></p>
                        <div class="date-news">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/calendar.svg" alt="">
                            <span><?=$arItem["DISPLAY_ACTIVE_FROM"]?></span>
                        </div>
                        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">Подробнее</a>
                    </div>
<?endforeach;?>
        
     </div>   
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>

