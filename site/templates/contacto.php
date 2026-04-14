<?php snippet('header') ?>

<main class="main">
  <div class="container container--contact">
    
    <header class="page-header">
      <h1><?= $page->title() ?></h1>
    </header>

    <div class="contact-grid" style="display: grid; grid-template-columns: 2fr 1fr; gap: 3rem; margin-top: 2rem;">
      
      <div class="contact-main">
        <?php if ($page->layout()->isNotEmpty()): ?>
          <?php foreach ($page->layout()->toLayouts() as $layout): ?>
            <section class="layout-row" id="<?= $layout->id() ?>">
              <?php foreach ($layout->columns() as $column): ?>
                <div class="layout-column" style="grid-column: span <?= $column->span() ?>">
                  <?= $column->blocks() ?>
                </div>
              <?php endforeach ?>
            </section>
          <?php endforeach ?>
        <?php else: ?>
          <p>Utiliza el panel para añadir contenido a esta sección.</p>
        <?php endif ?>
      </div>

      <aside class="contact-sidebar">
        <div class="contact-info-card" style="border: 1px solid #eee; padding: 2rem; border-radius: 4px;">
          <h3><?= t('Datos de contacto', 'Datos de contacto') ?></h3>
          
          <ul class="contact-details" style="list-style: none; padding: 0; margin-top: 1rem;">
            <?php if ($page->direccion()->isNotEmpty()): ?>
              <li style="margin-bottom: 1.5rem;">
                <strong><?= t('Dirección', 'Dirección') ?></strong><br>
                <?= $page->direccion()->nl2br() ?>
              </li>
            <?php endif ?>

            <?php if ($page->telefono()->isNotEmpty()): ?>
              <li style="margin-bottom: 1.5rem;">
                <strong><?= t('Teléfono', 'Teléfono') ?></strong><br>
                <a href="tel:<?= $page->telefono() ?>"><?= $page->telefono()->html() ?></a>
              </li>
            <?php endif ?>

            <?php if ($page->email()->isNotEmpty()): ?>
              <li style="margin-bottom: 1.5rem;">
                <strong><?= t('Email', 'Email') ?></strong><br>
                <a href="mailto:<?= $page->email() ?>"><?= $page->email()->html() ?></a>
              </li>
            <?php endif ?>

            <?php if ($page->horario()->isNotEmpty()): ?>
              <li style="margin-bottom: 1.5rem;">
                <strong><?= t('Horario', 'Horario') ?></strong><br>
                <?= $page->horario()->nl2br() ?>
              </li>
            <?php endif ?>
          </ul>

          <?php if ($page->google_maps()->isNotEmpty()): ?>
            <div class="contact-cta" style="margin-top: 2rem;">
              <a href="<?= $page->google_maps() ?>" target="_blank" class="btn btn--primary" style="display: block; text-align: center; background: #333; color: #fff; padding: 0.8rem; text-decoration: none; border-radius: 4px;">
                <?= t('Cómo llegar', 'Cómo llegar') ?>
              </a>
            </div>
          <?php endif ?>
        </div>
      </aside>

    </div>
  </div>
</main>

<?php snippet('footer') ?>
