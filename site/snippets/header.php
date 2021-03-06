<!DOCTYPE html>

<html lang="en">
  <head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="author" content="L Daniel Swakman, ldaniel.eu" />
    <meta http-equiv="Cache-control" content="max-age=2628000, public">

    <title>
      <?= $page->title()->html() ?> - <?= $site->title()->html() ?>
    </title>

    <link rel="shortcut icon" href="<?= url('assets/images/favicon.ico') ?>" />

    <?
    $css_assets = (c::get('env') === 'DEV') ? array(
      'assets/css/magnific-popup.css',
    ) : array(
      'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/0.9.8/magnific-popup.min.css',
    );
    array_push($css_assets, 'assets/css/style.css');

    $js_assets = (c::get('env') === 'DEV') ? array(
      'assets/js/jquery.js',
      'assets/js/jquery.scrollto.js',
      'assets/js/jquery.magnific-popup.min.js'
    ) : array(
      'https://code.jquery.com/jquery-1.8.3.min.js',
      'https://cdnjs.cloudflare.com/ajax/libs/jquery-scrollto/1.3.0/jquery-scrollto.min.js',
      'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/0.9.8/jquery.magnific-popup.min.js'
    );
    array_push($js_assets, 'assets/js/scripts.js');
    ?>

    <?= css($css_assets) ?>
    <?= js($js_assets) ?>

    <? snippet('ga-analytics'); ?>

  </head>

  <body>

    <!-- Fysio Flex, centrum voor fysiotherapie en bewegen" title="Fysio Flex, centrum voor fysiotherapie en bewegen -->

    <div id="wrapper">

      <a href="<?= $site->url() ?>"><img id="logo" src="<?= url('assets/images/fysioflex_logo.png') ?>" alt="<?= $site->description()->html() ?>" /></a>

      <div class="menu-static"></div>

      <? snippet('nav') ?>
