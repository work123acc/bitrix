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

$brandList = array();
$arBrand = array();

$arBr = array();
$arSelect = Array("ID", "IBLOCK_ID", "PROPERTY_CML2_MANUFACTURER");
$arFilter = Array("IBLOCK_ID" => 1);
$res = CIBlockElement::GetList(Array('VALUE' => 'ASC'), $arFilter, false, false, $arSelect);

while ($ob = $res->GetNextElement()) {
    $arFields = $ob->GetFields();
    $arBr[strtoupper($arFields["PROPERTY_CML2_MANUFACTURER_VALUE"])] = $arFields["ID"];
    //$arBr[$arFields["PROPERTY_CML2_MANUFACTURER_VALUE"]] = $arFields["ID"];
}

ksort($arBr);
foreach ($arBr as $key => $b) {
    if ($key == '') {
	unset($arBr[$key]);
    } else {
	 $brandList[] = substr($key, 0, 1);
    }
}
$brandList = array_unique($brandList);
//my_dump( $brandList );
//my_dump($arBr);

?>

<div class="alhavite-nav">        
    <?
    $x = 0;
    foreach ($brandList as $b) {
	?>
        <div data-slick-index="<?= $x ?>" class="item">
	    <?= $b ?>
        </div>
	<?
    }
    $x++;
    ?>
</div>

<div class="list-nav">
    <?
    $y = 0;
    foreach ($brandList as $b) {
	?>

        <div data-slick-index="<?= $y ?>" class="item2">
    	<i><?= $b ?></i>
    	<ul>
		<?
		foreach ($arBr as $brand => $id) {
		    if (substr($brand, 0, 1) === $b) {

			$brandURL = preg_replace('#&#', '%26', $brand);
			//$brand1 = preg_replace('#\*#', '-', $brand);
			?>
	    	    <li><a href="./<?= Cutil::translit($brand, "ru", array("replace_other" => "-")) ?>/?brand=<?= $brandURL ?>"><?= $brand ?></a></li>
		    <?
		    }
		}
		?>
    	</ul>
        </div>

	<?
	$y++;
    }
    ?>
</div>  

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
//my_dump(123);
?>