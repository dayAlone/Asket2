<?
$ids = array();
$arResult['SECTIONS'] = array();
foreach ($arResult['ITEMS'] as $key=>$item) $ids[] = $item['IBLOCK_SECTION_ID'];
$raw = CIBlockSection::GetList(Array($by=>$order), Array('IBLOCK_ID'=>$arParams['IBLOCK_ID'], 'ID'=>$ids), true, array('ID', 'NAME', 'CODE'));
while($section = $raw->Fetch()) $arResult['SECTIONS'][$section['ID']] = $section;
if (!function_exists('sections_id_sort')) {
    function sections_id_sort($a, $b) { return ($a['IBLOCK_SECTION_ID'] <= $b['IBLOCK_SECTION_ID']) ? -1 : 1; }
}
uasort($arResult['ITEMS'], "sections_id_sort");
?>
