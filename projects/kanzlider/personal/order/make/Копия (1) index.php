<?
	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
	$APPLICATION->SetTitle("Оформление заказа");
?>
<?		
	use Bitrix\Main,
    Bitrix\Main\Context,
    Bitrix\Currency\CurrencyManager,
    Bitrix\Sale\Order,
    Bitrix\Sale\Basket,
    Bitrix\Sale\Delivery,
    Bitrix\Sale\PaySystem;
	
	Bitrix\Main\Loader::includeModule("sale");
	Bitrix\Main\Loader::includeModule("catalog");
	
	global $USER;
	
	$basket = Basket::loadItemsForFUser(\CSaleBasket::GetBasketUserID(), SITE_ID);
	$basketItems = $basket->getBasketItems();	
?>

<main class="main">
	<div class="wrap">
		
		<h1 class="main-title">
			<?= strtoupper($APPLICATION->GetTitle()) ?>
		</h1>
		
		<? if ( $basket->getListOfFormatText() ) { ?>
			
			<? //----------------------------------- (шаг 3) Для подтверждения заказа -------------------------------------
				
				if ($_POST['pays'] && $_POST['step1']) { 
					$step1 = json_decode($_POST['step1']);
					$user = (array)$step1->user;
					$adress = (array)$step1->adress;
					
					if ($USER->IsAuthorized()) {		
						if (!$USER->Update($USER->GetID(), array(
						'NAME'=>$user['name'],
						'LAST_NAME'=>$user['last-name'],
						'SECOND_NAME'=>$user['second-name'],
						'EMAIL'=>$user['email'],
						'WORK_COMPANY'=>$user['work'],
						'PERSONAL_PHONE'=>$user['phone'],
						'PERSONAL_CITY'=>$adress['city'], 
						'PERSONAL_STREET'=>$adress['street'] . ', ' . $adress['house'],
						'PERSONAL_MAILBOX'=>$adress['flat']
						)) ) {
							echo $USER->LAST_ERROR;
							$stop = 1;
						}
					} else {
						
						$newUser = new CUser;
						$arFields = array(
						'NAME'=>$user['name'],
						'LAST_NAME'=>$user['last-name'],
						'SECOND_NAME'=>$user['second-name'],
						'EMAIL'=>$user['email'], 
						'LOGIN'=>$user['email'],
						'PASSWORD'=>'pass-123645',
						'CONFIRM_PASSWORD'=>'pass-123645',
						'PERSONAL_PHONE'=>$user['phone'],
						'WORK_COMPANY'=>$user['work'],
						'PERSONAL_CITY'=>$adress['city'],
						'PERSONAL_STREET'=>$adress['street'] . ', ' . $adress['house'],
						'PERSONAL_MAILBOX'=>$adress['flat']
						);
						
						$ID = $newUser->Add($arFields);
						if (intval($ID) > 0) {				
							$newUser->Authorize($ID);
							$a = CUser::SendUserInfo($newUser->GetID(), SITE_ID,  "Приветствуем Вас как нового пользователя нашего сайта!", true, "USER_INFO");
							var_dump($a, CUser::SendUserInfo($newUser->GetID(), SITE_ID,  "Приветствуем Вас как нового пользователя нашего сайта!", true, "USER_INFO") );
						} else {
							echo $newUser->LAST_ERROR;
							$stop = 1;
						}
					}
					
					$pays = array();
					$a = CSalePaySystem::GetList( array("SORT"=>"ASC", "ID"=>"ASC"), array('ID'=>$_POST['pays']), false, false, array('ID', 'NAME', 'DESCRIPTION') );
					while( $b = $a->GetNext()) {
						$pays[] = $b;
					}
				?>
				
				<? //------------------(шаг 3) Вывод формы для подтверждения, если нет ошибок при обовлении юзера-----------
					
					if (!$stop) { 
					?>
					
					<div id="order-div">			
						<div class="order-steps">
							<div class="step">Доставка</div>
							<div class="step">Способ оплаты</div>
							<div class="step active-step">Подтверждение</div>
						</div>
						
						<div class="block-goods">
							
							<div class="order-title">
								ТОВАРЫ: <?= array_sum($basket->getQuantityList()) ?> НА СУММУ <?= $basket->getPrice() ?> РУБ:
								<a class="href-change" href="/personal/cart/">ИЗМЕНИТЬ</a>
							</div>
							
							<?	foreach ($basket as $basketItem) { ?>
								<div class="good">
									<?= $basketItem->getField('NAME') ?>   <?= intval($basketItem->getField('QUANTITY') ) ?> шт. -> <?= round( $basketItem->getField('PRICE') , 2) ?> руб.
								</div>
							<? } ?>
						</div>
						
						<div class="order-title">
							Доставка и оплата:
							<a class="href-change" href="/personal/order/delivery/">ИЗМЕНИТЬ</a>
						</div>	
						<div class="order-user-info">
							<? 
								if ($user['last-name']) {
									echo $user['last-name'] . ' ';
								}
								echo $user['name'];
								if ($user['second-name']) {
									echo ' ' . $user['second-name'];
								}
								echo ' г. ' . $adress['city'] . ', ул. ' . $adress['street'] . ', дом ' . $adress['house'];
								if ($adress['flat']) {
									echo ', кв. ' . $adress['flat'];
								}
								if ($user['phone']) {
									echo ', тел.: ' . $user['phone'];
								}
							?>
						</div>
						<div class="order-pays-info">
							<?= trim($pays[0]['~DESCRIPTION']) ?>
						</div>
						<? $step3 = array('user'=>$user, 'pays'=>$pays[0]); ?>
						<form action="/personal/order/make/index.php?orderstatus=confirm" method="post">
							<input type="hidden" name="step3" value='<?= json_encode($step3) ?>'/>
							<button class="form-submit">Оформить заказ</button>
						</form>
						
					</div>
					<?
					}
					//-----------------------------(шаг 4) Сохранение заказа и вывод сообщения---------------------------------
					
				} else if ($_POST['step3'] && ($_GET['orderstatus'] === 'confirm') )  {
					$step3 = json_decode($_POST['step3']);
					$user = (array)$step3->user;
					$pays = (array)$step3->pays;
					orderCreate();
				}
			} else {
				LocalRedirect("/personal/cart/");
			}
		?>
		<?
			function orderCreate() {
				global $user, $basket, $pays, $USER;
				$order = Order::create(SITE_ID, $USER->GetID());
				$currencyCode = CurrencyManager::getBaseCurrency();
				$order->setBasket($basket);
				
				$shipmentCollection = $order->getShipmentCollection();
				$shipment = $shipmentCollection->createItem();
				$service = Delivery\Services\Manager::getById(Delivery\Services\EmptyDeliveryService::getEmptyDeliveryServiceId());
				$shipment->setFields(array(
				'DELIVERY_ID' => $service['ID'],
				'DELIVERY_NAME' => $service['NAME'],
				));
				$shipmentItemCollection = $shipment->getShipmentItemCollection();
				foreach ($order->getBasket() as $item) {
					$shipmentItem = $shipmentItemCollection->createItem($item);
					$shipmentItem->setQuantity($item->getQuantity());
				}
				
				$paymentCollection = $order->getPaymentCollection();
				$payment = $paymentCollection->createItem();
				$paySystemService = PaySystem\Manager::getObjectById( $pays['ID'] );
				$payment->setFields(array(
				'PAY_SYSTEM_ID' => $paySystemService->getField("PAY_SYSTEM_ID"),
				'PAY_SYSTEM_NAME' => $paySystemService->getField("NAME"),
				));
				
				$order->setPersonTypeId(1);
				$order->setField('CURRENCY', $currencyCode);
				$propertyCollection = $order->getPropertyCollection();
				
				$emailPropValue = $propertyCollection->getUserEmail();	
				$phoneProp = $propertyCollection->getPhone();
				$nameProp = $propertyCollection->getPayerName();
				$nameProp->setValue( $user['last-name'] . ' ' . $user['name'] . ' ' . $user['second-name'] );
				$phoneProp->setValue( $user['phone'] );	
				
				$order->doFinalAction(true);
				
				if ($order->save() ) {
					echo 'Ваш заказ №' . $order->getId() . ' принят! В ближайшее время наш менеджер свяжется с Вами!';
				}
			}
		?>
	</div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>												