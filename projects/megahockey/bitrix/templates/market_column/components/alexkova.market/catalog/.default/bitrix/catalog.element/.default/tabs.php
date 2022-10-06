<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

if (is_array($arResult["TABS"]) && count($arResult["TABS"]) > 0) {
    ?>
    <ul class="bxr-detail-tabs hidden-xxs">
	<li data-tab="1">Описание</li>
	<li data-tab="2">Система скидок</li>
         <? if ($arResult['PROPERTIES']['BONUS']['VALUE'] === 'Y') {?>
             <li data-tab="3">Бонус</li>
             
        <?}?>
        <? if ($arResult['PROPERTIES']['GUARANTEE']['VALUE'] === 'Y') {?>
            <li data-tab="4">Гарантия</li>
        <? }?>
	
	<li data-tab="5">Доставка</li>
    </ul>
    <div class="clearfix"></div><?

} ?>
