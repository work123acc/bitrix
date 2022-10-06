<?

	\Bitrix\Main\EventManager::getInstance()->addEventHandler("logictim.balls", "BeforeGetBonusList", "TestBonusGroup");
	
	function TestBonusGroup(\Bitrix\Main\Event $event) {		
		$arBonus = $event->getParameters();
		
		//Изменим расчет бонусов в зависмости от группы пользователя
		$userGroups = CUser::GetUserGroup($arBonus["USER_ID"]);		
		//Если пользователь относится к группе с id = 1 		15 - Тестовая группа
		if(in_array(15, $userGroups))
		{
			//Изменим значение "Начислять на все товары" из настроек модуля
			$arBonus["MODULE_PARAMS"]["BONUS_ALL_PRODUCTS"] = 7;			
			//Берем бонусы за товар из свойства товаров с кодом LOGICTIM_BONUS_BALLS_2
			$arBonus["BONUS_PROP"] = 'LOGICTIM_BONUS_BALLS_2'; //Код свойства товара, откуда берутся бонусы			
			//Берем бонусы за категорию из свойства UF_LOGICTIM_BONUS_2
			$arBonus["BONUS_CAT_PROP"] = 'UF_LOGICTIM_BONUS_2'; //Код свойства раздела, откуда берутся бонусы
		}				
		$result = new Bitrix\Main\EventResult($event->getEventType(), $arBonus);
		return $result;		
	}
	
?>