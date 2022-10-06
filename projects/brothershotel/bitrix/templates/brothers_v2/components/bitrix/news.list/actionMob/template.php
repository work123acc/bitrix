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

<?
foreach ($arResult["ITEMS"] as $arItem) {
    if ($arItem['IBLOCK_SECTION_ID'] === '11') {
        ?>
        <div class="mobItem">
            <a href="<?= $arItem['PROPERTIES']['href']['VALUE'] ?>">
                <?= $arItem['DETAIL_TEXT'] ?>
            </a>
        </div> 
    <?
    }
}
?>

<?/*
global $USER;
if ($USER->IsAdmin()) {
    echo '<pre>';
    print_r($arResult['ITEMS']);
    //print_r($arResult);
    echo '</pre>';
}*/
?>