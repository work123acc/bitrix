<?
	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
	$APPLICATION->SetTitle("Оформление заказа");
?>
<?	
	use Bitrix\Main,
    Bitrix\Sale\Basket;	
	$basket = Basket::loadItemsForFUser(\CSaleBasket::GetBasketUserID(), SITE_ID);	
?>

<?
	$description = array();	
	$a =  CSaleDelivery::GetList(array('ID'=>'ASC'),array(),false,false,array('ID', 'NAME', 'DESCRIPTION')	);
	while( $b = $a->GetNext()) {
		$description[] = $b;
	}	
	
	$user = array();
	if ($USER->IsAuthorized()) {
		$userID = $USER->GetID();
		$u = CUser::GetList( $by = "timestamp_x", $order = "desc", array('ID'=>$userID), array('FIELDS'=>array('ID', 'NAME', 'LAST_NAME', 'SECOND_NAME', 'PERSONAL_PHONE', 'WORK_COMPANY', 'PERSONAL_CITY', 'PERSONAL_STREET', 'PERSONAL_MAILBOX', 'EMAIL') ));
		
		while( $b = $u->GetNext()) {
			$user = $b;			
		}
		$street = explode(',' , $user['PERSONAL_STREET'] );
	}
?>
<main class="main">
	<div class="wrap">
		
		<h1 class="main-title">
			<?= strtoupper($APPLICATION->GetTitle()) ?>
		</h1>
		
		<? if ( $basket->getListOfFormatText() ) { ?>
			
			<div class="basket-sum">
				<a class="header-cart__title basket-logo" href="/personal/cart/"></a>
				товары: <?= array_sum($basket->getQuantityList()) ?> на сумму <?= $basket->getPrice() ?> руб.
			</div>
			
			<div id="order-div">
				<div class="order-steps">
					<div class="step active-step">Доставка</div>
					<div class="step">Способ оплаты</div>
					<div class="step">Подтверждение</div>
				</div>
				
				<form action="/personal/order/pay/" id="form-delivery" method="post">	
					<div class="form-delivery">
						
						<? foreach ($description as $key=>$d) { ?>	
							<div class="devs">
								
								<input type="radio" name="delivery[ID]" class="input-radio" id="input-<?= $d['ID'] ?>" value="<?= $d['ID'] ?>" <? if ($key===0) {echo 'checked';} ?>/>
								<label for="input-<?= $d['ID'] ?>"><?= $d['NAME'] ?></label>
								
								<? if ($d['ID'] === '5') { ?>
									<input type="text" name="delivery[other-city]" id="other-city" value="" placeholder="Укажите Ваш город"/>
									<? } else { ?>
									<div><?= $d['DESCRIPTION'] ?></div>
								<? } ?>	
							</div>
						<? } ?>	
					</div>
					
					<div class="order-title">Ваши данные:</div>
					<div class="order-user">
						<input type="text" name="user[last-name]" value="<?= $user['LAST_NAME'] ?>" placeholder="Фамилия"/>
						<input type="text" class="input-required" name="user[name]" value="<?= $user['NAME'] ?>" placeholder="Имя" required="required"/>
						
						<input type="text" name="user[phone]" value="<?= $user['PERSONAL_PHONE'] ?>" placeholder="Телефон"/>
						<input type="text" class="input-required" name="user[email]" value="<?= $user['EMAIL'] ?>" placeholder="E-mail" required="required"/>
						<input type="text" name="user[inn]" value="<?= $user['WORK_INN'] ?>" placeholder="ИНН"/>
						<input type="text" name="user[work]" value="<?= $user['WORK_COMPANY'] ?>" placeholder="Организация"/>
					</div>
					
					<div class="order-title">Адрес доставки:</div>
					<div class="order-adress">
						<input type="text" name="adress[city]" value="<?= $user['PERSONAL_CITY'] ?>" placeholder="Город"  required="required"/>
						<input type="text" name="adress[street]" value="<?= trim($street[0]) ?>" placeholder="Улица"  required="required"/>
						<input type="text" name="adress[house]" value="<?= trim($street[1]) ?>" placeholder="Корпус/Дом"  required="required"/>
						<input type="text" name="adress[flat]" value="<?= $user['PERSONAL_MAILBOX'] ?>" placeholder="Квартира/Офис"/>
					</div>	
					<button class="form-submit">Подтвердить способ доставки</button>
					
				</form>
			</div>	
			
			<? 
				} else {
				echo 'Ваша корзина пуста!';
			}
		?>
	</div>
	
	<script>	
		(function($) {		
			$(document).ready(function() {
				
				//-----------------------Делаем обязательным поле другого города, если оно выбрано---------------------------------
				
				var changeCity = $('#form-delivery .input-radio')[3];
				$('#form-delivery').on('change', changeCity, function() {
					if (changeCity.checked === true) {
						$('#other-city')[0].required=true;
						} else {
						$('#other-city')[0].required=false;
					}
				});
			});
		})(jQuery);	
	</script>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>								