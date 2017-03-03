<?php

$ignore = array('sitemap');

// send the right header
header('Content-type: text/xml; charset="utf-8"');

// echo the doctype
echo '<?xml version="1.0" encoding="utf-8"?>';

?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

  <?php foreach($pages->index() as $p): ?>
  <?php if(in_array($p->uri(), $ignore) || in_array($p->parent(), $ignore)) continue ?>
  <url>
    <loc><?php echo html($p->url()) ?></loc>
    <lastmod><?= $p->modified('Y-m-d') ?></lastmod>
    <priority><?php echo ($p->isHomePage()) ? 1 : number_format(0.5/$p->depth(), 1) ?></priority>
  </url>
  <?php endforeach ?>

  <?php
  $redirects = array(
    '01' => 'medewerkers',
    '02' => 'het-gebouw',
    '03' => 'fotos',
    '04' => 'bekkenfysiotherapie',
    '05' => 'sportfysiotherapie',
    '06' => 'revalidatie',
    '07' => 'mckenzietherapie',
    '08' => 'handtherapie',
    '09' => 'zwangerfit',
    '10' => 'oefengroep-medische-fitness',
    '11' => 'bevallen-doe-je-zo',
    '12' => 'diabetes-programma',
    // '13' => '',
    '14' => 'bekkenpijn',
    '15' => 'diversen',
    '16' => 'ckr',
    '17' => 'dtf',
    '18' => 'tarieven',
    '19' => 'vergoedingen',
    '20' => 'links',
    '21' => 'contact',
    // '22' => 'colofon',
    '23' => 'klachtenregeling',
    '24' => 'wgbo',
  );
  ?>

  <?php foreach($redirects as $k => $name): ?>
  <url>
    <?= $p = $site->find($name) ?>
    <loc><?= $site->url() ?>/?page=<?= $k ?></loc>
    <lastmod><?= $p->modified('Y-m-d') ?></lastmod>
    <priority><?php echo ($p->isHomePage()) ? 1 : number_format(0.5/$p->depth(), 1) ?></priority>
  </url>
  <?php endforeach ?>

</urlset>
