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
//---------------------Для битрикса------------------------------
function my_dump($arg) {
    global $USER;
    if ($USER->IsAdmin()) {
        echo '<pre style="background-color: green; color: white; font-size: 12px; z-index: 9999;">';
        var_dump($arg);
        echo '</pre>';
    }
}
//my_dump($arResult['ITEMS']);
my_dump(123);
?>