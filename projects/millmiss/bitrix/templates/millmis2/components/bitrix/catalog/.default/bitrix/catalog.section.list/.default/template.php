<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

//Постороение струкутуры
$k=-1;
$arStruct=array();
foreach ($arResult['SECTIONS'] as &$arSection){
    if($arSection["RELATIVE_DEPTH_LEVEL"]==1){
        $k++;
        $arStruct[$k]["LINK"]=$arSection["SECTION_PAGE_URL"];
        $arStruct[$k]["NAME"]=$arSection["NAME"];
        $arStruct[$k]["SECTION"]=array();
    }else{
        $arStruct[$k]["SECTION"][]=array(
            "LINK"=>$arSection["SECTION_PAGE_URL"],
            "NAME"=>$arSection["NAME"],
        );
    }
    
}

?>

<h3>
    <?
    echo (
			isset($arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"]) && $arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"] != ""
			? $arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"]
			: $arResult['SECTION']['NAME']
		);
    ?>
</h3>
<?
if (0 < count($arResult['SECTIONS']))
{?><ul>
    <?
        for ($i = 0; $i < count($arStruct); $i++) {
            $flag_sect=false;
        if(0 < count($arStruct[$i]["SECTION"])){
            $flag_sect=true;
        }
    
    ?>
    <li <?if($flag_sect)echo "class='arrow_list_menu'"?> >
        <a  href="<?=$arStruct[$i]['LINK'];?>"><?=$arStruct[$i]['NAME']; ?></a>
       <?if($flag_sect){?>
         <ul class="left-sidebar-submenu animated fadeInRight">
            <?for($j= 0; $j < count($arStruct[$i]['SECTION']); $j++) {?>
                          <li ><a href="<?=$arStruct[$i]['SECTION'][$j]["LINK"]?>"><?=$arStruct[$i]['SECTION'][$j]["NAME"]?></a></li>
            <?}?>
         </ul>   
           
           
      <? }?>
    
    </li>    
        
        
    <?}?>    
        
        
        
</ul>
    
    
    
<?}else{
    $path=count($arResult["SECTION"]["PATH"])-2;
   // echo $arResult["SECTION"]["PATH"][$path]["ID"]." - ".$arResult["SECTION"]["PATH"][$path]["CODE"];
    $APPLICATION->IncludeComponent(
		"bitrix:catalog.section.list",
		"path",
		array(
			"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"SECTION_ID" =>$arResult["SECTION"]["PATH"][$path]["ID"] ,
			"SECTION_CODE" => $arResult["SECTION"]["PATH"][$path]["CODE"],
			"CACHE_TYPE" => $arParams["CACHE_TYPE"],
			"CACHE_TIME" => $arParams["CACHE_TIME"],
			"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
			"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
			"TOP_DEPTH" => 5,
			"SECTION_URL" =>"",
			"VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
			"SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
			"HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
			"ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : '')
		),
		$component,
		array("HIDE_ICONS" => "Y")
	);
    
    
}
?>
<?
//echo "<pre>";
//print_r($arResult);
//echo "</pre>";
?>