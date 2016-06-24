<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Our stock');
?>
<h3>We are always open for mutual beneficial cooperation!</h3>
<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list","stock",
    Array(
    "IBLOCK_ID"   => 2,
    "TOP_DEPTH"   => 1,
    )
);?>
<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>
