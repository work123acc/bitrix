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
<form name="<? echo $arResult["FILTER_NAME"] . "_form" ?>" action="<? echo $arResult["FORM_ACTION"] ?>" method="get">
    <?
    foreach ($arResult["ITEMS"] as $arItem):
	if (array_key_exists("HIDDEN", $arItem)):
	    echo $arItem["INPUT"];
	endif;
    endforeach;
    ?>
    <table class="data-table" cellspacing="0" cellpadding="2">
	<thead>
	    <tr>
		<td colspan="2" align="center"><?= GetMessage("IBLOCK_FILTER_TITLE") ?></td>
	    </tr>
	</thead>
	<tbody>
	    <? foreach ($arResult["ITEMS"] as $arItem) { ?>
		<? if (!array_key_exists("HIDDEN", $arItem)){ 
		    $arItem["INPUT"] = '<input name="arrFilter_pf[SALE_SKIDKA]" value="Y" type="checkbox"/>';
		    ?>
		    <tr>
			<td valign="top"><?= $arItem["NAME"] ?>:</td>
			<td valign="top"><?= $arItem["INPUT"] ?></td>
		    </tr>
		<? } ?>
	    <? } ?>
	</tbody>
	<tfoot>
	    <tr>
		<td colspan="2">
		    <input type="submit" name="set_filter" value="Применить" class="btn btn-themes"/><input type="hidden" name="set_filter" value="Y" />&nbsp;&nbsp;<input type="submit" class="btn btn-link" name="del_filter" value="Сбросить" /></td>
	    </tr>
	</tfoot>
    </table>
</form>
