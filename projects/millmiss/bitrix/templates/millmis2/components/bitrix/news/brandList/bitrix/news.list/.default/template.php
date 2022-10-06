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
/*
 * $a = Array();
  foreach ($arResult["ITEMS"] as $item) {
  $a[] = $item['PROPERTIES']['CML2_MANUFACTURER']['VALUE'];
  } */

/*
  $res = CIBlockElement::GetList(Array(), Array('ID' => 1074), Array('PROPERTY_TEST'));
  //$res = CIBlockElement::GetList(Array(), Array('IBLOCK_SECTION_ID' => 376), false, Array(), Array("ID", "NAME"));
  while ($ob = $res->GetNextElement()) {
  $a[] = $ob->GetFields();
  //my_dump($arFields);
  } */
?>

<section class="brands-page">
    <div class="container">
        <div class="title_section">
            <h2>Бренды</h2>
        </div>
        <?
        $stringEN = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $stringRU = 'АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ';
        $stringNUM = '0123456789';
        $arg = $stringEN;
        ?>

        <div class="alhavite-nav">        
            <? getHeadList($stringEN); ?>
        </div>

        <div class="list-nav">
            <?
            getBrandList($stringEN);

            function getHeadList($arg) {
                for ($x = 0; $x < strlen($arg); $x++) {
                    ?>                  
                    <div data-slick-index="<?= $x ?>" class="item">
                        <?= $arg[$x] ?>
                    </div>
                    <?
                }
            }

            function getBrandList($arg) {
                for ($x = 0; $x < strlen($arg); $x++) {
                    $brandList = Array();

                    $brands = CIBlockPropertyEnum::GetList(Array('VALUE' => 'ASC'), Array("IBLOCK_ID" => 1, 'CODE' => 'CML2_MANUFACTURER', 'VALUE' => $arg[$x] . '%'));
                    while ($brand = $brands->GetNext()) {
                        $brandList[] = $brand["VALUE"];
                    }
                    ?>


                    <div data-slick-index="<?= $x ?>" class="item2">
                        <i><?= $arg[$x] ?></i>
                        <ul>
                            <? foreach ($brandList as $brand) { ?>
                                <li><a href="/000/<?= Cutil::translit($brand,"en",array() ); ?>/"><?= $brand ?></a></li>
                            <? } ?>
                        </ul>
                    </div>

                    <?
                }
            }
            ?>
        </div>
    </div>
</sectoin>

<?
//---------------------Для битрикса------------------------------
function my_dump($arg) {
    global $USER;
    if ($USER->IsAdmin()) {
        echo '<pre style="background-color: green; color: white; font-size: 13px; z-index: 9999;">';
        var_dump($arg);
        echo '</pre>';
    }
}
//my_dump( $arResult['ITEMS'][0]['PROPERTIES']['CML2_MANUFACTURER']['VALUE'] );
?>