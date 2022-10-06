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
	
	if ( $arResult['ITEMS'] ) {
		foreach ($arResult['ITEMS'] as $item) {
			if ($item['PROPERTIES']['INDEX_NOVINKA']['~VALUE'] === 'Y') {
			?>
			
			<article class="goods__item">
				
				<div class="goods__image">
					<a href="<?= $item["DETAIL_PAGE_URL"] ?>">
						<img src="<?= $item["DETAIL_PICTURE"]['SRC'] ?>" alt="">
					</a>
				</div>
				
				<div class="goods__item-title">
					<a href="<?= $item["DETAIL_PAGE_URL"] ?>"><?= $item['NAME'] ?></a>
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
									<?=$item["OFFERS"][0]["CATALOG_QUANTITY"]?> шт. на складе
								<? } ?>								
							<? } ?>
							
							
							</div>
							</div>
							
							<div class="goods__code-box">
								<div class="goods__code-title">
									Код:
								</div>
								<div class="goods__code">
									<?= $item["PROPERTIES"]["CODE_1C"]["~VALUE"] ?>
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
<script>
	function docompare(ID) {
		$.post("/ajax/compare.php",{id: ID, action: "ADD_TO_COMPARE_LIST"}, function(data){
			$("#compare_"+ID).text("Уже в сравнении");
			$("#compare_"+ID).removeAttr("onclick");
			$.post("/ajax/compare_count.php",{}, function(data){
				$("#compare_count").text(data);
			});
		});		
	}
</script>