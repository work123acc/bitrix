<?
	AddEventHandler("iblock", "OnBeforeIBlockElementAdd", "OnBeforeIBlockElementAddHandler");
	
	function OnBeforeIBlockElementAddHandler(&$arFields) {
		$iblick_id = 90;
		$mail_prop_id = '725';
		if ($arFields['IBLOCK_ID'] === 90) {
			//$mail_to = $arFields['PROPERTY_VALUES'][$mail_prop_id]['n0']['VALUE'];
			$mail_to = $arFields['PROPERTY_VALUES'][$mail_prop_id];
			$content = 'error';
			
			//if ( filter_var( $mail_to, FILTER_VALIDATE_EMAIL ) ) {				
			if ( $mail_to ) {				
				$text_mail = "
				Сообщение с сайта Дверопол;<br/>
				Узнайте 10 самых распространенных ошибок при выборе дверей и ламината!<br/>
				";				
				$text_mail .= "<a href=\"http://{$_SERVER['SERVER_NAME']}/laminat_file.jpg\">laminat_file.pdf</a>";
				
				$kto = 'sale@new.dveropol.com';
				$headers .= "Content-type: text/html; charset=utf-8\r\n";
				$headers .= "From: ".$kto."\r\n";			
				
				if(mail($mail_to,$kto,$text_mail,$headers) ) {
					$content = $mail_to;
				}
			}

			if ($content === 'error' ) {
				global $APPLICATION;
				$APPLICATION->throwException("Неверный e-mail");
				return false;				
			}
			
			
			/*$content = json_encode( $arFields ) ;
				//$content .= '     ' . json_encode($mail_to);
				$content .= '     ' . json_encode($arFields['PROPERTY_VALUES'][$mail_prop_id]);
				//$content .= '     ' . json_encode($mail_to['n0']);
				//$content .= '     ' . $mail_to['n0']['VALUE'];
			file_put_contents( $_SERVER["DOCUMENT_ROOT"] . '/000/1.txt' ,  $content  );*/
		}
	}
	
	
	
	
	AddEventHandler('form', 'onBeforeResultAdd', 'my_onBeforeResultAdd');
	
	function my_onBeforeResultAdd($WEB_FORM_ID, &$arFields, &$arrVALUES) {
		//$content = json_encode( $arFields );
		$content = json_encode( $WEB_FORM_ID );
		$content .= '                          ';
		//$content .= json_encode( $arrVALUES );
		$content .= json_encode( $arrVALUES['form_email_35'] );
		file_put_contents( $_SERVER["DOCUMENT_ROOT"] . '/000/1.txt', $content );
		
		if ($WEB_FORM_ID === '8') {
			$mail_to = $arrVALUES['form_email_35'];
			if ( $mail_to ) {
				
				$text_mail = "
				Сообщение с сайта Дверопол;<br/>
				Узнайте 10 самых распространенных ошибок при выборе дверей и ламината!<br/>
				";				
				$text_mail .= "<a href=\"http://{$_SERVER['SERVER_NAME']}/laminat_file.jpg\">laminat_file.pdf</a>";
				
				$kto = 'sale@new.dveropol.com';
				$headers .= "Content-type: text/html; charset=utf-8\r\n";
				$headers .= "From: ".$kto."\r\n";			
				
				mail($mail_to,$kto,$text_mail,$headers);
			}
		}
	}
?>