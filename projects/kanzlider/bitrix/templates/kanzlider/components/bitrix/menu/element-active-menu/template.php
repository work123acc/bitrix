<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<? 	
	$num = -1;
	foreach ($arResult as $key=>$item) {
		
		if ($num >= 0) {
			if ($item['DEPTH_LEVEL']===2) {
			?>
			<li><a href="<?= $item['LINK'] ?>"><?= $item['TEXT'] ?></a></li>
			<? 
			}
			
			if ($item['DEPTH_LEVEL']===1) { 
			?>
		</ul>
		<?
			break;
		}
	}
	
	if ($item['SELECTED'] && $item['DEPTH_LEVEL']===1) {
		$num = $key;
	?>
	<a class="active" href="<?= $item['LINK'] ?>"><?= $item['TEXT'] ?></a><ul class="sidebar-menu__menu-2-lvl">
		<?
		}
	}
?>
