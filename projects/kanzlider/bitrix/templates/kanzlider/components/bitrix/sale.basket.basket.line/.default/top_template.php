<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
/**
 * @global array $arParams
 * @global CUser $USER
 * @global CMain $APPLICATION
 * @global string $cartId
 */
$compositeStub = (isset($arResult['COMPOSITE_STUB']) && $arResult['COMPOSITE_STUB'] == 'Y');
?>
	
		
            <a class="header-cart__title" href="<?= $arParams['PATH_TO_BASKET'] ?>">В корзине</a>
            <div class="header-cart__count"><?=$arResult['NUM_PRODUCTS']?> товаров</div>
            <br>
            <div class="header-cart__sum">на сумму <b><?= preg_replace('/[^0-9.]/', '', $arResult['TOTAL_PRICE']); ?></b> Р</div>
            <a href="/personal/cart/" class="big-button  header-cart__button">Оформить заказ</a>
	
<?
