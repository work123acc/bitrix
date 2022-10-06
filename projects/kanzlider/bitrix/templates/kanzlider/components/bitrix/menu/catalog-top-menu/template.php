<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<li>	
	<a href="/catalog/">Каталог товаров</a>
	<ul class="header-nav__menu-2-lvl">	
		
		<? 	
			$level0 = 1;
			foreach ($arResult as $item) {
				$level = intval($item["PARAMS"]["DEPTH_LEVEL"]);
				
				if ($level === $level0) {
					$end = '</li>';
				}
				
				if ($level > $level0) { 
					$level0 = $level; 
				?>				
				<ul class="header-nav__menu-3-lvl">	
					
					<? 
						} else if ($level < $level0) { 						
						$level0 = $level; 
					?>					
				</ul>
			</li>
		<? } ?>
		
		<li>
			<a href="<?= $item['LINK'] ?>">
				<?= $item['TEXT'] ?>
			</a>
			
		<? } ?>	
	</li>		
</ul>
</li>
<a href="" class="header-nav__menu-2-lvl-close"></a>
</ul>