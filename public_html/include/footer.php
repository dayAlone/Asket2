</div>
<div class="sidebar page_capebar">
    <div class="sidebar__header"><a href="#Feedback" data-toggle="modal" class="sidebar__button">Feedback</a></div>
    <div class="sidebar__content">
        <?php
        $APPLICATION->IncludeComponent("bitrix:menu", "menu",
        array(
            "ALLOW_MULTI_SELECT" => "Y",
            "MENU_CACHE_TYPE"    => "A",
            "ROOT_MENU_TYPE"     => "top",
            "MAX_LEVEL"          => "1",
            "CLASS"              => "sidebar__nav"
        ),
        false);
        ?>
    </div>
    <div class="sidebar__footer">
        <a href="mailto:<?=COption::GetOptionString("grain.customsettings", 'iemail')?>" class="sidebar__link"><?=COption::GetOptionString("grain.customsettings", 'iemail')?></a>
        <a href="tel:<?=preg_replace("/[^0-9+]/", "", COption::GetOptionString("grain.customsettings", 'phone'))?>" class="sidebar__link"><?=COption::GetOptionString("grain.customsettings", 'phone')?></a>
        <div class="lang">
            <a href="#" class="lang__item lang__item--active">Eng</a>
            <a href="http://www.asket-auto.ru" class="lang__item">Rus</a>
        </div>
        <div class="sidebar__copyright">© <?=date('Y')?> Asket-Auto LLC</div>
        <div class="sidebar__address"><?=COption::GetOptionString("grain.customsettings", 'address')?></div>
    </div>
</div>
<div id="More" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
        <a href="#" data-dismiss="modal" class="modal__close"><img src="/layout/images/svg/close.svg" alt=""></a>
        <h2 class="modal__title xs-margin-bottom"></h2>
        <div class="text">

        </div>
    </div>
  </div>
</div>
<div id="Video" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
        <a href="#" data-dismiss="modal" class="modal__close"><img src="/layout/images/svg/close.svg" alt=""></a>
        <h2 class="modal__title xs-margin-bottom"></h2>
        <div class="text">

        </div>
    </div>
  </div>
</div>
<div id="Feedback" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content"><a href="#" data-dismiss="modal" class="modal__close"><img src="/layout/images/svg/close.svg" alt=""></a>
      <h2 class="modal__title">Feedback</h2>
      <div class='form__success hidden'>
          <h3>Thank you for your request. We will get back to you soon!</h3>
      </div>
      <div class='form__action'>
          <form data-parsley-validate class="form">
            <div class="row">
              <div class="col-xs-6">
                <input type="text" placeholder="Your name *" name="name" required class="form__input">
              </div>
              <div class="col-xs-6">
                <input type="text" placeholder="Company" name="company" class="form__input">
              </div>
              <div class="col-xs-6">
                <input type="email" placeholder="E-mail *" name="email" required class="form__input">
              </div>
              <div class="col-xs-6">
                <input type="text" placeholder="Phone" name="phone" class="form__input">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <textarea placeholder="Message *" name="message" class="form__textarea"></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-3">
                <div class="form__label">Enter this code</div>
                <div class="form__captcha captcha"></div>
              </div>
              <div class="col-xs-1 center"><a href="#" class="form__refresh"><svg width="66" height="66" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg"><path d="M30.802 2.863c0 1.105.896 2 2 2 7.48 0 14.51 2.912 19.8 8.2 5.288 5.29 8.2 12.322 8.2 19.8 0 7.38-2.842 14.324-8 19.587v-5.587c0-1.104-.895-2-2-2-1.104 0-2 .896-2 2v12h12c1.105 0 2-.895 2-2 0-1.104-.895-2-2-2h-4.776c5.66-5.968 8.776-13.742 8.776-22 0-8.547-3.328-16.583-9.373-22.627C49.383 4.19 41.35.863 32.8.863c-1.104 0-2 .896-2 2zM8.176 53.49c6.044 6.045 14.08 9.373 22.626 9.373 1.105 0 2-.895 2-2 0-1.104-.895-2-2-2-7.48 0-14.51-2.912-19.797-8.2-5.29-5.29-8.203-12.32-8.203-19.8 0-7.38 2.842-14.323 8-19.587v5.587c0 1.105.896 2 2 2 1.105 0 2-.895 2-2v-12h-12c-1.104 0-2 .896-2 2 0 1.105.896 2 2 2H8.58c-5.664 6.97-8.78 14.742-8.78 23 0 8.547 3.33 16.583 9.374 22.627z" id="refresh" fill="#0B4ACE" fill-rule="evenodd"/></svg></a></div>
              <div class="col-xs-3">
                <div class="form__label">into this field</div>
                <input type="hidden" name="captcha_code">
                <input type="text" name="captcha_word" required class="form__input">
              </div>
              <div class="col-xs-5 right">
                <button class="form__button">Send</button>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">* Required field</div>
            </div>
          </form>
        </div>
    </div>
  </div>
</div>
<div tabindex="-1" role="dialog" aria-hidden="true" class="pswp">
  <div class="pswp__bg"></div>
  <div class="pswp__scroll-wrap">
    <div class="pswp__container">
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
    </div>
    <div class="pswp__ui pswp__ui--hidden">
      <div class="pswp__top-bar">
        <div class="pswp__counter"></div>
        <button title="Close (Esc)" class="pswp__button pswp__button--close"></button>
        <button title="Share" class="pswp__button pswp__button--share"></button>
        <button title="Toggle fullscreen" class="pswp__button pswp__button--fs"></button>
        <button title="Zoom in/out" class="pswp__button pswp__button--zoom"></button>
        <div class="pswp__preloader">
          <div class="pswp__preloader__icn">
            <div class="pswp__preloader__cut">
              <div class="pswp__preloader__donut"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
        <div class="pswp__share-tooltip"></div>
      </div>
      <button title="Previous (arrow left)" class="pswp__button pswp__button--arrow--left"></button>
      <button title="Next (arrow right)" class="pswp__button pswp__button--arrow--right"></button>
      <div class="pswp__caption">
        <div class="pswp__caption__center"></div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
