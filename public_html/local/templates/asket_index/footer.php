
<div class="page__footer footer">
    <div class="footer__address"><?=str_replace('<br>', '', COption::GetOptionString("grain.customsettings", 'address'))?></div>
    <a href="#" target="_blank" class="footer__radia radia">
        <img src="/layout/images/svg/radia.svg" class="radia__logo">
        <div class="radia__text">Website development<br/>RADIA Interactive</div>
    </a>
</div>

<?require($_SERVER['DOCUMENT_ROOT'].'/include/footer.php');?>
