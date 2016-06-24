<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Contacts');
?>
<h2>Asket-Auto, LLC</h2>
<div class="row">
  <div class="col-xs-5">
    <big><span class="blue">Tel.: </span>+7495 781-50-78<br/><span class="blue">E-mail: </span>info@aket-auto.com</big>
  </div>
  <div class="col-xs-7">
    <big><span class="blue">Address: </span>1, Nagatinskaya street, Moscow, 117105, Russia<br/><span class="blue">GPS: </span>55.683065, 37.624655</big>
  </div>
</div>
<div id="map" data-map data-coords="<?=COption::GetOptionString("grain.customsettings", 'coords')?>" data-zoom="16" class="map" data-lang='en_US'></div><?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
