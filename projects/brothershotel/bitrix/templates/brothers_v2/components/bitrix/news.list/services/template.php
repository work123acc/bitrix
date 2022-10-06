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

<?php /* ------------------------- Услуги Отеля ------------------------- */ ?>
<div class="services-item">    
    <p class="titleSection">
        <?
        $APPLICATION->IncludeComponent(
                "bitrix:main.include", "", Array(
            "AREA_FILE_SHOW" => "file",
            "AREA_FILE_SUFFIX" => "inc",
            "EDIT_TEMPLATE" => "",
            "PATH" => SITE_DIR . "include/services/1.php"
                ), false
        );
        ?>
    </p>
    <div class="blocksServies">

        <?
        foreach ($arResult["ITEMS"] as $arItem) {
            if ($arItem['IBLOCK_SECTION_ID'] === '10') {
                ?>
                <div class="block-services">
                    <img src="<?= $arItem['DETAIL_PICTURE']['SRC'] ?>" alt="">
                    <div class="overlayTitle">          
                        <a href="<?= $arItem['PROPERTIES']['href']['VALUE'] ?>">
                            <?= $arItem['NAME'] ?>
                        </a>
                    </div>
                </div>
                <?
            }
        }
        ?>
    </div>
</div>

<?php /* ------------------------- Услуги Ресторана ------------------------- */ ?>
<div class="services-item">    
    <p class="titleSection">
        <?
        $APPLICATION->IncludeComponent(
                "bitrix:main.include", "", Array(
            "AREA_FILE_SHOW" => "file",
            "AREA_FILE_SUFFIX" => "inc",
            "EDIT_TEMPLATE" => "",
            "PATH" => SITE_DIR . "include/services/2.php"
                ), false
        );
        ?>
    </p>
    <div class="blocksServies">

        <?
        foreach ($arResult["ITEMS"] as $arItem) {
            if ($arItem['IBLOCK_SECTION_ID'] === '9') {
                ?>
                <div class="block-services">
                    <img src="<?= $arItem['DETAIL_PICTURE']['SRC'] ?>" alt="">
                    <div class="overlayTitle">          
                        <a href="<?= $arItem['PROPERTIES']['href']['VALUE'] ?>">
                            <?= $arItem['NAME'] ?>
                        </a>
                    </div>
                </div>
                <?
            }
        }
        ?>
    </div>
</div>

<?/*
global $USER;
if ($USER->IsAdmin()) {
    echo '<pre>';
    print_r($arResult['ITEMS']);
    //print_r($arResult);
    echo '</pre>';
}*/
?>