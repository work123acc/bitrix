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
//my_dump($arResult['ITEMS'][0]);
$minPrice = (isset($arItem['RATIO_PRICE']) ? $arItem['RATIO_PRICE'] : $arItem['MIN_PRICE']);
?>
<?
if (CModule::IncludeModule('orion.infinitescroll')) {

    COrionInfiniteScroll::SetOptions(
	    array(
	"float_bar_show" => 0,
	"nav_bar_show" => 0,
	"has_float_items" => true,
	'btn_more_results' => array('label' => 'Показать ещё...', "class" => "next_more_button"),
	// "has_float_items" => true,
	//'btn_more_results'=>array('label' => 'Ещё...',"class"=>"pagen"), 
	"loadNextPageMode" => 0,
	'pageNavClickMode' => 2,
	    //          'has_float_items' => true,
	    ), $arResult['NAV_RESULT']->NavNum
    );

    $sBeginMark = COrionInfiniteScroll::GetBeginMark($arResult['NAV_RESULT']->NavNum);
    $sEndMark = COrionInfiniteScroll::GetEndMark($arResult['NAV_RESULT']->NavNum);
}
?>
<div class="prods_row">
    <?= $sBeginMark; ?>
    <?
    foreach ($arResult['ITEMS'] as $key => $arItem) {

	$productTitle = (
		isset($arItem['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']) && $arItem['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'] != '' ? $arItem['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'] : $arItem['NAME']
		);
	$minPrice = false;
	if (isset($arItem['MIN_PRICE']) || isset($arItem['RATIO_PRICE']))
	    
	    ?>
	<?
	if ($arItem["MIN_PRICE"]["VALUE"] > $arItem["MIN_PRICE"]["DISCOUNT_VALUE"]) {
	    $flag_discount = true;
	} else {
	    $flag_discount = false;
	}
	?>
    
        <div class="prod_item">

	    <?
	    if ($flag_discount) {
		?>
		<div class="share_procent">
		    <span>-<?= $arItem["MIN_PRICE"]["DISCOUNT_DIFF_PERCENT"] ?>%</span>
		</div>
	    <? } ?>

    	<div class="wrap_img">
    	    <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
		    <? if ($arItem['PREVIEW_PICTURE']['SRC'] == "") { ?>
			<img src="<?= SITE_TEMPLATE_PATH ?>/img/products/kat_1.png" alt="">
		    <? } else { ?>
			<? $file = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE']['ID'], array('width' => 209, 'height' => 180), BX_RESIZE_IMAGE_PROPORTIONAL, true); ?>
			<!--                            <img src="<?= $file["src"] ?>" alt="">-->
			<img src="<?= $arItem['DETAIL_PICTURE']["SRC"] ?>" style="max-width: 209px" alt="">
		    <? } ?>

    	    </a>
    	</div>
    	<div class="about">
    	    <p class="title"><a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><?= $arItem["PROPERTIES"]["NAME_TOVAR_SITE"]["VALUE"] ?></a></p>
		<?
		$descr = "";
		$arDescr = array(
		    $arItem["PROPERTIES"]["TIP_NABORA_1"]["VALUE"],
		    $arItem["PROPERTIES"]["TIP_PARFYUMERII"]["VALUE"],
		    $arItem["PROPERTIES"]["TIP_KOSMETIKI"]["VALUE"],
		    $arItem["PROPERTIES"]["TIP_KOSMETIKI_1"]["VALUE"],
		    $arItem["PROPERTIES"]["TIP_NABORA"]["VALUE"],
		    $arItem["PROPERTIES"]["TIP_KOSMETIKI_2"]["VALUE"],
		    $arItem["PROPERTIES"]["TIP_KOSMETIKI_DLYA_GLAZ"]["VALUE"],
		    $arItem["PROPERTIES"]["TIP_KOSMETIKI_DLYA_NOGTEY"]["VALUE"],
		    $arItem["PROPERTIES"]["TIP_KOSMETIKI_DLYA_BROVEY"]["VALUE"],
		    $arItem["PROPERTIES"]["TIP_AKSESSUARA_DLYA_MAKIYAZHA"]["VALUE"],
		    $arItem["PROPERTIES"]["TIP_UKHODA_DLYA_LITSA"]["VALUE"],
		    $arItem["PROPERTIES"]["TIP_UKHODA_ZA_TELOM"]["VALUE"],
		    $arItem["PROPERTIES"]["TIP_UKHODA_ZA_RUKAMI"]["VALUE"],
		    $arItem["PROPERTIES"]["TIP_UKHODA_ZA_NOGAMI"]["VALUE"],
		    $arItem["PROPERTIES"]["TIP_UKHODA_ZA_VOLOSAMI"]["VALUE"],
		    $arItem["PROPERTIES"]["TIP_TOVARA_DLYA_MUZHCHIN"]["VALUE"],
		    $arItem["PROPERTIES"]["TIP_KOLGOTOK"]["VALUE"],
		);
		for ($i = 0; $i < count($arDescr); $i++) {
		    if ($arDescr[$i] != "") {
			$descr = $arDescr[$i];
			break;
		    }
		}
		?>

		<? if ($descr != "") { ?>
		    <p class="descr"><?= $descr ?></p>
		<? } ?>
    	</div>

    	<div class="wrap_price">
		<? if ($flag_discount) { ?>
		    <div class="price_now">
			<span><?= $arItem["MIN_PRICE"]["DISCOUNT_VALUE"] ?></span><img src="/img/rouble_blue.svg" alt=""> 
		    </div>
		    <div class="price_before">
			<span><?= $arItem["MIN_PRICE"]["VALUE"] ?></span><img src="/img/rouble_grey.svg" alt=""> 
		    </div>
		<? } else { ?>
		    <div class="price_now">
			<span><?= $arItem["MIN_PRICE"]["VALUE"] ?></span><img src="/img/rouble_blue.svg" alt=""> 
		    </div>
		<? } ?>

    	</div>
        </div>

    <? } ?>
    <?= $sEndMark; ?>
</div>
<div class="next_more">
    <?
    if ($arParams["DISPLAY_BOTTOM_PAGER"]) {
	?><? echo $arResult["NAV_STRING"]; ?><?
    }
    ?>
</div>