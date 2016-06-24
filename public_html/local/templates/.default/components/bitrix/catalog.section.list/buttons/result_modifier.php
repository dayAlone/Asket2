<?
    function depth_sort($a, $b)
    {
        return ($a['DEPTH_LEVEL'] <= $b['DEPTH_LEVEL']) ? -1 : 1;
    }
    function ids_sort($a, $b)
    {
        return ($a['ID'] <= $b['ID']) ? -1 : 1;
    }
    uasort($arResult['SECTIONS'], "depth_sort");
    $sections = array();
    foreach ($arResult['SECTIONS'] as $key => $item) {
        $value = array(
            'NAME' => $item['NAME'],
            'CODE' => $item['CODE'],
            'CHILD' => array()
        );
        if ($item['DEPTH_LEVEL'] == 1) {
            $sections[$item['ID']] = $value;
        } else {

            $sections[$item['IBLOCK_SECTION_ID']]['CHILD'][$item['ID']] = $value;

        }
    }
    $arResult['SECTIONS'] = $sections;
    uasort($arResult['SECTIONS'], "ids_sort");
?>
