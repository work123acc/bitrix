<?
$i=1;
foreach ($arResult['SECTIONS'] as $key=>$section) {

    $rsParentSection = CIBlockSection::GetByID($section['ID']);

    if ($arParentSection = $rsParentSection->GetNext())
    {
        $arFilter = array('IBLOCK_ID' => $arParams['IBLOCK_ID'],'>LEFT_MARGIN' => $arParentSection['LEFT_MARGIN'],'<RIGHT_MARGIN' => $arParentSection['RIGHT_MARGIN'],'>DEPTH_LEVEL' => $arParentSection['DEPTH_LEVEL'],'ACTIVE'=>'Y'); // выберет потомков без учета активности
        $rsSect = CIBlockSection::GetList(array('left_margin' => 'asc'),$arFilter);
        while ($arSect = $rsSect->GetNext())
        {
            // получаем подразделы
            $arResult['SECTIONS'][$key]['SECTIONS'][$i]['NAME']=$arSect['NAME'];
            $arResult['SECTIONS'][$key]['SECTIONS'][$i]['URL']=$arSect['SECTION_PAGE_URL'];
            $arResult['SECTIONS'][$key]['SECTIONS'][$i]['DEPTH_LEVEL']=$arSect['DEPTH_LEVEL'];
            $i=$i+1;
        }
    }
}

?>