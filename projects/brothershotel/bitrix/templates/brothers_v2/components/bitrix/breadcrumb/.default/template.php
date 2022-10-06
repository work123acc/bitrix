<?
#################################################
#   Company developer: ALTASIB                  #
#   Developer: Eremchenko Alexey                #
#   Site: http://www.altasib.ru                 #
#   E-mail: info@altasib.ru                     #
#   Copyright (c) 2006-2014 ALTASIB             #
#################################################

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//delayed function must return a string
if(empty($arResult))
	return "";

//$strReturn = '<ul xmlns:v="http://rdf.data-vocabulary.org/#" class="breadcrumb-navigation">';
$strReturn = '';

for($index = 0, $itemSize = count($arResult); $index < $itemSize; $index++)
{
	if($index > 0)
		//$strReturn .= '<li class="m0"><span>&nbsp;/&nbsp;</span></li>';

	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	
	if($arResult[$index]["LINK"] <> "")
	{	
		$strReturn .= '<li><a href="'.$arResult[$index]["LINK"].'">'.$title.'</a></li>';
	}
	else
	{
		$strReturn .= '<li>'.$title.'</li>';
	}
}



//$strReturn .= '</ul>';
return $strReturn;
?>




