<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
if(count($arResult['SECTIONS']) > 0):?>
<ul role="tablist" class="tabs">
	<?foreach ($arResult['SECTIONS'] as $key => &$item):?>
	<li role="presentation" class="<?=$key == 0 ? "active " : ""?>tabs__item">
		<a href="#<?=$item['CODE']?>" aria-controls="<?=$item['CODE']?>" role="tab" data-toggle="tab"><?=$item['NAME']?></a>
	</li>

	<?endforeach;?>
</ul>

<div class="tab-content">
	<?foreach ($arResult['SECTIONS'] as $key => &$item):?>
		<div id="<?=$item['CODE']?>" role="tabpanel" class="tabs__content tab-pane fade<?=$key == 0 ? " in active" : ""?>">
		<?$APPLICATION->IncludeComponent("bitrix:news.list", "stock",
			array(
				"IBLOCK_ID"            => $arParams['IBLOCK_ID'],
				"PARENT_SECTION"       => $item['ID'],
				"NEWS_COUNT"           => "20000",
				"SORT_BY1"             => "SORT",
				"SORT_ORDER1"          => "ASC",
				"CACHE_TYPE"           => "A",
				"SET_TITLE"            => "N"
			)
		);?>
		</div>
	<?endforeach;?>
</div>

<?endif;?>
