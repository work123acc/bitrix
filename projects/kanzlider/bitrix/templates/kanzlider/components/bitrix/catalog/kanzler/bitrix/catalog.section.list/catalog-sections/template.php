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

<?if ( count($arResult['SECTIONS']) > 0) { ?>
<?	foreach ($arResult['SECTIONS'] as $key=>$section) { ?>
	<?if ($section["DEPTH_LEVEL"] === '1' or $section["DEPTH_LEVEL"] === '2') { ?>
		<?if ($section["DEPTH_LEVEL"] === '1') {?>
			<div class="catalog-page__item">

				<? if ($section['PICTURE']['SRC']) { ?>
					<img style="max-height: 50%;max-width: 50%;margin: 15px;" src="<?= $section['PICTURE']['SRC'] ?>"/>
				<? } else { ?>
					<div class="catalog-page__item-ico" style="background-image: url(<?= SITE_TEMPLATE_PATH ?>/img/catalog-sprite.png)"></div>
				<? } ?>

				<a href="<?= $section['SECTION_PAGE_URL'] ?>" class="catalog-page__item-title"><?= $section['NAME'] ?></a>

				<?if($section['SECTIONS']) {?>
					<ul class="catalog-page__menu">
						<?foreach ($section['SECTIONS'] as $section_2){?>
							<?if($section_2['DEPTH_LEVEL']==2) {?>
								<li>
									<a href="<?= $section_2['URL'] ?>"><?= $section_2['NAME'] ?></a>
								</li>
							<?}?>
						<?}?>
					</ul>
				<?}?>

			</div>
		<?}?>
	<?}?>
<?}?>
<?}?>

<?
/*$i=1;
if ( count($arResult['SECTIONS']) > 0) { ?>
	<div class="catalog-page__item">
		<? 
			$last = '1';
			foreach ($arResult['SECTIONS'] as $section) { 
				
				if ($section["DEPTH_LEVEL"] === '1') {
					if ($last === '2') {
						echo '</li></ul>';				
					}
				?>
				
				</div><div class="catalog-page__item item_<?=$i?>">
				
				<? if ($section['PICTURE']['SRC']) { ?>
					<img style="max-height: 50%;max-width: 50%;margin: 15px;" src="<?= $section['PICTURE']['SRC'] ?>"/> 
					<? } else { ?>			
					<div class="catalog-page__item-ico" style="background-image: url(<?= SITE_TEMPLATE_PATH ?>/img/catalog-sprite.png)"></div>			
				<? } ?>
				
				<a href="<?= $section['SECTION_PAGE_URL'] ?>" class="catalog-page__item-title"><?= $section['NAME'] ?></a>					
				
				<? 
				}
				
				if ($section["DEPTH_LEVEL"] === '2') { 
					if ($last === '1') { 
						echo '<ul class="catalog-page__menu"><li>';
					} 
				?>		
				<li>
					<a href="<?= $section['SECTION_PAGE_URL'] ?>"><?= $section['NAME'] ?></a>
				</li>
				<?
				}
				$last = $section["DEPTH_LEVEL"];
				$i=$i+1;?>

			<?}
		?>
	</div>
<? } */?>
