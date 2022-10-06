<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "",
        Array(
                "AREA_FILE_SHOW" => "file",
                "PATH" => $arParams["ADDITIONAL_TAB_PATH"],
                "AREA_FILE_RECURSIVE" => "N",
                "EDIT_MODE" => "html",
        ),
        false,
        Array('HIDE_ICONS' => 'Y')
);
