<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Clients');
?>
<?$APPLICATION->IncludeComponent("bitrix:news.list", "clients",
    array(
        "IBLOCK_ID"     => 3,
        "SORT_ORDER1"   => "ASC",
        "SORT_BY2"      => "SORT",
        "SORT_ORDER2"   => "ASC",
        "CACHE_TYPE"    => "A",
        "SET_TITLE"     => "N",
        "PROPERTY_CODE" => array("GALLERY", "VIDEO"),
    )
);?>
<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>
