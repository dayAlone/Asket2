<!DOCTYPE html>
<html lang='<?=LANGUAGE_ID?>'>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=1100">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <?
    $APPLICATION->SetAdditionalCSS("/layout/css/frontend.css", true);
    $APPLICATION->AddHeadScript('/layout/js/frontend.js');
    global $CITY;
    ?>
    <title><?php
    $rsSites = CSite::GetByID(SITE_ID);
    $arSite  = $rsSites->Fetch();
    define(SITE_NAME, $arSite['NAME']);
    if($APPLICATION->GetCurDir() != '/' && $APPLICATION->GetCurDir() != "/en/") {
        $APPLICATION->ShowTitle();

        echo ' | ' . $arSite['NAME'];
    }
    else echo $arSite['NAME'];
    ?></title>
    <?
    $APPLICATION->ShowHead();
    $APPLICATION->ShowViewContent('header');
    ?>
</head>
<body class="page <?=$APPLICATION->AddBufferContent("body_class");?> <?=SITE_ID?> " data-site-name="<?=$arSite['NAME']?>">
    <div id="panel"><?$APPLICATION->ShowPanel();?></div>
    <a href="/" class="page__logo"><img src="/layout/images/svg/logo.svg" width="125"></a>
    <div style="background-image: url(<?=$_GLOBALS['BG_IMAGE'] ? $_GLOBALS['BG_IMAGE'] : '/layout/images/bg.jpg'?>)" class="page__image"></div>
    <div class="page__content">
