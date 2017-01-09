<? snippet('header') ?>

<div id="content">

  <?
  $banner_url = '';
  if ($image = $page->banner_image()) {
    $banner_url = thumb($page->image($image), ['width' => 800])->url();
  }
  ?>
  <header style="background-image: url(<?= $banner_url ?>);"<? e($page->isHome(), ' class="banner-home"') ?>>

    <h1><?= $page->title()->html() ?></h1>

    <aside>
      <ul id="pageindex">
      </ul>
    </aside>

  </header>

  <article id="article">
    <p><?= $page->text()->kirbytext() ?></p>
  </article>

</div>

<? snippet('footer') ?>