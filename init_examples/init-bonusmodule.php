<?

	\Bitrix\Main\EventManager::getInstance()->addEventHandler("logictim.balls", "BeforeGetBonusList", "TestBonusGroup");
	
	function TestBonusGroup(\Bitrix\Main\Event $event) {		
		$arBonus = $event->getParameters();
		
		//������� ������ ������� � ���������� �� ������ ������������
		$userGroups = CUser::GetUserGroup($arBonus["USER_ID"]);		
		//���� ������������ ��������� � ������ � id = 1 		15 - �������� ������
		if(in_array(15, $userGroups))
		{
			//������� �������� "��������� �� ��� ������" �� �������� ������
			$arBonus["MODULE_PARAMS"]["BONUS_ALL_PRODUCTS"] = 7;			
			//����� ������ �� ����� �� �������� ������� � ����� LOGICTIM_BONUS_BALLS_2
			$arBonus["BONUS_PROP"] = 'LOGICTIM_BONUS_BALLS_2'; //��� �������� ������, ������ ������� ������			
			//����� ������ �� ��������� �� �������� UF_LOGICTIM_BONUS_2
			$arBonus["BONUS_CAT_PROP"] = 'UF_LOGICTIM_BONUS_2'; //��� �������� �������, ������ ������� ������
		}				
		$result = new Bitrix\Main\EventResult($event->getEventType(), $arBonus);
		return $result;		
	}
	
?>