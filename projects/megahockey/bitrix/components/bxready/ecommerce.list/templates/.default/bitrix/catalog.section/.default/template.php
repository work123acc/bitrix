<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

use Alexkova\Bxready\Draw;

//use Alexkova\Bxready\Library;

$draw = Alexkova\Bxready\Draw::getInstance();

//echo "<pre>"; print_r($arParams); echo "</pre>";


$this->setFrameMode(true);

$elementTemplate = ".default";

global $unicumID;
if ($unicumID <= 0) {
    $unicumID = 1;
} else {
    $unicumID++;
}

$arParams["UNICUM_ID"] = $unicumID;
$arParams["SKU_PROPS_LIST"] = $arResult["SKU_PROPS_LIST"];
$arParams["SKU_PROPS"] = $arResult["SKU_PROPS"];

$colToElem = array();
$bootstrapGridCount = $arParams["BXREADY_LIST_BOOTSTRAP_GRID_STYLE"];
if ($bootstrapGridCount > 0) {
    for ($i = 1; $i <= $bootstrapGridCount; $i++) {
	if (($bootstrapGridCount % $i) == 0) {
	    $colToElem[$bootstrapGridCount / $i] = $i;
	}
    }
}



if (count($arResult["ITEMS"]) > 0):
    if (strlen($arParams["PAGE_BLOCK_TITLE"]) > 0):
	$addClass = '';
	if (strlen($arParams["PAGE_BLOCK_TITLE_GLYPHICON"]) > 0) {
	    $addClass = 'glyphicon glyphicon-pad ' . $arParams["PAGE_BLOCK_TITLE_GLYPHICON"];
	}
	?>
	<h2 class="<?= $addClass ?>"><?= $arParams["PAGE_BLOCK_TITLE"] ?></h2>
	<?
    endif;
    if (strlen($arParams["PROP_NAME_FOR_BLOCK_TITLE"]) > 0):
	?>
	<h3><?= $arParams["PROP_NAME_FOR_BLOCK_TITLE"] ?></h3>
    <? endif; ?>
    <div class="row bxr-list"><? if ($arParams["BXREADY_LIST_SLIDER"] == "Y") { ?>
	    <div id="sl_<?= $unicumID ?>">
		<?
	    } else {
		if ($arParams["DISPLAY_TOP_PAGER"]) {
		    ?><? echo $arResult["NAV_STRING"]; ?><?
		}
	    }


	    foreach ($arResult["ITEMS"] as $cell => $arItem):

		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		$strMainID = $this->GetEditAreaId($arItem['ID']);
		$arParams["AREA_ID"] = $strMainID;
		$arParams["~ADD_URL_TEMPLATE"] = $arResult["~ADD_URL_TEMPLATE"];
		$arParams["~BUY_URL_TEMPLATE"] = $arResult["~BUY_URL_TEMPLATE"];
		$arParams["~COMPARE_URL_TEMPLATE"] = $arResult["~COMPARE_URL_TEMPLATE"];



		$arElementDrawParams = array(
		    "ELEMENT" => $arItem,
		    "PARAMS" => $arParams
		);
		?><div id="<?= $strMainID ?>" class="t_<?= $unicumID ?> col-lg-<?= $arParams["BXREADY_LIST_LG_CNT"] ?> col-md-<?= $arParams["BXREADY_LIST_MD_CNT"] ?> col-sm-<?= $arParams["BXREADY_LIST_SM_CNT"] ?> col-xs-<?= $arParams["BXREADY_LIST_XS_CNT"] ?>"><?
		$draw->setCurrentTemplate($this);
		$draw->showElement($arParams["BXREADY_ELEMENT_DRAW"], $arItem, $arParams);
		?>
		</div>
	    <? endforeach; ?>
        </div>
	<? if ($arParams["BXREADY_LIST_SLIDER"] == "Y") { ?>
	</div>
	<script>
	    function isTouchDevice() {
		try {
		    document.createEvent('TouchEvent');
		    return true;
		} catch (e) {
		    return false;
		}
	    }
	<? if ($arParams["HIDE_SLIDER_ARROWS"] == "Y" || !isset($arParams["HIDE_SLIDER_ARROWS"])) { ?>
	        if (!isTouchDevice()) {
	    	prevBtn = '<button type="button" class="bxr-color-button slick-prev hidden-arrow"></button>';
	    	nextBtn = '<button type="button" class="bxr-color-button slick-next hidden-arrow"></button>';
	        }
	<? } else { ?>
	        if (!isTouchDevice()) {
	    	prevBtn = '<button type="button" class="bxr-color-button slick-prev"></button>';
	    	nextBtn = '<button type="button" class="bxr-color-button slick-next"></button>';
	        }
	<? } ?>
	<? if ($arParams["HIDE_MOBILE_SLIDER_ARROWS"] == "Y") { ?>
	        if (isTouchDevice()) {
	    	prevBtn = '<button type="button" class="bxr-color-button slick-prev hidden-arrow"></button>';
	    	nextBtn = '<button type="button" class="bxr-color-button slick-next hidden-arrow"></button>';
	        }
	<? } //else {    ?>
	    if (isTouchDevice()) {
		prevBtn = '<button type="button" class="bxr-color-button slick-prev"></button>';
		nextBtn = '<button type="button" class="bxr-color-button slick-next"></button>';
	    }
	<? //}    ?>
	    $('#sl_' +<?= $unicumID ?>).slick({
	<? if ($arParams["BXREADY_LIST_SLIDER_MARKERS"] == "Y") { ?>
	        dots: true,
	<? } ?>
	    infinite: true,
		    speed: 300,
	<? if ($arParams["BXREADY_LIST_HIDE_MOBILE_SLIDER_AUTOSCROLL"] == "Y") { ?>
	        autoplay: true,
	    	    autoplaySpeed: <?= intval($arParams["BXREADY_LIST_HIDE_MOBILE_SLIDER_SCROLLSPEED"]) > 0 ? intval($arParams["BXREADY_LIST_HIDE_MOBILE_SLIDER_SCROLLSPEED"]) : 2000 ?>,
	<? } ?>
	<? if ($arParams["VERTICAL_SLIDER_MODE"] == "Y") { ?>
	        vertical: true,
	<? } ?>
	    slidesToShow: <?= $colToElem[$arParams["BXREADY_LIST_LG_CNT"]] ?>,
		    slidesToScroll: 1,
		    prevArrow: prevBtn,
		    nextArrow: nextBtn,
	    responsive: [
	    {
	    breakpoint: 1199,
		    settings: {
		    slidesToShow: <?= $colToElem[$arParams["BXREADY_LIST_MD_CNT"]] ?>,
			    slidesToScroll: 1
		    }
	    },
	    {
	    breakpoint: 991,
		    settings: {
		    slidesToShow: <?= $colToElem[$arParams["BXREADY_LIST_SM_CNT"]] ?>,
			    slidesToScroll: 1
		    }
	    },
	    {
	    breakpoint: 767,
		    settings: {
		    slidesToShow: <?= $colToElem[$arParams["BXREADY_LIST_XS_CNT"]] ?>,
			    slidesToScroll: 1
		    }
	    },
	    ]
	    }
	    );
	</script>
	<?
    } else {
	if ($arParams["DISPLAY_BOTTOM_PAGER"]) {
	    echo $arResult["NAV_STRING"];
	}
    }


endif;
?>
<style>
    .bxr-ecommerce-v1 {
	height: 279px;
	width: 218px;
    }
    .bxr-element-name {
	min-height: 40px !important;
	display: block;
	margin: 0px !important;
    }
    .bxr-instock-wrap {
	display: none;
    }
    .bxr-element-price * {
	margin: 0px;
	padding: 0px;
    }
</style>
<script>
    (function ($) {
	$(document).ready(function () {	    
	    if ($('.bxr-detail-tabs li')) {
		var x = -1;
		
		var tabs = $('.bxr-detail-tabs li');
		for (var i = 0; i < tabs.length; i++) {
		    if (tabs[i].innerText === 'Бонус') {
			x = i;
		    }
		}

		if (x >= 0) {
		    var bonusTab = $('.bxr-detail-tabs li')[x];		
		    console.log( bonusTab );
		    bonusTab.onclick = function () {
			$('.slick-next').click();
		    };
		}
	    }
	});
    })(jQuery);
</script>