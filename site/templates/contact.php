<?php snippet('header') ?>

<!-- Componente Hero Dinámico -->
<?php snippet('hero') ?>

<div class="contact-page container">


  <div class="contact-page__grid">
    
    <div class="contact-page__main">
      <?php if ($page->layout()->isNotEmpty()): ?>
        <?php foreach ($page->layout()->toLayouts() as $layout): ?>
          <section class="layout-row" id="<?= $layout->id() ?>">
            <?php foreach ($layout->columns() as $column): ?>
              <div class="layout-column layout-column--span-<?= $column->span() ?>">
                <?= $column->blocks() ?>
              </div>
            <?php endforeach ?>
          </section>
        <?php endforeach ?>
      <?php endif ?>
    </div>

    <aside class="contact-page__sidebar">
      <div class="contact-info">
        <h3 class="contact-info__title"><?= t('Datos de contacto', 'Datos de contacto') ?></h3>
        
        <ul class="contact-info__list">
          <?php if ($page->direccion()->isNotEmpty()): ?>
            <li class="contact-info__item">
              <strong class="contact-info__label"><?= t('Dirección', 'Dirección') ?></strong>
              <div class="contact-info__value"><?= $page->direccion()->nl2br() ?></div>
            </li>
          <?php endif ?>

          <?php if ($page->telefono()->isNotEmpty()): ?>
            <li class="contact-info__item">
              <strong class="contact-info__label"><?= t('Teléfono', 'Teléfono') ?></strong>
              <div class="contact-info__value">
                <a href="tel:<?= $page->telefono() ?>" class="contact-info__link"><?= $page->telefono()->html() ?></a>
              </div>
            </li>
          <?php endif ?>

          <?php if ($page->email()->isNotEmpty()): ?>
            <li class="contact-info__item">
              <strong class="contact-info__label"><?= t('Email', 'Email') ?></strong>
              <div class="contact-info__value">
                <a href="mailto:<?= $page->email() ?>" class="contact-info__link"><?= $page->email()->html() ?></a>
              </div>
            </li>
          <?php endif ?>

          <?php if ($page->horario()->isNotEmpty()): ?>
            <li class="contact-info__item">
              <strong class="contact-info__label"><?= t('Horario', 'Horario') ?></strong>
              <div class="contact-info__value"><?= $page->horario()->nl2br() ?></div>
            </li>
          <?php endif ?>
        </ul>

        <?php if ($page->google_maps()->isNotEmpty()): ?>
          <div class="contact-info__cta">
            <a href="<?= $page->google_maps() ?>" target="_blank" class="button button--primary">
              <?= t('Cómo llegar', 'Cómo llegar') ?>
            </a>
          </div>
        <?php endif ?>
      </div>
    </aside>

  </div>
</div>

<?php snippet('footer') ?>
