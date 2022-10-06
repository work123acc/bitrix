<?
	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
	$APPLICATION->SetTitle("Оформление заказа");
?>
<?	
	$pays = array();
	$a = CSalePaySystem::GetList( array("SORT"=>"ASC", "ID"=>"ASC"), array('ACTIVE'=>'Y'), false, false, array('ID', 'NAME', 'DESCRIPTION') );
	while( $b = $a->GetNext()) {
		$pays[] = $b;
	}
?>
<main class="main">
	<div class="wrap">
		
		<h1 class="main-title">
			<?= strtoupper($APPLICATION->GetTitle()) ?>
		</h1>
		
		<? if ($_POST['user'] && $_POST['adress'] && $_POST['delivery']) { ?>
			
			<div id="order-div">
				<div class="order-steps">
					<div class="step">Доставка</div>
					<div class="step active-step">Способ оплаты</div>
					<div class="step">Подтверждение</div>
				</div>
				
				<form action="/personal/order/make/" id="form-pays" method="post">
					<input type="hidden" name="step1" value='<?= json_encode($_POST) ?>'/>
					<div class="form-pays">
						
						<? foreach ($pays as $key=>$p) { ?>
							
							<div class="devs">
								<input type="radio" name="pays" id="input-<?= $p['ID'] ?>" class="input-radio" value="<?= $p['ID'] ?>" <? if ($key===0) {echo 'checked';} ?>/>
								<label class="" for="input-<?= $p['ID'] ?>"><?= $p['NAME'] ?></label>
								<div><?= $p['~DESCRIPTION'] ?></div>
							</div>
							
						<? } ?>
					</div>
					<button class="form-submit">Подтвердить способ оплаты</button>
				</form>
			</div>
			<? 
				} else {
				LocalRedirect("/personal/cart/");
			}
		?>
	</div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>									