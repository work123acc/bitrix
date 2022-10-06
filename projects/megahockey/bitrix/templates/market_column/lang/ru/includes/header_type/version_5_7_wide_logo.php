<div class="bxr-full-width bxr-container-headline head_v5_7_wide_logo <?=($BXReady->inverseHead) ? 'bxr-inverse':''?>">
    <div class="container">
        <div class="row headline">
            <div class="col-lg-4 col-md-4 hidden-sm hidden-xs text-center bxr-v-autosize">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include", 
                    "include_with_btn", 
                    array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => SITE_DIR."include/phone.php",
                            "INCLUDE_PTITLE" => GetMessage("GHANGE_PHONE"),
                            "COMPONENT_TEMPLATE" => "include_with_btn",
                            "SHOW_BTN" => "Y",
                            "BTN_TYPE" => "LINK",
                            "BTN_CLASS" => "recall-btn open-answer-form",
                            "FLOAT" => "NONE",
                            "LINK_TEXT" => "Заказать обратный звонок"
                    ),
                    false
                );?>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 text-center bxr-v-autosize">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "named_area",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => SITE_DIR."include/logo_center.php",
                        "INCLUDE_PTITLE" => GetMessage("GHANGE_LOGO")
                    ),
                    false
                );?>
            </div>
            <div class="col-lg-4 col-md-4 hidden-sm hidden-xs text-center bxr-v-autosize">
                <div class="slogan-wrap">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "named_area",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => SITE_DIR."include/slogan.php",
                            "INCLUDE_PTITLE" => GetMessage("GHANGE_SLOGAN")
                        ),
                        false
                    );?>
                </div>
            </div>
            <div class="hidden-lg hidden-md col-sm-6 col-xs-6 bxr-v-autosize" id="bxr-basket-mobile">

            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div> 