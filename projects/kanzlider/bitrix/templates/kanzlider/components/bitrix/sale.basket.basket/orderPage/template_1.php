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
/** @var CBitrixBasketComponent $component */
$curPage = $APPLICATION->GetCurPage() . '?' . $arParams["ACTION_VARIABLE"] . '=';
$arUrls = array(
    "delete" => $curPage . "delete&id=#ID#",
    "delay" => $curPage . "delay&id=#ID#",
    "add" => $curPage . "add&id=#ID#",
);
unset($curPage);

$arBasketJSParams = array(
    'SALE_DELETE' => GetMessage("SALE_DELETE"),
    'SALE_DELAY' => GetMessage("SALE_DELAY"),
    'SALE_TYPE' => GetMessage("SALE_TYPE"),
    'TEMPLATE_FOLDER' => $templateFolder,
    'DELETE_URL' => $arUrls["delete"],
    'DELAY_URL' => $arUrls["delay"],
    'ADD_URL' => $arUrls["add"]
);
?>
<script type="text/javascript">
    var basketJSParams = <?= CUtil::PhpToJSObject($arBasketJSParams); ?>
</script>
<?
$APPLICATION->AddHeadScript($templateFolder . "/script.js");

if (strlen($arResult["ERROR_MESSAGE"]) <= 0) {
    ?>
    <div id="warning_message">
	<?
	if (!empty($arResult["WARNING_MESSAGE"]) && is_array($arResult["WARNING_MESSAGE"])) {
	    foreach ($arResult["WARNING_MESSAGE"] as $v)
		ShowError($v);
	}
	?>
    </div>
    <?
    $normalCount = count($arResult["ITEMS"]["AnDelCanBuy"]);
    $normalHidden = ($normalCount == 0) ? 'style="display:none;"' : '';

    $delayCount = count($arResult["ITEMS"]["DelDelCanBuy"]);
    $delayHidden = ($delayCount == 0) ? 'style="display:none;"' : '';

    $subscribeCount = count($arResult["ITEMS"]["ProdSubscribe"]);
    $subscribeHidden = ($subscribeCount == 0) ? 'style="display:none;"' : '';

    $naCount = count($arResult["ITEMS"]["nAnCanBuy"]);
    $naHidden = ($naCount == 0) ? 'style="display:none;"' : '';
    ?>
    <form method="post" action="<?= POST_FORM_ACTION_URI ?>" name="basket_form" id="basket_form">
        <div id="basket_form_container">
    	<div class="bx_ordercart">
    	    <!--					<div class="bx_sort_container">
    							    <span><?= GetMessage("SALE_ITEMS") ?></span>
    							    <a href="javascript:void(0)" id="basket_toolbar_button" class="current" onclick="showBasketItemsList()"><?= GetMessage("SALE_BASKET_ITEMS") ?><div id="normal_count" class="flat" style="display:none">&nbsp;(<?= $normalCount ?>)</div></a>
    	    
    							    <a href="javascript:void(0)" id="basket_toolbar_button_subscribed" onclick="showBasketItemsList(3)" <?= $subscribeHidden ?>><?= GetMessage("SALE_BASKET_ITEMS_SUBSCRIBED") ?><div id="subscribe_count" class="flat">&nbsp;(<?= $subscribeCount ?>)</div></a>
    							    <a href="javascript:void(0)" id="basket_toolbar_button_not_available" onclick="showBasketItemsList(4)" <?= $naHidden ?>><?= GetMessage("SALE_BASKET_ITEMS_NOT_AVAILABLE") ?><div id="not_available_count" class="flat">&nbsp;(<?= $naCount ?>)</div></a>
    						    </div>-->
	    <?php /*-------------------------  -------------------------*/ ?>
		<?
		include($_SERVER["DOCUMENT_ROOT"] . $templateFolder . "/basket_items.php");
		include($_SERVER["DOCUMENT_ROOT"] . $templateFolder . "/basket_items_delayed.php");
		include($_SERVER["DOCUMENT_ROOT"] . $templateFolder . "/basket_items_subscribed.php");
		include($_SERVER["DOCUMENT_ROOT"] . $templateFolder . "/basket_items_not_available.php");
		?>
	    <?php /*-------------------------  -------------------------*/ ?>
    	</div>
        </div>
        <input type="hidden" name="BasketOrder" value="BasketOrder" />
        <!-- <input type="hidden" name="ajax_post" id="ajax_post" value="Y"> -->
    </form>
    <form action="/personal/cart/add_order/" name="cart_form" id="cart_form" method="POST">
        <div id="form_order">
    	<p>Укажите Имя и Телефон, нажмите кнопку "Отправить".<br /> После этого наш менеджер 
    	    свяжется c вами.</p>

    	<input type="text" id="cart_name" name="cart_name" placeholder="Как вас зовут?"/>
    	<input type="text" id="cart_phone" name="cart_phone" placeholder="Ваш телефон?"/>
    	<input type="hidden" name="cart_summ" value="<?= $arResult["allSum"] ?>"/>
    	<a href="javascript:void(0)" id="cart_send">Отправить</a>
    	<input type="submit" style="display: none;"/>



        </div>
    </form>

    <?
} else {
    ShowError($arResult["ERROR_MESSAGE"]);
}
?>
<div id="ajax"></div>
<script>
    $(document).ready(function () {
	$(".cart_select").change(function () {
	    $.post("/js/update_cart.php", {id: $(':selected', this).data("cart"), val: $(':selected', this).val()}, function (data) {
		//$("#ajax").html(data);
	    })


	});
	$("#add_zakaz").click(function () {
	    $("#form_order").show();
	});
	$("#cart_phone").inputmask("mask", {"mask": "+7 (999) 999-99-99", "clearIncomplete": true});
	$("#cart_send").click(function () {
	    var name = $("#cart_name").val();
	    if (name != "") {
		var phone = $("#cart_phone").val();
		if (phone != "") {

		    $("#cart_form").submit();
		} else {
		    $("#cart_phone").attr("style", "border:2px solid red;");
		}


	    } else {
		$("#cart_name").attr("style", "border:2px solid red;");
	    }

	    return false;
	});
	$("#cart_phone").keyup(function (event) {
	    $("#cart_phone").removeAttr("style");
	});
	$("#cart_name").keyup(function (event) {
	    $("#cart_name").removeAttr("style");
	});

    });
</script>
