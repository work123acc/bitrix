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

<? foreach ($arResult["ITEMS"] as $arItem) {?>
    <a href="<?=$arItem["PROPERTIES"]["href"]["VALUE"]?>"><img src="<?= $arItem['DETAIL_PICTURE']['SRC'] ?>" alt=""></a>       
<? } ?>
     
<?/*
global $USER;
if ($USER->IsAdmin()) {
    echo '<pre>';
    print_r($arResult['ITEMS']);
    //print_r($arResult);
    echo '</pre>';
}*/
?>