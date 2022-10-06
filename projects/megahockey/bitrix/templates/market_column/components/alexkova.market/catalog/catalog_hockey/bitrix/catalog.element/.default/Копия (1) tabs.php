<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
	
	$tabsArray=$arResult["TabsArray"];
	$arResult['PR_TEXT'] = $arResult['~PREVIEW_TEXT'];
?>
<? /******************************* comment***************************************/ ?>
<ul class="bxr-detail-tabs hidden-xxs">
	<? 
		foreach ($tabsArray as $key=>$tab) {
			
			if ($key !== 'Подарки' && $key !== 'Бонус' && $key !== 'Гарантия' 
			&& $key !== 'Система скидок' && $key !== 'Доставка' && $key !== 'Видео' ) {
				echo '<li data-tab="' . $tab . '">' . $key . '</li>';
			}
			else {
				if ($key === 'Подарки' && $arResult['PROPERTIES']['PODARKI']['VALUE'] === 'Y') {
					echo '<li data-tab="gift-tab">' . $key . '</li>';
				}
				else if ($key === 'Бонус' && $arResult['PROPERTIES']['BONUS']['VALUE'] === 'Y') {
					echo '<li data-tab="' . $tab . '">' . $key . '</li>';
				}
				else if ($key === 'Гарантия' && $arResult['PROPERTIES']['GUARANTEE']['VALUE'] === 'Y') {
					echo '<li data-tab="' . $tab . '">' . $key . '</li>';
				}
				else if ($key === 'Система скидок' && $arResult['PROPERTIES']['SKIDKI']['VALUE'] === 'Y') {
					echo '<li data-tab="' . $tab . '">' . $key . '</li>';
				}
				else if ($key === 'Доставка' && $arResult['PROPERTIES']['DOSTAVKA']['VALUE'] === 'Y') {
					echo '<li data-tab="' . $tab . '">' . $key . '</li>';
				}
				else if ($key === 'Видео' && $arResult['PROPERTIES']['VIDEO_TAB']['VALUE'] === 'Y') {
					echo '<li data-tab="' . $tab . '">' . $key . '</li>';
				}
			}
		} 
	?>
</ul>

<div class="clearfix"></div>
