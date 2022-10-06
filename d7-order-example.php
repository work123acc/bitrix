
<? 	
	function orderCreate() {
		global $user, $delivery, $basket, $pays, $USER;
		$order = Order::create(SITE_ID, $USER->GetID());
		$currencyCode = CurrencyManager::getBaseCurrency();
		$order->setBasket($basket);
		
		$shipmentCollection = $order->getShipmentCollection();
		$shipment = $shipmentCollection->createItem();
		
		/*------------------------------- Получаем типы доставки -----------------------------------------*/
		
		if ( $delivery['ID'] ) { $service = Delivery\Services\Manager::getById( intval($delivery['ID']) ); }
		else { $service = Delivery\Services\Manager::getById(Delivery\Services\EmptyDeliveryService::getEmptyDeliveryServiceId()); }
		
		$shipment->setFields(array(
		'DELIVERY_ID' => $service['ID'],
		'DELIVERY_NAME' => $service['NAME'],
		));
		$shipmentItemCollection = $shipment->getShipmentItemCollection();
		foreach ($order->getBasket() as $item) {
			$shipmentItem = $shipmentItemCollection->createItem($item);
			$shipmentItem->setQuantity($item->getQuantity());
		}
		
		/*------------------------------- В комментарий заказа пишем город -----------------------------------------*/
		
		if ( $delivery['ID'] === '5' && $delivery['other-city'] ) { $order->setField('COMMENTS', $delivery['other-city'] ); }
		
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
			echo '<h3 style="text-align: center;">Ваш заказ №' . $order->getId() . ' принят! В ближайшее время наш менеджер свяжется с Вами!</h3>';
		}
	}
?>	