<!DOCTYPE html>

<html lang="en">
  <head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="author" content="L Daniel Swakman, ldaniel.eu" />
    <meta http-equiv="Cache-control" content="public">

    <title>
      <?= $page->title()->html() ?> - <?= $site->title()->html() ?>
    </title>

    <link rel="shortcut icon" href="<?= url('assets/images/favicon.ico') ?>" />

    <?
    $css_assets = (c::get('env') === 'DEV') ? array(
      'assets/css/style.css',
      'assets/css/magnific-popup.css'
    ) : array(
      'assets/css/style.css',
      'assets/css/magnific-popup.css'
    );

    $js_assets = (c::get('env') === 'DEV') ? array(
      'assets/js/jquery.js',
      'assets/js/jquery.scrollto.js',
      'assets/js/scripts.js',
    ) : array(
      'assets/js/jquery.js',
      'assets/js/jquery.scrollto.js',
      'assets/js/jquery.magnific-popup.min.js',
      'assets/js/scripts.js',
    );
    ?>

    <?= css($css_assets) ?>
    <?= js($js_assets) ?>

  </head>

  <body>

    <!-- Fysio Flex, centrum voor fysiotherapie en bewegen" title="Fysio Flex, centrum voor fysiotherapie en bewegen -->

    <div id="wrapper">

      <a href="<?= $site->url() ?>"><img id="logo" src="<?= url('assets/images/fysioflex_logo.png') ?>" alt="<?= $site->description()->html() ?>" /></a>

      <div class="menu-static"></div>

    </div>