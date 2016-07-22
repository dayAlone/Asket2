<div class="slider">
    <?foreach ($arResult['ITEMS'] as $key=>$item):?>
    <div class="slider__item">
        <div class="slider__content">
            <div class="slider__title"><span><?=$item['~NAME']?></span></div>
            <div class="slider__text"><?=$item['~PREVIEW_TEXT']?></div>
            <?if (strlen($item['PROPERTIES']['BUTTON_LINK']['VALUE']) > 0 && strlen($item['PROPERTIES']['BUTTON_TEXT']['VALUE']) > 0):?>
                <a href="<?=$item['PROPERTIES']['BUTTON_LINK']['VALUE']?>" class="slider__button"><?=$item['PROPERTIES']['BUTTON_TEXT']['VALUE']?></a>
            <?endif;?>
        </div>
        <div style="background-image: url(<?=$item['PREVIEW_PICTURE']['SRC']?>)" class="slider__image"></div>
    </div>
    <?endforeach;?>
</div>
