<?
$s = $arResult['SECTION']['PATH'][0]['CODE'];
foreach ($arResult['ITEMS'] as $key=>$item):?>
    <?if ($arResult['ITEMS'][$key - 1]['IBLOCK_SECTION_ID'] !== $item['IBLOCK_SECTION_ID']) {?>
        <?= $key > 0 ? "</div>" : "" ?>
        <a name="<?=$s?>__<?=$arResult['SECTIONS'][$item['IBLOCK_SECTION_ID']]['CODE']?>"></a>
        <h2><?=$arResult['SECTIONS'][$item['IBLOCK_SECTION_ID']]['NAME']?></h2>
        <div class="stock">
    <? } ?>
      <div class="stock__item">
        <a name="<?=$s?>__<?=$arResult['SECTIONS'][$item['IBLOCK_SECTION_ID']]['CODE']?>-<?=$item['CODE']?>"></a>
        <div style="background-image: url(<?=$item['PREVIEW_PICTURE']['SRC']?>)" class="stock__image"></div>
        <div class="stock__name"><?=$item['~NAME']?></div>
        <div class="stock__description">
          <?=$item['~PREVIEW_TEXT']?>
        </div>
        <a href="/order/?model=<?=$item['~NAME']?>" class="stock__request">Request</a>
      </div>
<?endforeach;?>
</div>
