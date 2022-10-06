<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="personalLeftMenu">
	<ul>
		<? foreach ($arResult as $item) { ?>
			<li>
				<a href="<?= $item['LINK'] ?>">
					<?= $item['TEXT'] ?>
				</a>
			</li>
		<? } ?>
	</ul>
</div>