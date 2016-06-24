<?
$item = $arResult;
$s = end($arResult['SECTION']['PATH']);
?>
<a href="#" data-images='<?=json_encode($arResult["PROPS"]['GALLERY'])?>' class="page__more"><?=$item['NAME']?></a>
