<? snippet('header') ?>

  <div id="content" style="padding-top: 2em; text-align: center;">
  
    <?= $page->text()->kirbytext() ?>

    <ul id="menu">
      <li><a href="<?= $site->url() ?>">Begin bij het begin</a></li>
    </ul>

  </div>

<? snippet('footer') ?>