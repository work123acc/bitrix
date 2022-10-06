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
$brands = CIBlockPropertyEnum::GetList(Array('VALUE' => 'ASC'), Array("IBLOCK_ID" => 1, 'CODE' => 'CML2_MANUFACTURER', 'VALUE' => '%'));

while ($brand = $brands->GetNext()) {
    $res = CIBlockElement::GetList(false, array('IBLOCK_ID' => 1, 'PROPERTY_CML2_MANUFACTURER_VALUE' => $brand['VALUE']), array('IBLOCK_ID'));
    if ($el = $res->Fetch()) {
	$brandList[] = trim($brand['VALUE']);
	//my_dump($brand['VALUE'] . $el['CNT']);
    }
}
foreach ($brandList as $key => $b) {
    $brandList[$key] = substr($b, 0, 1);
}
$brandList = array_unique($brandList);
?>

<div class="alhavite-nav">        
    <?
    $x = 0;
    foreach ($brandList as $list) {
	?>
        <div data-slick-index="<?= $x ?>" class="item">
	    <?= $list ?>
        </div>
	<?
	$x++;
    }
    ?>
</div>

<div class="list-nav">
    <?
    $y = 0;
    foreach ($brandList as $list) {
	$brandArray = Array();
	$brands = CIBlockPropertyEnum::GetList(Array('VALUE' => 'ASC'), Array("IBLOCK_ID" => 1, 'CODE' => 'CML2_MANUFACTURER', 'VALUE' => $list . '%'));

	while ($brand = $brands->GetNext()) {
	    $res = CIBlockElement::GetList(false, array('IBLOCK_ID' => 1, 'PROPERTY_CML2_MANUFACTURER_VALUE' => $brand['VALUE']), array('IBLOCK_ID'));
	    if ($el = $res->Fetch()) {
		$brandArray[] = trim($brand["VALUE"]);
	    }
	}
	?>

        <div data-slick-index="<?= $y ?>" class="item2">
    	<i><?= $list ?></i>
    	<ul>
		<?
		foreach ($brandArray as $brand) {
		    $brandURL = preg_replace('#&#', '%26', $brand);
		    //$brand1 = preg_replace('#\*#', '-', $brand);
		    ?>
		    <li><a href="./<?= Cutil::translit($brand, "ru", array("replace_other" => "-")) ?>/?brand=<?= $brandURL ?>"><?= $brand ?></a></li>
		<? } ?>
    	</ul>
        </div>

	<?
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