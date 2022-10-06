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


<? foreach ($arResult['ITEMS'] as $item) { ?>

    <div class="bronItem">

        <div class="titleBron">
            <?= $item['NAME']; ?>
        </div>

        <div class="wrapImg">
            <img src="<?= $item['DETAIL_PICTURE']['SRC']; ?>" alt="">
        </div>

        <div class="descriptionBron">
            <?= $item['~DETAIL_TEXT']; ?>
        </div>

        <div class="orderBron">
            <a href="" class="location">Как добраться?</a>
            <a href="" class="sendBtn">Отправить заявку</a>
        </div>
    </div>
<? } ?>
 