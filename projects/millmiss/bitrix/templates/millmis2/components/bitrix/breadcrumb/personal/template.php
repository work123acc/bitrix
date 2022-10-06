<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

/**
 * @global CMain $APPLICATION
 */
global $APPLICATION;

$strReturn = '<a href="' . $arResult[0]['LINK'] . '" class="from_bread">' . $arResult[0]['TITLE'] . '</a>';
for($x=1; $x<count($arResult); $x++) {
   $strReturn .=  '<a href="' . $arResult[$x]['LINK'] . '" class="to_bread">' . $arResult[$x]['TITLE'] .'</a>';
}

return $strReturn;

