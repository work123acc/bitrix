<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

use Bitrix\Main,
    Bitrix\Main\Localization\Loc,
    Bitrix\Main\Page\Asset;
?>

<?
if ($_GET['order'] === 'status') {
    $order = 'Статусу';
} else if ($_GET['order'] === 'price') {
    $order = 'Цене';
} else if ($_GET['order'] === 'number') {
    $order = 'Номеру заказа';
} else {
    $order = 'Дате';
}
?> 

<div class="main_content_lk main_table_lk">
    <div class="wrap_block">
	<p class="title-page">История заказов</p>

	<div class="sort_control">
	    <div class="products_found">
		<span>Всего заказов: </span>
		<div class="prods_num">
		    <span><?= count($arResult['ORDERS']) ?></span>
		</div>
	    </div>
	    <div class="sort_products">
		Сортировать по
		<span class="sort_item"><?= $order ?></span>
		<img src="<?= SITE_TEMPLATE_PATH ?>/img/enter.svg" alt="">
		<ul class="select-list animated fadeIn" >
		    <li class="select-point"><a href="?order=date">Дате</a></li>
		    <li class="select-point"><a href="?order=status">Статусу</a></li>
		    <li class="select-point"><a href="?order=price">Цене</a></li>
		    <li class="select-point"><a href="?order=number">Номеру</a></li> 
		</ul>
	    </div>
	</div>
	<div class="main-wrap-content">
	    <table class="history_lk">
		<thead>
		    <tr>
			<td>Номер заказа</td>
			<td>Статус заказа</td>
			<td>Дата заказа</td>
			<td>Всего</td>
			<td>Статус оплаты</td>
		    </tr>
		</thead>
		<tbody>
		    <? foreach ($arResult['ORDERS'] as $order) { ?>
		    <tr>
			<td class="number">
			    <p class="name_history_mob">Номер заказа</p>
			    <p><?= $order['ORDER']["ACCOUNT_NUMBER"] ?></p>
			</td>
			<td class="delivery_position">
			    <p class="name_history_mob">Статус заказа</p>
			    <p>
				<? 
				$status = $order['ORDER']['STATUS_ID'];
				echo $arResult['INFO']['STATUS'][$status]['NAME'];
				?>
			    </p>
			</td>
			<td>
			    <p class="name_history_mob">Дата заказа</p>
			    <p class="month_year"><?= $order['ORDER']["DATE_STATUS"]->format($arParams['ACTIVE_DATE_FORMAT']) ?></p>
			    <p class="time"><?= $order['ORDER']["DATE_STATUS"]->format('H:i') ?></p>
			</td>
			<td class="price">
			    <p class="name_history_mob">Всего</p>
			    <span><?= $order['ORDER']['FORMATED_PRICE'] ?></span><img src="<?= SITE_TEMPLATE_PATH ?>/img/rouble_grey.svg" alt=""></td>
			<td class="payment">
			    <p class="name_history_mob">Статус оплаты</p>
			    <p>
				<? 
				$pay = $order['ORDER']['PAY_SYSTEM_ID'];
				echo $arResult['INFO']['PAY_SYSTEM'][$pay]['NAME'];
				?>
			    </p>
			</td>
		    </tr>
		    <? } ?>
		</tbody>
	    </table>
	</div>
    </div>
</div>