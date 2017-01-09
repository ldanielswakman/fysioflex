<nav>

  <ul id="menu">

    <? $categories = $site->pages()->visible()->filterBy('template', '!=', 'default')->pluck('template', ',', true) ?>
    <? foreach($categories as $category) : ?>
      <li id="<?= $category ?>"><a href="#" class="nest"><?= $category ?></a></li>
    <? endforeach ?>

      <? $unnested_pages = $site->pages()->visible()->filterBy('template', 'default') ?>
      <? foreach($unnested_pages as $p) : ?>
        <li id="<?= $category ?>"><a href="<?= $p->url() ?>" class=""><?= $p->title() ?></a></li>
      <? endforeach ?>
  </ul>

  <a href="#top" class="small_logo"></a>

  <div class="pointer"></div>

</nav>
