<nav>

  <? // Main menu ?>
  <ul id="menu">

    <? $categories = $site->pages()->visible()->filterBy('template', '!=', 'default')->pluck('template', ',', true) ?>
    <? foreach($categories as $category) : ?>
      <li id="<?= $category ?>"><a href="#" class="nest <? e($page->template() == $category, ' active') ?>"><?= $category ?></a></li>
    <? endforeach ?>

      <? $unnested_pages = $site->pages()->visible()->filterBy('template', 'default') ?>
      <? foreach($unnested_pages as $p) : ?>
        <li id="<?= $category ?>"><a href="<?= $p->url() ?>"<? e($p->isOpen(), ' class="active"'); ?>><?= $p->title() ?></a></li>
      <? endforeach ?>
  </ul>

  <? // Submenus ?>
  <? foreach($categories as $category) : ?>
    <ul class="submenu" id="<?= $category ?>">
      <? foreach($site->pages()->visible()->filterBy('template', $category) as $p) : ?>
        <li><a href="<?= $p->url() ?>"<? e($p->isOpen(), ' class="active"'); ?>><?= $p->title()->html() ?></a></li>
      <? endforeach ?>
    </ul>
  <? endforeach ?>

  <a href="#top" class="small_logo"></a>

  <div class="pointer"></div>

</nav>
