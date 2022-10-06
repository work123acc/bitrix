<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>


<footer class="mobFooter">
    <div class="itemFooter">
        <?
        $APPLICATION->IncludeComponent(
            "bitrix:menu", "", Array(
                "ROOT_MENU_TYPE" => "bottom_mob",
                "MENU_CACHE_TYPE" => "A",
                "MENU_CACHE_TIME" => "3600",
                "MENU_CACHE_USE_GROUPS" => "Y",
                "MENU_CACHE_GET_VARS" => array(""),
                "MAX_LEVEL" => "1",
                "CHILD_MENU_TYPE" => "",
                "USE_EXT" => "N",
                "DELAY" => "N",
                "ALLOW_MULTI_SELECT" => "N"
            )
        );
        ?>
    </div>
</footer>

<footer class="mainFooter">
    <div class="container">

        <div class="logoFooter">
            <img src="<?= SITE_TEMPLATE_PATH ?>/img/logo.png" alt="">
        </div>

        <div class="blockFooter">

            <div class="menuFooter">
                <nav>
                    <?
                    $APPLICATION->IncludeComponent(
                        "bitrix:menu", "", Array(
                            "ROOT_MENU_TYPE" => "bottom",
                            "MENU_CACHE_TYPE" => "A",
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "MENU_CACHE_GET_VARS" => array(""),
                            "MAX_LEVEL" => "1",
                            "CHILD_MENU_TYPE" => "",
                            "USE_EXT" => "N",
                            "DELAY" => "N",
                            "ALLOW_MULTI_SELECT" => "N"
                        )
                    );
                    ?>
                    
                </nav>
            </div>

            <div class="contactsFooter">
                <div class="phoneFooter">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/phone.png" alt="">

                    <span>
                        <?
                        $APPLICATION->IncludeComponent(
                                "bitrix:main.include", "", Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => SITE_DIR . "include/phone_top.php"
                                ), false
                        );
                        ?>
                    </span>
                </div>
                <div class="emailFooter">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/email.png" alt="">
                    <span>
                        <?
                        $APPLICATION->IncludeComponent(
                                "bitrix:main.include", "", Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => SITE_DIR . "include/mail_top.php"
                                ), false
                        );
                        ?>

                    </span>
                </div>
                <div class="copyright">
                    <?
                    $APPLICATION->IncludeComponent(
                            "bitrix:main.include", "", Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => SITE_DIR . "include/copyright_top.php"
                            ), false
                    );
                    ?>
                </div>		

            </div>

        </div>

    </div>
</footer>


<!--[if lt IE 9]>
<script src="<?= SITE_TEMPLATE_PATH ?>/libs/html5shiv/es5-shim.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/libs/html5shiv/html5shiv.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/libs/html5shiv/html5shiv-printshiv.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/libs/respond/respond.min.js"></script>
<![endif]-->

</body>
</html>
