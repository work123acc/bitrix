<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? foreach ($arResult as $key=>$menu) {?>
    <li class="<?= $a ?>">
	<a href="<?= $menu['LINK'] ?>">
	    <?= $menu['TEXT'] ?>
	</a>
    </li>
<? } ?>