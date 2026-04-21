  </main>

  <footer class="footer" role="contentinfo">
    <div class="footer__container container">

      <div class="footer__main">
        <!-- 1. Identidad -->
        <div class="footer__brand">
          <a href="<?= $site->url() ?>" class="footer__logo-link" aria-label="Volver al inicio">
            <?php snippet('logo') ?>
          </a>
          <!-- Opcional: Descripción breve -->
          <?php if ($site->brand_name()->isNotEmpty()): ?>
            <p class="footer__description">
              <?= $site->brand_name() ?>
            </p>
          <?php endif ?>
        </div>

        <!-- 2. Navegación (Sitemap) -->
        <nav class="footer__nav" aria-label="Navegación del pie de página">
          
          <!-- Enlaces principales -->
          <div class="footer__nav-group">
            <h2 class="footer__nav-title">Navegación</h2>
            <ul class="footer__nav-list">
              <?php foreach ($site->children()->listed()->filterBy('num', '<', 90) as $item): ?>
              <li class="footer__nav-item">
                <a href="<?= $item->url() ?>" class="footer__nav-link"><?= $item->title() ?></a>
              </li>
              <?php endforeach ?>
            </ul>
          </div>

          <!-- Enlaces Legales (Páginas > 90) -->
          <div class="footer__nav-group">
            <h2 class="footer__nav-title">Legal</h2>
            <ul class="footer__nav-list">
              <?php foreach ($site->children()->listed()->filterBy('num', '>=', 90) as $item): ?>
              <li class="footer__nav-item">
                <a href="<?= $item->url() ?>" class="footer__nav-link"><?= $item->title() ?></a>
              </li>
              <?php endforeach ?>
            </ul>
          </div>

        </nav>
      </div>

      <!-- 3. Inferior: Redes y Copyright -->
      <div class="footer__bottom">
        
        <div class="footer__social">
          <ul class="footer__social-list">
            <?php foreach ($site->social()->toStructure() as $social): ?>
            <li class="footer__social-item">
              <a href="<?= $social->url() ?>" class="footer__social-link footer__social-link--<?= $social->platform() ?>" target="_blank" rel="noopener noreferrer" aria-label="<?= $social->platform() ?>">
                <?= $social->platform() ?>
              </a>
            </li>
            <?php endforeach ?>
          </ul>
        </div>

        <div class="footer__copy">
          <p>&copy; <?= date('Y') ?> <?= $site->footer_text()->or($site->title() . '. Todos los derechos reservados.') ?></p>
        </div>

      </div>

    </div>
  </footer>

  <?= js('media/plugins/websolidaria/core/js/menu.js') ?>
</body>
</html>
