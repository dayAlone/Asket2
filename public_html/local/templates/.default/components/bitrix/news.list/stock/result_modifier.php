<?
$ids = array();
$arResult['SECTIONS'] = array();
foreach ($arResult['ITEMS'] as $key=>$item) $ids[] = $item['IBLOCK_SECTION_ID'];
$raw = CIBlockSection::GetList(Array($by=>$order), Array('IBLOCK_ID'=>$arParams['IBLOCK_ID'], 'ID'=>$ids), true, array('ID', 'NAME', 'CODE'));
while($section = $raw->Fetch()) $arResult['SECTIONS'][$section['ID']] = $section;
?>
