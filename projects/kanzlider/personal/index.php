<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
	$APPLICATION->SetTitle("Личный кабинет");
?>
<? 
	global $USER;
	$groups = CUser::GetUserGroup( $USER->GetID() );
	$type = 'FIZ';
	foreach ($groups as $gr) {
		if ( intval( $gr ) === 6) {$type = 'UR';}
	}
?>
<main class="main">
	<div class="wrap">
		
		<?$APPLICATION->IncludeComponent(
			"bitrix:breadcrumb",
			"altasib.breadcrumb_rdf",
			Array(
			"PATH" => "",
			"SITE_ID" => "s1",
			"START_FROM" => "0"
			)
		);?>
		<h1 class="main-title">
			<?= $APPLICATION->GetTitle(); ?>
		</h1>
		
		<div class="wrapPersonal">
			<?$APPLICATION->IncludeComponent(
				"bitrix:menu",
				"personal-menu",
				Array(
				"ALLOW_MULTI_SELECT" => "N",
				"CHILD_MENU_TYPE" => "left",
				"DELAY" => "N",
				"MAX_LEVEL" => "1",
				"MENU_CACHE_GET_VARS" => array(""),
				"MENU_CACHE_TIME" => "3600",
				"MENU_CACHE_TYPE" => "A",
				"MENU_CACHE_USE_GROUPS" => "Y",
				"ROOT_MENU_TYPE" => "cabinet",
				"USE_EXT" => "N"
				)
			);?> 	
			
			
			<? if ($type === 'UR') { ?> 
				
				<?$APPLICATION->IncludeComponent(
					"api:auth.profile",
					"cabinet",
					Array(
					"CHECK_RIGHTS" => "N",
					"CUSTOM_FIELDS" => array("UF_USER_INN"),
					"READONLY_FIELDS" => array(),
					"REQUIRED_FIELDS" => array("NAME"),
					"SHOW_LABEL" => "Y",
					"USER_FIELDS" => array("LAST_NAME","NAME","SECOND_NAME","PERSONAL_PHONE","PERSONAL_BIRTHDAY","PERSONAL_CITY","PERSONAL_STREET","WORK_COMPANY")
					)
				);?> 
				
				<? } else { ?> 
				
				<?$APPLICATION->IncludeComponent(
					"api:auth.profile",
					"cabinet",
					Array(
					"CHECK_RIGHTS" => "N",
					"CUSTOM_FIELDS" => array(),
					"READONLY_FIELDS" => array(),
					"REQUIRED_FIELDS" => array("NAME"),
					"SHOW_LABEL" => "Y",
					"USER_FIELDS" => array("LAST_NAME","NAME","SECOND_NAME","PERSONAL_PHONE","PERSONAL_BIRTHDAY")
					)
				);?>
				
			<? } ?>
		</div>
	</div>	
</main>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>