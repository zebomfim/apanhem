  </main>

  <footer class="footer">
    <div class="footer__container container">
      
      <div class="footer__social">
        <ul class="footer__social-list">
          <?php foreach ($site->social()->toStructure() as $social): ?>
            <li class="footer__social-item">
              <a href="<?= $social->url() ?>" class="footer__social-link footer__social-link--<?= $social->platform() ?>" target="_blank" rel="noopener noreferrer">
                <?= $social->platform() ?>
              </a>
            </li>
          <?php endforeach ?>
        </ul>
      </div>

      <div class="footer__info">
        <p class="footer__copyright">
          &copy; <?= date('Y') ?> <?= $site->footer_text()->or($site->title() . '. Todos los derechos reservados.') ?>
        </p>
      </div>

    </div>
  </footer>

  <?= js('media/plugins/websolidaria/core/js/menu.js') ?>
</body>
</html>
