<?php
	if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
	
	/**
		* @global CMain $APPLICATION
		*/
	$strNav='';
	
	foreach ($arResult as $nav) { 
		$strNav .= '<a href="' . $nav['LINK'] . '">' . $nav['TITLE'] . '</a>';		
	} 
	return $strNav;
	
	
	
