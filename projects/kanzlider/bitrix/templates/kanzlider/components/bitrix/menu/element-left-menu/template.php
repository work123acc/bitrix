<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<? 	
	$level0 = 1;
	foreach ($arResult as $key=>$item) {
		$level = $item["DEPTH_LEVEL"];				
		
		if ($level > $level0) {
		?>
		<ul class="sidebar-menu__menu-2-lvl">
			<? } else if ($level < $level0) { ?>
		</ul>
		<? } ?>
		
		<?if ($key > 1) { ?>
			</li>
		<? } ?>

		<li>
			<a href="<?= $item['LINK'] ?>">
				<?= $item['TEXT'] ?>
			</a>	
	
	<?
		$level0 = $level;
	} 
?>
</li>