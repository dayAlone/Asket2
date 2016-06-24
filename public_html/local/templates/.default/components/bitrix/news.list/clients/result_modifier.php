<?
foreach ($arResult['ITEMS'] as $key=>&$item):
    foreach ($item["PROPERTIES"] as $prop):
        switch ($prop['CODE']):
            case "GALLERY":
                $gallery     = array();
                $description = $prop['DESCRIPTION'];
                if(is_array($prop['VALUE'])):
                    foreach ($prop['VALUE'] as $key => $value):
                          $file = CFile::GetByID($value)->Fetch();
                          $small = CFile::ResizeImageGet($value, Array("width" => 312, "height" => 312), BX_RESIZE_IMAGE_PROPORTIONAL, false, false, false, 100);
                          $big = CFile::ResizeImageGet($value, Array("width" => 800, "height" => 700), BX_RESIZE_IMAGE_PROPORTIONAL, false, false, false, 100);
                          $gallery[] = array('title'=>$description[$key], 'value'=> $big['src'], 'src'=>"/upload/".$file['SUBDIR']."/".$file['FILE_NAME'], 'small'=> $small['src'], 'w'=>$file['WIDTH'], "h" => $file['HEIGHT']);
                    endforeach;
                    $item["PROPERTIES"][$prop['CODE']]['VALUE'] = $gallery;
                endif;

            break;
        endswitch;
    endforeach;
endforeach;
?>
