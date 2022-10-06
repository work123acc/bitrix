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
		<div class="btn_selected_filters">
                    <i class="back" onclick="history.back()"></i>
									  <?
    echo (
			isset($arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"]) && $arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"] != ""
			? $arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"]
			: $arResult['SECTION']['NAME']
		);
    ?>
          <?php
      
          if(count($arStruct)>0){
          ?>
        <div class="select_icon">
                <img src="/img/select.svg" alt="">
        </div>
          <?}?>
</div>
<?if(count($arStruct)>0){?>
<div class="select_list">
                                                                    <?
if (0 < count($arResult['SECTIONS']))
{?>
									<ul>
                                                                            
    <?  for ($i = 0; $i < count($arStruct); $i++) {?>                                                                        
										<li>
                                          <a  href="<?=$arStruct[$i]['LINK'];?>"><?=$arStruct[$i]['NAME']; ?></a>
<!--                                          <i class="arr"></i>-->
                                        </li>
    <?}?>
									</ul>
<?}?>
</div>
<?}?>