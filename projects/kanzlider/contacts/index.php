<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
	$APPLICATION->SetTitle("Контакты");
?>
<main class="main">
	<section class="contacts">
		<div class="wrap">
			<div class="contacts__content">
				<div class="contacts__top">
					<h1 class="main-title  contacts__title">
						<?= $APPLICATION->GetTitle(); ?>
					</h1>
				</div>
				
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
					"AREA_FILE_SHOW" => "file",
					"AREA_FILE_SUFFIX" => "inc",
					"EDIT_TEMPLATE" => "",
					"PATH" => SITE_DIR."include/contacts-page.php"
					),
					false
				);?>
				
			</div>
			<div class="contacts__form">
				<div class="contacts__form-title">
					Ваши данные:
				</div>
				
				<?$APPLICATION->IncludeComponent(
					"api:main.feedback",
					"contacts-message",
					Array(
					"ADMIN_EVENT_MESSAGE_ID" => array("51"),
					"AJAX_MODE" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"BCC" => "da_1902@mail.ru",
					"BRANCH_ACTIVE" => "N",
					"BUTTON_TEXT_BEFORE" => "",
					"CUSTOM_FIELDS" => array(""),
					"DATETIME" => "",
					"DEFAULT_OPTION_TEXT" => "-- Выбрать --",
					"DIR_URL" => "",
					"DISABLE_SEND_MAIL" => "N",
					"DISPLAY_FIELDS" => array("AUTHOR_NAME","AUTHOR_EMAIL","AUTHOR_MESSAGE"),
					"EMAIL_ERROR_MESS" => "Указанный E-mail некорректен",
					"EMAIL_TO" => "89043667630@ya.ru",
					"FIELD_BORDER_ACTIVE" => "",
					"FIELD_BOX_SHADOW_ACTIVE" => "",
					"FIELD_ERROR_MESS" => "#FIELD_NAME# обязательное",
					"FIELD_NAME_POSITION" => "horizontal",
					"FIELD_SIZE" => "default",
					"FORM_AUTOCOMPLETE" => "Y",
					"FORM_CLASS" => "",
					"FORM_FIELD_WIDTH" => "",
					"FORM_LABEL_TEXT_ALIGN" => "left",
					"FORM_LABEL_WIDTH" => "150",
					"FORM_SUBMIT_CLASS" => "uk-button",
					"FORM_SUBMIT_STYLE" => "",
					"FORM_SUBMIT_VALUE" => "Отправить сообщение",
					"FORM_TEXT_AFTER" => "",
					"FORM_TEXT_BEFORE" => "",
					"FORM_TITLE" => "Обратная связь",
					"FORM_TITLE_LEVEL" => "2",
					"HIDE_ASTERISK" => "N",
					"HIDE_FIELD_NAME" => "N",
					"HIDE_FORM_AFTER_SEND" => "Y",
					"IBLOCK_ELEMENT_ACTIVE" => "N",
					"IBLOCK_ID" => "13",
					"IBLOCK_TYPE" => "forms",
					"INCLUDE_AUTOSIZE" => "N",
					"INCLUDE_CHOSEN" => "N",
					"INCLUDE_CSSMODAL" => "N",
					"INCLUDE_ICHECK" => "N",
					"INCLUDE_INPUTMASK" => "N",
					"INCLUDE_JQUERY" => "N",
					"INCLUDE_PLACEHOLDER" => "N",
					"INCLUDE_TOOLTIPSTER" => "N",
					"INCLUDE_VALIDATION" => "N",
					"INSTALL_IBLOCK" => "N",
					"MODAL_BUTTON_CLASS" => "uk-button uk-button-danger",
					"MODAL_BUTTON_HTML" => "Обратная связь",
					"MODAL_FOOTER_HTML" => "&copy; Форма обратной связи +",
					"MODAL_HEADER_HTML" => "Обратная связь",
					"MODAL_WIDTH" => "",
					"OK_TEXT" => "Ваше сообщение успешно отправлено!",
					"OK_TEXT_AFTER" => "Мы свяжемся с Вами в самое ближайшее время.",
					"PAGE_TITLE" => "",
					"PAGE_URI" => "",
					"PAGE_URL" => "",
					"REDIRECT_PAGE" => "",
					"REPLACE_FIELD_FROM" => "Y",
					"REQUEST_VARS" => array("",""),
					"REQUIRED_FIELDS" => array("AUTHOR_NAME","AUTHOR_EMAIL","AUTHOR_MESSAGE"),
					"SCROLL_TO_FORM_IF_MESSAGES" => "N",
					"SCROLL_TO_FORM_SPEED" => "1000",
					"SERVER_VARS" => array("",""),
					"SHOW_CSS_MODAL_AFTER_SEND" => "N",
					"SHOW_FILES" => "N",
					"SUBJECT" => "",
					"TEMPLATE_STYLE" => "uikit",
					"TITLE_DISPLAY" => "Y",
					"UNIQUE_FORM_ID" => "form-message",
					"USER_AUTHOR_ADRESS" => "",
					"USER_AUTHOR_CITY" => "",
					"USER_AUTHOR_EMAIL" => "",
					"USER_AUTHOR_FAX" => "",
					"USER_AUTHOR_FIO" => "",
					"USER_AUTHOR_ICQ" => "",
					"USER_AUTHOR_LAST_NAME" => "",
					"USER_AUTHOR_MAILBOX" => "",
					"USER_AUTHOR_MESSAGE" => "",
					"USER_AUTHOR_MESSAGE_THEME" => "",
					"USER_AUTHOR_NAME" => "",
					"USER_AUTHOR_NOTES" => "",
					"USER_AUTHOR_PERSONAL_MOBILE" => "",
					"USER_AUTHOR_PERSONAL_PHONE" => "",
					"USER_AUTHOR_POSITION" => "",
					"USER_AUTHOR_PROFESSION" => "",
					"USER_AUTHOR_SECOND_NAME" => "",
					"USER_AUTHOR_SKYPE" => "",
					"USER_AUTHOR_STATE" => "",
					"USER_AUTHOR_STREET" => "",
					"USER_AUTHOR_WORK_CITY" => "",
					"USER_AUTHOR_WORK_COMPANY" => "",
					"USER_AUTHOR_WORK_MAILBOX" => "",
					"USER_AUTHOR_WORK_PHONE" => "",
					"USER_AUTHOR_WORK_WWW" => "",
					"USER_AUTHOR_WWW" => "",
					"USER_EVENT_MESSAGE_ID" => array(),
					"USE_AGREEMENT" => "N",
					"USE_CAPTCHA" => "N",
					"USE_HIDDEN_PROTECTION" => "Y",
					"USE_YM_GOALS" => "N",
					"UUID_LENGTH" => "10",
					"UUID_PREFIX" => "",
					"WRITE_MESS_DIV_STYLE" => "padding:10px;border-bottom:1px dashed #dadada;",
					"WRITE_MESS_DIV_STYLE_NAME" => "font-weight:bold;",
					"WRITE_MESS_DIV_STYLE_VALUE" => "",
					"WRITE_MESS_FILDES_TABLE" => "N",
					"WRITE_MESS_TABLE_STYLE" => "font-family: Open Sans,Tahoma,Arial,sans-serif; font-size: 13px; border-collapse:collapse; border-spacing:0;",
					"WRITE_MESS_TABLE_STYLE_NAME" => "border: 1px solid #e0e0e0; border-left-color:#fff; padding: 5px 30px 5px 0px; vertical-align: middle;",
					"WRITE_MESS_TABLE_STYLE_VALUE" => "border: 1px solid #e0e0e0; border-right-color:#fff; padding: 5px 30px 5px 10px; vertical-align: middle;",
					"WRITE_ONLY_FILLED_VALUES" => "Y"
					)
				);?>
				
			</div>
		</div>
	</section>
	
	    <section class="catalog-page-offer">
        <div class="wrap">
          <div class="catalog-page-offer__left">
            <div class="catalog-page-offer__desc">вам по секрету:</div>
            <div class="catalog-page-offer__title">дарим скидку <b>500 рублей</b></div>
          </div>
          <div class="catalog-page-offer__right">
            <div class="catalog-page-offer__sub-title">
              просто за подписку на новости
            </div>
                   <?$APPLICATION->IncludeComponent(
	"asd:subscribe.quick.form",
	"",
	Array(
		"FORMAT" => "text",
		"INC_JQUERY" => "N",
		"NOT_CONFIRM" => "Y",
		"RUBRICS" => array("1"),
		"SHOW_RUBRICS" => "N"
	)
);?> 
          </div>
        </div>
        <a href="" class="catalog-page-offer__close"></a>
      </section>
</main>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>