      <footer>

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
