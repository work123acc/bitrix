<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
	
	use \Bitrix\Main\Localization\Loc;
	
	/**
		* @global CMain $APPLICATION
		* @var array $arParams
		* @var array $arResult
		* @var CatalogSectionComponent $component
		* @var CBitrixComponentTemplate $this
		* @var string $templateName
		* @var string $componentPath
	*/
	
	if ($arResult['ITEMS']) {
		foreach ($arResult['ITEMS'] as $item) {
			if ($item['ID'] !== $GLOBALS['TEMPLATE_THIS_ELEMENT_ID'] ) {
			?>
			
			<article class="goods__item">
				<div class="goods__image">
					<a href="<?= $item['DETAIL_PAGE_URL']?>"></a>
					<img src="<?= $item['PREVIEW_PICTURE']['SRC']?>" alt="">
				</div>
				<div class="goods__item-title">
					<a href="<?= $item['DETAIL_PAGE_URL']?>"><?= $item['ID'] ?><?= $item['NAME']?></a>
				</div>
				<div class="goods__description">
					<div class="goods__count-box">
						<div class="goods__count-package">
							<?= $item["PROPERTIES"]["CML2_BASE_UNIT"]["~DESCRIPTION"] ?> <?= $item["PROPERTIES"]["CML2_BASE_UNIT"]["~VALUE"] ?>
						</div>
						<div class="goods__count-stock">
							
							<? if($item["OFFERS"][0]["CATALOG_QUANTITY"]>25){ ?>
								> 25 шт. на складе
								<? } else { ?>
								<? if($item["OFFERS"][0]["CATALOG_QUANTITY"]==0 or $item["OFFERS"][0]["CATALOG_QUANTITY"]<0){ ?>
									нет в наличии
									<? } else { ?>
									<?=item["OFFERS"][0]["CATALOG_QUANTITY"]?> шт. на складе
								<? } ?>								
							<? } ?>
							
							</div>
							</div>
							<div class="goods__code-box">
								<div class="goods__code-title">
									Код:
								</div>
								<div class="goods__code">
									<?= $item["PROPERTIES"]["CML2_ARTICLE"]["~VALUE"] ?>
								</div>
							</div>
						</div>
						<div class="goods__price-box">
							<div class="goods__count-select">
								<input type="text" value="1" class="quantity_input">
							</div>
							
							<div class="goods__count-but-box">
								<input type="hidden" class="product_kol" value="<?=$item["OFFERS"][0]["CATALOG_QUANTITY"]?>" />
								<a href="" class="goods__count-button  goods__count-button--up quantity_plus"></a>
								<a href="" class="goods__count-button  goods__count-button--down quantity_minus"></a>
							</div>
							
							<div class="goods__price"><span><?=$item["OFFERS"][0]["MIN_PRICE"]["VALUE_NOVAT"]?></span> Р</div>
							<input type="hidden" class="product_id" value="<?=$item["OFFERS"][0]["ID"]?>"/>						
							
							
							<?if($item["OFFERS"][0]["CAN_BUY"]){ ?>
								<a href="" class="goods__add-cart add_cart"></a>
								<?}else{?>
								<a href="javascript:void(0)" class="goods__add-cart  goods__add-cart--denied">нет в наличии</a>
							<? } ?>
							
						</div>
						<div class="goods__advanced-box">
							<div class="goods__advanced-button  goods__advanced-button--compare">
								
								
								<? if(isset($_SESSION["CATALOG_COMPARE_LIST"][3]["ITEMS"][$item["OFFERS"][0]["ID"]])){ ?>
								<a href="javascript:void(0)" id="compare_<?=$item["OFFERS"][0]["ID"]?>"  />Уже в сравнении</a>
								
								<? } else { ?>
							<a href="javascript:void(0)" id="compare_<?=$item["OFFERS"][0]["ID"]?>" onclick="docompare(<?=$item["OFFERS"][0]["ID"]?>)" />Сравнить</a>
							
						<? } ?>
						
						
					</div>
					<div class="goods__advanced-button  goods__advanced-button--favorite"><a href="" data-wishiblock="<?=$item["IBLOCK_ID"]?>" data-wishid="<?=$item["ID"]?>" class="js-wishlist">в избранное</a></div>
				</div>
			</article>
			
			<?
			}
		}				
	}
?>	
