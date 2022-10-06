<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
IncludeTemplateLangFile(__FILE__);
?>


<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="ru"> <!--<![endif]-->

    <head>

        <meta charset="utf-8">
        <? $APPLICATION->ShowHead(); ?>
        <title><? $APPLICATION->ShowTitle() ?></title>
        <script src="<?= SITE_TEMPLATE_PATH ?>/libs/jquery/jquery-1.11.2.min.js"></script>

        <link rel="shortcut icon" href="<?= SITE_TEMPLATE_PATH ?>/img/favicon/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon" href="<?= SITE_TEMPLATE_PATH ?>/img/favicon/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?= SITE_TEMPLATE_PATH ?>/img/favicon/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?= SITE_TEMPLATE_PATH ?>/img/favicon/apple-touch-icon-114x114.png">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/fonts.css">
        <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/main.css">
        <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/media.css">
        <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/slick.css">
        <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/slick-theme.css">

        <?php /* ------------------------- Для rooms  ------------------------- */ ?>

        <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/libs/jquery-ui/jquery-ui.min.css">
        <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/libs/jquery-ui/jquery-ui.theme.css">

        <script src="<?= SITE_TEMPLATE_PATH ?>/libs/modernizr/modernizr.js"></script>

        <?php /* ---------------Для rooms, были лишь slick и common----------------- */ ?>

        <script src="<?= SITE_TEMPLATE_PATH ?>/libs/jquery/jquery-3.1.1.min.js"></script>
        <script src="<?= SITE_TEMPLATE_PATH ?>/libs/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?= SITE_TEMPLATE_PATH ?>/js/slick.js"></script>
        <script src="<?= SITE_TEMPLATE_PATH ?>/js/accordion.js"></script>
        <script src="<?= SITE_TEMPLATE_PATH ?>/js/common.js"></script>

    </head>



    <body>
        <div id="panel">

            <? $APPLICATION->ShowPanel(); ?>
        </div>
        <header class="headerMain">

            <div class="container">
                <div class="navbarTop">

                    <div class="locationHeader">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/img/location-icon.png" alt="">
                        <a href="#">
                            <?
                            $APPLICATION->IncludeComponent(
                                    "bitrix:main.include", "", Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => SITE_DIR . "include/location_top.php"
                                    ), false
                            );
                            ?>
                        </a>
                    </div>

                    <div class="logoHeader">

                        <div class="imgwrap">
                            <a href=""><img src="<?= SITE_TEMPLATE_PATH ?>/img/logo.png" alt=""></a>
                        </div>
                        <div class="textLogo">
                            <p>Hotel Brothers</p>
                            <span>гостиничный комплекс</span>
                            <span class="mobileContcat">
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

                    </div>
                    <div class="contactHeader">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/img/phone.png" alt="">
                        <p>
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
                        </p>
                    </div>
                    <button class="toggle_mnu">
                        <span class="sandwich">
                            <span class="sw-topper"></span>
                            <span class="sw-bottom"></span>
                            <span class="sw-footer"></span>
                        </span>
                    </button>

                </div>
            </div>

            <? if ($APPLICATION->GetCurDir() === '/') { ?>
                <div class="howGetTo">
                    <a href="">как к нам добраться?</a>
                </div>
            <? } else { ?>
                <div class="howGetTo roomsMobilePath">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/icons/back_arrow.png" alt="">
                    <a href="">
                        <? $APPLICATION->ShowTitle(true); ?>                
                    </a>

                </div>
            <? } ?>

            <div class="menuHeader">
                <div class="container">
                    <nav>
                        <?
                        $APPLICATION->IncludeComponent(
                                "bitrix:menu", "", Array(
                            "ROOT_MENU_TYPE" => "top",
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
            </div>                        
        </header>


