<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<? 	
	$num = -1;
	foreach ($arResult as $key=>$item) {
		
		if ($num >= 0) {
			if ($item['DEPTH_LEVEL']===2) {
				echo $item['DEPTH_LEVEL'] . ' ' . $item['TEXT'] . '<br>';
			}
			if ($item['DEPTH_LEVEL']===1) {
				break;
			}
		}
		
		if ($item['SELECTED'] && $item['DEPTH_LEVEL']===1) {
			$num = $key;
			echo $item['DEPTH_LEVEL'] . ' ' . $item['TEXT'] . '<br>';
			?>
				<a class="active" href="<?= $item['LINK'] ?>"><?= $item['TEXT'] ?></a>
			<?
		}
	}
?>
