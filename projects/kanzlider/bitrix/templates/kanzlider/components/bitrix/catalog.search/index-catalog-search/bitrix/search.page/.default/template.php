<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>

<form action="/catalog/" method="post"  class="top-info-search__form">	
	<input type="text" placeholder="искать на сайте" name="q"  class="top-info-search__input" value="<?=$arResult["REQUEST"]["QUERY"]?>" size="40" />	
	<input type="submit" value="" class="top-info-search__submit"/>	
</form>
<br/>

<?if(isset($arResult["REQUEST"]["ORIGINAL_QUERY"])) { ?>
	
	<div class="search-language-guess">
		<?echo GetMessage("CT_BSP_KEYBOARD_WARNING", array("#query#"=>'<a href="'.$arResult["ORIGINAL_QUERY_URL"].'">'.$arResult["REQUEST"]["ORIGINAL_QUERY"].'</a>'))?>
	</div>
	<br />
	
<? } ?>
