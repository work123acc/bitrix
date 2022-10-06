<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if(isset($_REQUEST["print"]) && $_REQUEST["print"]=="y" && (!isset($arParams["PRINT_ORDER"]) || $arParams["PRINT_ORDER"] == "Y" )) {
    $APPLICATION->RestartBuffer();
    $filename = $_SERVER["DOCUMENT_ROOT"]."".SITE_TEMPLATE_PATH."/include/header_type/version_print.php";
    if (file_exists($filename)) {
        include($filename);
    }
}
foreach ($arResult["GRID"]["ROWS"] as $k => $arItem):
    $parent = CCatalogProduct::GetByIDEx($arItem["PRODUCT_ID"]);
    $parentId = $parent["PROPERTIES"]["CML2_LINK"]["VALUE"];
    if ($parentId) {
        $arParent = CCatalogProduct::GetByIDEx($parentId);
        $arResult["GRID"]["ROWS"][$k]["PARENT"]["DETAIL_PAGE_URL"] = $arParent["DETAIL_PAGE_URL"];
    }
endforeach;

$arResult["CURRENCY"] = CCurrency::GetBaseCurrency();
$arResult["CURRENCY_FORMAT"] = CCurrencyLang::GetFormatDescription($arResult["CURRENCY"]);
$arResult["CURRENCY_FORMAT"] = rtrim($arResult["CURRENCY_FORMAT"]["FORMAT_STRING"], '.');

$arResult["MIN_ORDER_PRICE"] = COption::GetOptionString("alexkova.market", "bxr_min_order_price");
$arResult["MIN_ORDER_PRICE_FORMATED"] = str_replace('#', $arResult["MIN_ORDER_PRICE"], $arResult["CURRENCY_FORMAT"]);
$addPrice = round($arResult["MIN_ORDER_PRICE"] - $arResult["allSum"], 2);
$arResult["ADD_PRICE_FORMATED"] = str_replace('#', $addPrice, $arResult["CURRENCY_FORMAT"]);

$arResult["MIN_ORDER_PRICE_MSG"] = COption::GetOptionString("alexkova.market", "bxr_min_order_price_msg");
$arResult["MIN_ORDER_PRICE_MSG_FLAGS"] = $arResult["MIN_ORDER_PRICE_MSG"];
$arResult["MIN_ORDER_PRICE_MSG"] = str_replace("#MIN_ORDER_PRICE#", $arResult["MIN_ORDER_PRICE_FORMATED"], $arResult["MIN_ORDER_PRICE_MSG"]);
$arResult["MIN_ORDER_PRICE_MSG"] = str_replace("#ADD_ORDER_PRICE#", $arResult["ADD_PRICE_FORMATED"], $arResult["MIN_ORDER_PRICE_MSG"]);