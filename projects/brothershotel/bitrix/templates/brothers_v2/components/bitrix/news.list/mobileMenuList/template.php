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
foreach ($arResult['ITEMS'] as $arItem) {
    ?>
    <h3><span class="typeName"><?= $arItem['NAME']; ?></span>
        <div>
            <img src="<?= $arItem['PREVIEW_PICTURE']['SRC']; ?>" alt="">
        </div>
    </h3>

    <div>
        <div class="headerSection rooms">
            <div class="sliderHeader">
                <? foreach ($arItem['DISPLAY_PROPERTIES']['Slider']['FILE_VALUE'] as $slide) { ?>
                    <div>
                        <img src="<?= $slide['SRC']; ?>" alt="">
                    </div>
                <? } ?>
            </div>
        </div>

        <div class="descriptionRooms">
            <p class="priceRoom"><?= $arItem['PROPERTIES']['Price']['VALUE']; ?></p>
            <button class="orderRoom">забонировать</button>

            <div class="textRoom">
                <p><?= $arItem["~DETAIL_TEXT"]; ?></p>
            </div>
        </div>	

    </div>

<? } ?>





