<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
	/**
		* @global array $arParams
		* @global CUser $USER
		* @global CMain $APPLICATION
		* @global string $cartId
	*/
	$compositeStub = (isset($arResult['COMPOSITE_STUB']) && $arResult['COMPOSITE_STUB'] == 'Y');
?>

<a class="header-cart__title" href="/personal/cart/"></a>
<a href="<?= $arParams['PATH_TO_BASKET'] ?>" class="header-cart__sum">
	<b><?= floatval( $arResult['TOTAL_PRICE'] ) ?></b> Р
</a>

