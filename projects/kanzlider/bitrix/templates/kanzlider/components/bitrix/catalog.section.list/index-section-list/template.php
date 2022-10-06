<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
	/** @var array $arParams */
	/** @var array $arResult */
	/** @global CMain $APPLICATION */
	/** @global CUser $USER */
	/** @global CDatabase $DB */
	/** @var CBitrixComponentTemplate $this */
	/** @var string $templateName */
	/** @var string $templateFile */
	/** @var string $templateFolder */
	/** @var string $componentPath */
	/** @var CBitrixComponent $component */
	$this->setFrameMode(true);
?>
<?
 	//my_dump( $arResult["SECTIONS"] ) ;
	if ($GLOBALS['start']) {
		$start = $GLOBALS['start'];
		} else {
		$start = 0;
	}
	
	$length = $GLOBALS['length'];
	$GLOBALS['full'] = count($arResult["SECTIONS"]);
	
	if ( count($arResult["SECTIONS"]) > 0 && $start <= count($arResult["SECTIONS"]) ) {
	?>
	<div class="main-catalog-item">
		
		<?				
			$last = '1';
			$counter = 0;
			for ($i=$start; $i<=count($arResult["SECTIONS"]); $i++) { 
				$section = $arResult["SECTIONS"][$i];
				
				if ($section["DEPTH_LEVEL"] === '1') {
					$counter ++;
					if ($counter > $length) {
						$GLOBALS['start'] = $i;
						$GLOBALS['finalLength'] = $i;
						break;
					}
				?>
				<? if ($last === '2') { ?>
				</ul>	
			<? } ?>
			
			<? if ($i > $start) { ?>
				</div><div class="main-catalog-item">
			<? } ?>
			
			<? if ($section['PICTURE']['SRC']) { ?>
				<img style="max-height: 50%;max-width: 50%;margin: 15px;" src="<?= $section['PICTURE']['SRC'] ?>"/> 
			<? } else { ?>
				<div class="main-catalog-item-ico" style="background-image: url(<?= SITE_TEMPLATE_PATH ?>/img/catalog-sprite.png)"></div>
			<? } ?>
			
			<div class="main-catalog-item-ico" style="background-image: url(<?= $url ?>)"></div>
			
			<a href="<?= $section["SECTION_PAGE_URL"] ?>" class="main-catalog-item-link">
				<a href="<?= $section["SECTION_PAGE_URL"] ?>" class="main-catalog-item-title">
					<?= $section['NAME'] ?>
				</a>
			</a>
			
		<? } ?>
		
		<? if ($section["DEPTH_LEVEL"] === '2') { ?>
			<? if ($last === '1') { ?>
				<ul class="header-nav__menu-3-lvl  header-nav__menu-3-lvl--main-catalog">
				<? } ?>
				
				<li>
					<a href="<?= $section["SECTION_PAGE_URL"] ?>">
						<?= $section['NAME'] ?>
					</a>
				</li>
				
				<?						
				}							
				$last = $section["DEPTH_LEVEL"];
				$GLOBALS['finalLength'] = $i;
				if ($i < count($arResult["SECTIONS"]) ) {
					$GLOBALS['start'] = $i;
					} else {
					$GLOBALS['start'] = $i +1;
				}
				
			}
		?>
	</div>	
<? } ?>	
