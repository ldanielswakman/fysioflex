      <footer>

        <div class="footer_menu">

          <? $categories = $site->pages()->visible()->filterBy('template', '!=', 'default')->pluck('template', ',', true) ?>
          <? $extrapages = $site->pages()->visible()->filterBy('template', 'not in', $categories); ?>

          <ul id="footermenu">
            <? foreach($categories as $category) : ?>
              <li id="<?= $category ?>"><?= $category ?></li>
            <? endforeach ?>
            <? if($extrapages->count() > 0): ?>
              <li id="overig">overig</li>
            <? endif ?>
          </ul>

          <? foreach($categories as $category) : ?>
            <ul class="footersubmenu">
              <? foreach($site->pages()->visible()->filterBy('template', $category) as $p) : ?>
                <li><a href="<?= $p->url() ?>"<? e($p->isOpen(), ' class="active"'); ?>><?= $p->title()->html() ?></a></li>
              <? endforeach ?>
            </ul>
          <? endforeach ?>
          <? if($extrapages->count() > 0): ?>
            <ul class="footersubmenu overigmenu">
              <? foreach($extrapages as $p) : ?>
                <li><a href="<?= $p->url() ?>"<? e($p->isOpen(), ' class="active"'); ?>><?= $p->title()->html() ?></a></li>
              <? endforeach ?>
            </ul>
          <? endif ?>

        </div>

        <div class="info">
          <span>&copy; <?= $site->title()->html() ?> <?= date('Y') ?></span>
          <span><?= $site->address()->html() ?></span>
          <span><?= $site->telephone()->html() ?></span>
          <span>
            <a href="mailto:<?= $site->email() ?>" class="email-link" target="_blank"><?= $site->email() ?></a>
          </span>
          <span><a href="http://www.ldaniel.eu" target="_blank">by ldaniel.eu</a></span>
        </div>

      </footer>

    </div>

  </body>

</html>
