<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
	
	$tabsArray=$arResult["TabsArray"];
	$arResult['PR_TEXT'] = $arResult['~PREVIEW_TEXT'];
?>
<?	
	function my_dump($arg) {
		global $USER;
		if ($USER->IsAdmin()) {
			//if ($USER->GetID() === '83') {
			echo '<pre style="background-color: black; color: white; font-size: 12px; z-index: 9;">';
			var_dump($arg);
			//print_r($arg);
			echo '</pre>';
		}
	}
	
	//my_dump( array( $arResult ) ); 
	my_dump( array( $tabsArray ) ); 
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
