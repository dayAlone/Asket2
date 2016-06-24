<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
if(count($arResult['SECTIONS']) > 1):?>
	<?foreach ($arResult['SECTIONS'] as $key => &$item):?>
    <div class="buttons__item">
        <div class="buttons__content">
            <div class="buttons__title"><?=$item['NAME']?></div>
            <div class="buttons__links">
				<?foreach ($item['CHILD'] as $el):?>
					<a href="/stock/#<?=$item['CODE']?>__<?=$el['CODE']?>"><?=$el['NAME']?></a>
				<?endforeach;?></div>
        </div>
    </div>
    <!--<a href="<?=$item['SECTION_PAGE_URL']?>" class="buttons__item"><span class="buttons__text"><?=html_entity_decode($item['NAME'])?></span></a>-->
  	<?endforeach;?>

<?endif;?>
