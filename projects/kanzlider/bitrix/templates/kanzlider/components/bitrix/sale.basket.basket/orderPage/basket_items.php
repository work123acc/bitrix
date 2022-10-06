<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

use Bitrix\Sale\DiscountCouponsManager;

if (!empty($arResult["ERROR_MESSAGE"]))
    ShowError($arResult["ERROR_MESSAGE"]);

$bDelayColumn = false;
$bDeleteColumn = false;
$bWeightColumn = false;
$bPropsColumn = false;
$bPriceType = false;

if ($normalCount > 0):
    ?>
    <div id="basket_items_list">
        <div class="bx_ordercart_order_table_container">
    	<table id="basket_items">
    	    <thead>
    		<tr>
    		    <td class="margin"></td>
			<?
			foreach ($arResult["GRID"]["HEADERS"] as $id => $arHeader):
			    $arHeader["name"] = (isset($arHeader["name"]) ? (string) $arHeader["name"] : '');
			    if ($arHeader["name"] == '')
				$arHeader["name"] = GetMessage("SALE_" . $arHeader["id"]);
			    $arHeaders[] = $arHeader["id"];

			    // remember which values should be shown not in the separate columns, but inside other columns
			    if (in_array($arHeader["id"], array("TYPE"))) {
				$bPriceType = true;
				continue;
			    } elseif ($arHeader["id"] == "PROPS") {
				$bPropsColumn = true;
				continue;
			    } elseif ($arHeader["id"] == "DELAY") {
				$bDelayColumn = true;
				continue;
			    } elseif ($arHeader["id"] == "DELETE") {
				$bDeleteColumn = true;
				continue;
			    } elseif ($arHeader["id"] == "WEIGHT") {
				$bWeightColumn = true;
			    }

			    if ($arHeader["id"] == "NAME"):
				?>
	    		    <td class="item" colspan="2" id="col_<?= $arHeader["id"]; ?>">
				    <?
				elseif ($arHeader["id"] == "PRICE"):
				    ?>
	    		    <td class="price" id="col_<?= $arHeader["id"]; ?>">
				    <?
				else:
				    ?>
	    		    <td class="custom" id="col_<?= $arHeader["id"]; ?>">
				<?
				endif;
				?>
				<?= $arHeader["name"]; ?>
			    </td>
			    <?
			endforeach;

			if ($bDeleteColumn || $bDelayColumn):
			    ?>
			    <td class="custom"></td>
			    <?
			endif;
			?>
    		    <td class="margin"></td>
    		</tr>
    	    </thead>

    	    <tbody>
		    <?
		    foreach ($arResult["GRID"]["ROWS"] as $k => $arItem):

			if ($arItem["DELAY"] == "N" && $arItem["CAN_BUY"] == "Y"):
			    ?>
	    		<tr id="<?= $arItem["ID"] ?>">
	    		    <td class="margin"></td>
				<?
				foreach ($arResult["GRID"]["HEADERS"] as $id => $arHeader):

				    if (in_array($arHeader["id"], array("PROPS", "DELAY", "DELETE", "TYPE"))) // some values are not shown in the columns in this template
					continue;

				    if ($arHeader["id"] == "NAME"):
					?>
		    		    <td class="itemphoto">
		    			<div class="bx_ordercart_photo_container">
						<?
						if (strlen($arItem["PREVIEW_PICTURE_SRC"]) > 0):
						    $url = $arItem["PREVIEW_PICTURE_SRC"];
						elseif (strlen($arItem["DETAIL_PICTURE_SRC"]) > 0):
						    $url = $arItem["DETAIL_PICTURE_SRC"];
						else:
						    $url = $templateFolder . "/images/no_photo.png";
						endif;
						?>

						<? if (strlen($arItem["DETAIL_PAGE_URL"]) > 0): ?><a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><? endif; ?>
						    <? $file = CFile::ResizeImageGet($arItem['DETAIL_PICTURE'], array('width' => 180, 'height' => 180), BX_RESIZE_IMAGE_PROPORTIONAL, true); ?>
						    <? if ($file["src"] == "") $file["src"] = "/images/no_foto_cart.png" ?>	
		    				<div class="bx_ordercart_photo" style="background-image:url('<?= $file["src"] ?>')"></div>
						    <? if (strlen($arItem["DETAIL_PAGE_URL"]) > 0): ?></a><? endif; ?>
		    			</div>
					    <?
					    if (!empty($arItem["BRAND"])):
						?>
						<div class="bx_ordercart_brand">
						    <img alt="" src="<?= $arItem["BRAND"] ?>" />
						</div>
						<?
					    endif;
					    ?>
		    		    </td>

		    		    <td class="item">
		    			<span style="font-size: 16px; font-weight: bold;"><?= $arItem["NAME"] ?></span>
					    <?
					    foreach ($arItem['PROPS'] as $prop) {
						if ($prop['NAME'] === 'Выберите цвет') {
						    ?>
			    			<span><br><?= $prop['NAME'] . ': ' . $prop['VALUE'] ?></span>
						    <?
						}
					    }
					    ?>
		    		    </td>



				    <? elseif ($arHeader["id"] == "QUANTITY"):
					?>



		    		    <td class="custom">
					    <?= $arItem["QUANTITY"] ?> шт.		    			
		    		    </td>



				    <? elseif ($arHeader["id"] == "PRICE"):
					?>


		    		    <td class="price">
		    			<span><?= $arItem["PRICE_FORMATED"] ?></span>	
		    		    </td>



					<?
				    elseif ($arHeader["id"] == "DISCOUNT"):
					?>
		    		    <td class="custom">
		    			<span><?= $arHeader["name"]; ?>:</span>
		    			<div id="discount_value_<?= $arItem["ID"] ?>"><?= $arItem["DISCOUNT_PRICE_PERCENT_FORMATED"] ?></div>
		    		    </td>
					<?
				    elseif ($arHeader["id"] == "WEIGHT"):
					?>
		    		    <td class="custom">
		    			<span><?= $arHeader["name"]; ?>:</span>
					    <?= $arItem["WEIGHT_FORMATED"] ?>
		    		    </td>
					<?
				    else:
					?>
		    		    <td class="custom">
		    			<span><?= $arHeader["name"]; ?>:</span>
					    <?
					    if ($arHeader["id"] == "SUM"):
						?>
						<div class="all_price" id="sum_<?= $arItem["ID"] ?>">
						    <?
						endif;

						echo $arItem[$arHeader["id"]];

						if ($arHeader["id"] == "SUM"):
						    ?>
						</div>
						<?
					    endif;
					    ?>
		    		    </td>
				    <?
				    endif;
				endforeach;
				?>
	    		    <td class="margin"></td>
	    		</tr>
			    <?
			endif;
		    endforeach;
		    ?>
    	    </tbody>
    	</table>
        </div>
        <input type="hidden" id="column_headers" value="<?= CUtil::JSEscape(implode($arHeaders, ",")) ?>" />
        <input type="hidden" id="offers_props" value="<?= CUtil::JSEscape(implode($arParams["OFFERS_PROPS"], ",")) ?>" />
        <input type="hidden" id="action_var" value="<?= CUtil::JSEscape($arParams["ACTION_VARIABLE"]) ?>" />
        <input type="hidden" id="quantity_float" value="<?= $arParams["QUANTITY_FLOAT"] ?>" />
        <input type="hidden" id="count_discount_4_all_quantity" value="<?= ($arParams["COUNT_DISCOUNT_4_ALL_QUANTITY"] == "Y") ? "Y" : "N" ?>" />
        <input type="hidden" id="price_vat_show_value" value="<?= ($arParams["PRICE_VAT_SHOW_VALUE"] == "Y") ? "Y" : "N" ?>" />
        <input type="hidden" id="hide_coupon" value="<?= ($arParams["HIDE_COUPON"] == "Y") ? "Y" : "N" ?>" />
        <input type="hidden" id="use_prepayment" value="<?= ($arParams["USE_PREPAYMENT"] == "Y") ? "Y" : "N" ?>" />


	<?php /* -------------------------  -------------------------* ?>
	  <div class="bx_ordercart_order_pay_left" id="coupons_block">
	  <div class="bx_ordercart_coupon">
	  <span><?= GetMessage("STB_COUPON_PROMT") ?></span><input type="text" id="coupon" name="COUPON" value="" onchange="enterCoupon();">
	  </div><?
	  if (!empty($arResult['COUPON_LIST'])) {
	  foreach ($arResult['COUPON_LIST'] as $oneCoupon) {
	  $couponClass = 'disabled';
	  switch ($oneCoupon['STATUS']) {
	  case DiscountCouponsManager::STATUS_NOT_FOUND:
	  case DiscountCouponsManager::STATUS_FREEZE:
	  $couponClass = 'bad';
	  break;
	  case DiscountCouponsManager::STATUS_APPLYED:
	  $couponClass = 'good';
	  break;
	  }
	  ?><div class="bx_ordercart_coupon"><input disabled readonly type="text" name="OLD_COUPON[]" value="<?= htmlspecialcharsbx($oneCoupon['COUPON']); ?>" class="<? echo $couponClass; ?>"><span class="<? echo $couponClass; ?>" data-coupon="<? echo htmlspecialcharsbx($oneCoupon['COUPON']); ?>"></span><div class="bx_ordercart_coupon_notes"><?
	  if (isset($oneCoupon['CHECK_CODE_TEXT'])) {
	  echo (is_array($oneCoupon['CHECK_CODE_TEXT']) ? implode('<br>', $oneCoupon['CHECK_CODE_TEXT']) : $oneCoupon['CHECK_CODE_TEXT']);
	  }
	  ?></div></div><?
	  }
	  unset($couponClass, $oneCoupon);
	  }
	  ?>
	  </div>
	  <?php /*-------------------------  ------------------------- */ ?>





    </div>
    <?
else:
    ?>
    <div id="basket_items_list">
        <table>
    	<tbody>
    	    <tr>
    		<td colspan="<?= $numCells ?>" style="text-align:center">
    		    <div class=""><?= GetMessage("SALE_NO_ITEMS"); ?></div>
    		</td>
    	    </tr>
    	</tbody>
        </table>
    </div>
<?
endif;
?>

<style>
    .bx_ordercart_photo {
	height: 100px;
	width: 100px;
    }
</style>