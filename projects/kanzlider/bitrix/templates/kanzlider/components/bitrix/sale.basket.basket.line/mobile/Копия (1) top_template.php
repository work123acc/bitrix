<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
	/**
		* @global array $arParams
		* @global CUser $USER
		* @global CMain $APPLICATION
		* @global string $cartId
	*/
	$compositeStub = (isset($arResult['COMPOSITE_STUB']) && $arResult['COMPOSITE_STUB'] == 'Y');
	//my_dump( array( $arResult ) );
?>

<a class="header-cart__title" href="/personal/cart/"></a>
<a href="<?= $arParams['PATH_TO_BASKET'] ?>" class="header-cart__sum">
	<b><?= preg_replace('/[^0-9\.]/', '', $arResult['TOTAL_PRICE']); ?></b> Р
</a>
<?php /*-------------------------  -------------------------* ?>
<a class="header-cart__title" href="<?= $arParams['PATH_TO_BASKET'] ?>">В корзине</a>
<div class="header-cart__count"><?=$arResult['NUM_PRODUCTS']?> товаров</div>
<br>
<div class="header-cart__sum">на сумму <b><?= preg_replace('/[^0-9.]/', '', $arResult['TOTAL_PRICE']); ?></b> Р</div>
<a href="/personal/cart/" class="big-button  header-cart__button">Оформить заказ</a>
<?php /*-------------------------  -------------------------*/ ?>

