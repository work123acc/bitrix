<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
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


<? foreach ($arResult['ITEMS'] as $arItem) { 
    if ($arItem["DETAIL_PAGE_URL"] === $APPLICATION->GetCurPage() ) {
        $style = ' style="color: blue; text-decoration:underline;"';
    } else {    
        $style= '';
    }
    ?>

    <h3>
        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"<?=$style;?>>
           <?= $arItem['NAME']; ?>
        </a>
        
        <div>
            <img src="<?= $arItem['PREVIEW_PICTURE']['SRC']; ?>" alt="">
        </div>
    </h3>

<? } ?>