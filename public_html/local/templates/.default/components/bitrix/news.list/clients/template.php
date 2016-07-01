<div class="clients">
    <?foreach ($arResult['ITEMS'] as $key=>$item):?>
    <div class="client">
      <? if (strlen($item['PREVIEW_PICTURE']['SRC']) > 0):?>
      <div class="client__logo"><img src="<?=$item['PREVIEW_PICTURE']['SRC']?>"></div>
      <?endif;?>
      <div class="client__name"><?=$item['~NAME']?></div>
      <div class="client__description"><?=$item['~PREVIEW_TEXT']?></div>
      <div class="client__footer">
          <div class="row">
              <div class="col-xs-4">
                  <?if ($item["PROPERTIES"]['GALLERY']['VALUE'] && count($item["PROPERTIES"]['GALLERY']['VALUE']) > 0):?>
                    <a href="#" data-images='<?=json_encode($item["PROPERTIES"]['GALLERY']['VALUE'])?>' class="client__link client__link--zoom"><?=svg('zoom')?><span>view scan</span></a>
                  <?endif;?>
              </div>
              <div class="col-xs-4 center">
                  <? if (strlen($item['~DETAIL_TEXT']) > 0):?>
                    <a data-html='<?=$item['~DETAIL_TEXT']?>' href="#More" data-toggle='modal' class="client__link client__link--blue"><span>read more</span></a>
                  <?endif;?>
              </div>
              <div class="col-xs-4 right">
                  <? if (strlen($item['PROPERTIES']['VIDEO']['VALUE']) > 0):?>
                    <a href="#Video" data-toggle='modal' class="client__link client__link--play" data-video='<?=$item['PROPERTIES']['VIDEO']['VALUE']?>'><span>view video</span><?=svg('play')?></a>
                  <?endif;?>
              </div>
          </div>
      </div>
    </div>
    <?endforeach;?>
</div>
