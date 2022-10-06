<?
	function testAgent() {
        file_put_contents($_SERVER["DOCUMENT_ROOT"] . '/000/2.txt', 'test');
        return "testAgent();";
	}
	
	function updateNovinki() {
		Cmodule::IncludeModule('iblock');
		Cmodule::IncludeModule('catalog');
		
		$date = new DateTime();
		//$date->modify('-3 month');
		$date->modify('-1 month');
		$dayX = $date->getTimestamp();
		
		$PROPERTY_CODE = "NEW";  
		$PROPERTY_VALUE = "0";
		$arSelect = Array("ID", "NAME", "DATE_CREATE", "PROPERTY_NEW");
		$arFilter = Array("IBLOCK_ID"=>"13", "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
		$arOrder = Array("created"=>"desk");
		$res = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);
		
		$arr = array();
		while($ob = $res->GetNextElement())
		{
			$arFields = $ob->GetFields();
			$timeCreate =  MakeTimeStamp($arFields["DATE_CREATE"]);
			if ($timeCreate < $dayX) { 
				$arr[] = $arFields["ID"];				
				CIBlockElement::SetPropertyValues($arFields["ID"], "13", "0", $PROPERTY_CODE);
				file_put_contents( $_SERVER["DOCUMENT_ROOT"] . '/000/1.txt', 'updateNovinki' . $PROPERTY_CODE . implode(',' , $arr ) );
			} 
			else {
				CIBlockElement::SetPropertyValues($arFields["ID"], "13", "1", $PROPERTY_CODE);
			}
		}
		return "updateNovinki();";
	}
?>