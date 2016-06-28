<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Order');
?>
<h3 class="xxl-margin-bottom no-margin-top">Please tell us about technics you need and get a prososal from us.</h3>
<div class="form">
    <div class='form__success hidden'>
        <h3>Thank you for your request. We will get back to you soon!</h3>
    </div>
    <div class='form__action'>
      <form data-parsley-validate action="">
        <input type="hidden" name="to" value="order">
        <input type="hidden" name="referer" value="<?=$_SERVER['HTTP_REFERER']?>">
        <div class="row">
          <div class="col-xs-6">
            <input type="text" name="name" placeholder="Your name *" required class="form__input">
          </div>
          <div class="col-xs-6">
            <input type="text" name="surname" placeholder="Your surname *" required class="form__input">
          </div>
          <div class="col-xs-6">
            <input type="text" name="company" placeholder="Company" class="form__input">
          </div>
          <div class="col-xs-6">
            <input type="text" name="location" placeholder="Company location (country, city)" class="form__input">
          </div>
          <div class="col-xs-6">
            <input type="text" name="email" placeholder="E-mail *" required class="form__input">
          </div>
          <div class="col-xs-6">
            <input type="text" name="phone" placeholder="Phone" class="form__input">
          </div>
          <div class="col-xs-6">
            <?
                $types = preg_split("/\n/", COption::GetOptionString("grain.customsettings", 'types'));
            ?>
            <div class="dropdown">
              <select name="type" class="dropdown__select">
                <option value="" selected>Choose type of vehicle you need</option>
                <?foreach ($types as $key => $value):?>
                <option value="<?=$value?>"><?=$value?></option>
                <?endforeach?>
              </select><a class="dropdown__trigger">Choose type of vehicle you need</a>
              <div class="dropdown__frame">
                  <?foreach ($types as $key => $value):?>
                  <a href="#" class="dropdown__item"><?=$value?></a>
                  <?endforeach?>
              </div>
            </div>
          </div>
          <div class="col-xs-6">
            <div class="dropdown">
              <select name="condition" class="dropdown__select">
                <option value="" selected>Choose condition of vehicle you need</option>
                <option value="New">New</option>
                <option value="Used">Used</option>
              </select><a class="dropdown__trigger">Choose condition of vehicle you need</a>
              <div class="dropdown__frame"><a href="#" class="dropdown__item">New</a><a href="#" class="dropdown__item">Used</a></div>
            </div>
          </div>
          <div class="col-xs-12">
            <textarea name="message" placeholder="Message (any additional information)" class="form__textarea"></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-3">
            <div class="form__label">Enter this code</div>
            <div class="form__captcha captcha"></div>
          </div>
          <div class="col-xs-1"><a href="#" class="form__refresh"><svg width="66" height="66" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg"><path d="M30.802 2.863c0 1.105.896 2 2 2 7.48 0 14.51 2.912 19.8 8.2 5.288 5.29 8.2 12.322 8.2 19.8 0 7.38-2.842 14.324-8 19.587v-5.587c0-1.104-.895-2-2-2-1.104 0-2 .896-2 2v12h12c1.105 0 2-.895 2-2 0-1.104-.895-2-2-2h-4.776c5.66-5.968 8.776-13.742 8.776-22 0-8.547-3.328-16.583-9.373-22.627C49.383 4.19 41.35.863 32.8.863c-1.104 0-2 .896-2 2zM8.176 53.49c6.044 6.045 14.08 9.373 22.626 9.373 1.105 0 2-.895 2-2 0-1.104-.895-2-2-2-7.48 0-14.51-2.912-19.797-8.2-5.29-5.29-8.203-12.32-8.203-19.8 0-7.38 2.842-14.323 8-19.587v5.587c0 1.105.896 2 2 2 1.105 0 2-.895 2-2v-12h-12c-1.104 0-2 .896-2 2 0 1.105.896 2 2 2H8.58c-5.664 6.97-8.78 14.742-8.78 23 0 8.547 3.33 16.583 9.374 22.627z" id="refresh" fill="#0B4ACE" fill-rule="evenodd"/></svg></a></div>
          <div class="col-xs-3">
            <div class="form__label">into this field</div>
            <input type="hidden" name="captcha_code">
            <input type="text" name="captcha_word" required class="form__input">
          </div>
          <div class="col-xs-2"><small class="form__small">* Required field</small></div>
          <div class="col-xs-3 right">
            <button type="submit" class="form__button">Send</button>
          </div>
        </div>
      </form>
    </div>
</div>
<script type="text/javascript">
    getCaptcha()
</script>
<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>
