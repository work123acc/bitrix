<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogTopComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

$this->setFrameMode(true);

?>
<div class="share_wrap owl-carousel owl-section">
<?foreach ($arResult['ITEMS'] as $arItem)
                {?>
                    
                 <div class="share_item">
                     <?
                if($arItem["MIN_PRICE"]["VALUE"]>$arItem["MIN_PRICE"]["DISCOUNT_VALUE"]){
                    $flag_discount=true;
                }else{
                     $flag_discount=false;
                }
                     if($flag_discount){?>
                     <div class="share_procent">
							<span>-<?=$arItem["MIN_PRICE"]["DISCOUNT_DIFF_PERCENT"]?>%</span>
						</div>
                     <?}?>
                     
                     
						
						<div class="wrap_img">
                                                       <?$file = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE']['ID'], array('width'=>230, 'height'=>185), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
							<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$file["src"]?>" alt=""></a>
						</div>
						<div class="wrap_description">
							<h3><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["PROPERTIES"]["NAME_TOVAR_SITE"]["VALUE"]?></a></h3>
							<?
                    $descr="";
                    $arDescr=array(
                        $arItem["PROPERTIES"]["TIP_NABORA_1"]["VALUE"],
                        $arItem["PROPERTIES"]["TIP_PARFYUMERII"]["VALUE"],
                        $arItem["PROPERTIES"]["TIP_KOSMETIKI"]["VALUE"],
                        $arItem["PROPERTIES"]["TIP_KOSMETIKI_1"]["VALUE"],
                        $arItem["PROPERTIES"]["TIP_NABORA"]["VALUE"],
                        $arItem["PROPERTIES"]["TIP_KOSMETIKI_2"]["VALUE"],
                        $arItem["PROPERTIES"]["TIP_KOSMETIKI_DLYA_GLAZ"]["VALUE"],
                        $arItem["PROPERTIES"]["TIP_KOSMETIKI_DLYA_NOGTEY"]["VALUE"],
                        $arItem["PROPERTIES"]["TIP_KOSMETIKI_DLYA_BROVEY"]["VALUE"],
                        $arItem["PROPERTIES"]["TIP_AKSESSUARA_DLYA_MAKIYAZHA"]["VALUE"],
                        $arItem["PROPERTIES"]["TIP_UKHODA_DLYA_LITSA"]["VALUE"],
                        $arItem["PROPERTIES"]["TIP_UKHODA_ZA_TELOM"]["VALUE"],
                        $arItem["PROPERTIES"]["TIP_UKHODA_ZA_RUKAMI"]["VALUE"],
                        $arItem["PROPERTIES"]["TIP_UKHODA_ZA_NOGAMI"]["VALUE"],
                        $arItem["PROPERTIES"]["TIP_UKHODA_ZA_VOLOSAMI"]["VALUE"],
                        $arItem["PROPERTIES"]["TIP_TOVARA_DLYA_MUZHCHIN"]["VALUE"],
                        $arItem["PROPERTIES"]["TIP_KOLGOTOK"]["VALUE"],
                        
                    );
                    for ($i = 0; $i < count($arDescr); $i++) {
                        if($arDescr[$i]!=""){
                            $descr=$arDescr[$i];
                            break;
                            
                        }
                    }
                    ?>
                    
                    <?if($descr!=""){?>
                        <p><?=$descr?></p>
                    <?}?>
						</div>
						<div class="wrap_price">
                                                    <?if($flag_discount){?>
                                                        <div class="price_now">
								<span><?=$arItem["MIN_PRICE"]["DISCOUNT_VALUE"]?></span><img src="/img/rouble_blue.svg" alt=""> 
							</div>
							<div class="price_before">
								<span><?=$arItem["MIN_PRICE"]["VALUE"]?></span><img src="img/rouble_grey.svg" alt=""> 
							</div>
                                                    <?}else{?>
                                                        <div class="price_now">
								<span><?=$arItem["MIN_PRICE"]["VALUE"]?></span><img src="/img/rouble_blue.svg" alt=""> 
							</div>
                                                    <?}?>
							
						</div>
					</div>  
                    
                    
                    <?}?>
					

					
</div>

<?
//echo "<pre>";
//print_r($arResult['ITEMS']);
//echo "</pre>";
?>