<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
	
	$tabsArray=$arResult["TabsArray"];
	$arResult['PR_TEXT'] = $arResult['~PREVIEW_TEXT'];
	$GLOBALS['PR_TEXT'] = $arResult['~PREVIEW_TEXT']; // т к $arResult['~PREVIEW_TEXT'] не доходит до component_epilog.php
?>
<? /******************************* comment***************************************/ ?>
<ul class="bxr-detail-tabs hidden-xxs">
	<? 
		foreach ($tabsArray as $key=>$tab) {
			if ($key === 'Описание') {
				echo '<li data-tab="' .$tab . '">' . $key . '</li>';
			}
			else if ($key === 'Подарки' && $arResult['PROPERTIES']['PODARKI']['VALUE'] === 'Y') {
				echo '<li data-tab="' .$tab . '">' . $key . '</li>';
			}
			else if ($key === 'Отзывы' && $arResult['PROPERTIES']['COMMENTS']['VALUE'] === 'Y') {
				echo '<li data-tab="' .$tab . '">' . $key . '</li>';
			}
			else if ($key === 'Доставка' && $arResult['PROPERTIES']['DOSTAVKA']['VALUE'] === 'Y') {
				echo '<li data-tab="' .$tab . '">' . $key . '</li>';
			}
			else if ($key === 'Оплата' && $arResult['PROPERTIES']['OPLATA']['VALUE'] === 'Y') {
				echo '<li data-tab="' .$tab . '">' . $key . '</li>';
			}
			else if ($key === 'Система скидок' && $arResult['PROPERTIES']['SKIDKI']['VALUE'] === 'Y') {
				echo '<li data-tab="' .$tab . '">' . $key . '</li>';
			}
		} 
	?>
</ul>

<div class="clearfix"></div>
		