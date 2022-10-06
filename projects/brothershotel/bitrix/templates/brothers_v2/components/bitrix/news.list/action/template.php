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
<div class="block_News">
<? foreach ($arResult["ITEMS"] as $arItem) { ?>
    <div class="item-news">
        <div class="wrap_img">
            <img src="<?= $arItem['DETAIL_PICTURE']['SRC'] ?>" alt="">
        </div>
        <div class="title_item">           
            <a href="<?= $arItem['PROPERTIES']['href']['VALUE'] ?>">
                <?= $arItem['PREVIEW_TEXT'] ?>
            </a>
        </div>
    </div>
<? } ?>
</div>

<? /*
  global $USER;
  if ($USER->IsAdmin())
  echo '<pre>';
  print_r($arResult['ITEMS']);
  echo '</pre>'; */
?>