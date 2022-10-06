<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

$this->setFrameMode(true);

use Alexkova\Bxready\Draw;

Alexkova\Bxready\Draw::getInstance()->setCurrentTemplate($this);

if ($arParams["BXREADY_LIST_SLIDER"] == "Y") {
    $this->addExternalJS(SITE_TEMPLATE_PATH . '/js/slick/slick.js');
    $this->addExternalCss(SITE_TEMPLATE_PATH . '/js/slick/slick.css', false);
}

$arParams['USE_PRICE_COUNT'] = 'N';
$APPLICATION->IncludeComponent(
	"bitrix:catalog.section", "", $arParams, $component, array("HIDE_ICONS" => "Y")
);

