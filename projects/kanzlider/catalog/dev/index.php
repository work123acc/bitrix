<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("dev");
?><?$APPLICATION->IncludeComponent(
	"api:buyoneclick", 
	".default", 
	array(
		"BIND_USER" => "Y",
		"DELIVERY_SERVICE" => "2",
		"IBLOCK_FIELD" => array(
			0 => "NAME",
			1 => "DETAIL_PICTURE",
			2 => "",
		),
		"IBLOCK_ID" => "2",
		"IBLOCK_TYPE" => "1c_catalog",
		"LOCATION_ID" => "",
		"MESS_ERROR_FIELD" => "#FIELD# обязательное",
		"MESS_SUCCESS_INFO" => "Заказ №#ORDER_ID# от #ORDER_DATE#

Ваш заказ принят для исполнения.
Ожидайте звонка оператора, в ближайшее время он свяжется с Вами для уточнения даты доставки и необходимых деталей.

Если заказ оформлен в ночное время, оператор свяжется с Вами после 9-00.",
		"MESS_SUCCESS_TITLE" => "Спасибо! Ваш заказ принят!",
		"MODAL_FOOTER" => "",
		"MODAL_HEADER" => "ЗАКАЗ В 1 КЛИК",
		"MODAL_TEXT_AFTER" => "Нажатием кнопки «Оформить заказ» я даю свое согласие на обработку персональных данных в соответствии с указанными <a href=\"#\">здесь</a> условиями.",
		"MODAL_TEXT_BEFORE" => "Оставьте пожалуйста свои контактные данные.
Наши менеджеры свяжутся с вами для уточнения деталей заказа.",
		"MODAL_TEXT_BUTTON" => "Оформить заказ",
		"PAY_SYSTEM" => "2",
		"PERSON_TYPE" => "1",
		"REDIRECT_PAGE" => "",
		"SHOW_COMMENT" => "Y",
		"SHOW_QUANTITY" => "Y",
		"USE_JQUERY" => "N",
		"COMPONENT_TEMPLATE" => ".default",
		"SHOW_FIELDS" => array(
		),
		"REQ_FIELDS" => array(
		)
	),
	false
);?>Text here....<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>