<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Главная');
$APPLICATION->SetPageProperty('body_class', 'page--index');
?>
<?
$APPLICATION->IncludeComponent("bitrix:news.list", "slider",
    array(
        "IBLOCK_ID"     => 1,
        "NEWS_COUNT"    => "20",
        "SORT_BY1"      => "SORT",
        "SORT_ORDER1"   => "ASC",
        "CACHE_TYPE"    => "A",
        "SET_TITLE"     => "N",
        "PROPERTY_CODE" => array("BUTTON_LINK", "BUTTON_TEXT"),
    )
);
?>

<div class="buttons">
    <?$APPLICATION->IncludeComponent("bitrix:catalog.section.list","buttons",
        Array(
        "IBLOCK_ID"   => 2,
        "TOP_DEPTH"   => "2",
        "SORT_BY1"    => "DEPTH_LEVEL",
        "SORT_ORDER1" => "ASC",
        )
    );?>
    <a href="/order/" class="buttons__item"><div class="buttons__title">Order now</div></a>
</div>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
