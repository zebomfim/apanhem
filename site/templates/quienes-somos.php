<?php snippet('header') ?>

<div class="institutional-page container">
  
  <header class="page-header">
    <h1 class="page-header__title"><?= $page->title() ?></h1>
    <?php if ($image = $page->cover()->toFile()): ?>
      <figure class="page-header__figure">
        <img src="<?= $image->url() ?>" alt="<?= $image->alt() ?>" class="page-header__image">
      </figure>
    <?php endif ?>
  </header>

  <div class="institutional-page__grid">
    <div class="institutional-page__main">
      
      <?php if ($page->mision()->isNotEmpty() || $page->vision()->isNotEmpty()): ?>
        <section class="mission-vision">
          <?php if ($page->mision()->isNotEmpty()): ?>
            <div class="mission-vision__block">
              <h2 class="mission-vision__title">Nuestra Misión</h2>
              <div class="mission-vision__text"><?= $page->mision()->kt() ?></div>
            </div>
          <?php endif ?>
          <?php if ($page->vision()->isNotEmpty()): ?>
            <div class="mission-vision__block">
              <h2 class="mission-vision__title">Nuestra Visión</h2>
              <div class="mission-vision__text"><?= $page->vision()->kt() ?></div>
            </div>
          <?php endif ?>
        </section>
      <?php endif ?>

      <div class="institutional-page__content">
        <?php foreach ($page->layout()->toLayouts() as $layout): ?>
          <section class="layout-row" id="<?= $layout->id() ?>">
            <?php foreach ($layout->columns() as $column): ?>
              <div class="layout-column layout-column--span-<?= $column->span() ?>">
                <?= $column->blocks() ?>
              </div>
            <?php endforeach ?>
          </section>
        <?php endforeach ?>
      </div>
    </div>

    <aside class="institutional-page__sidebar">
      <?php if ($page->links()->isNotEmpty()): ?>
        <nav class="sidebar-links">
          <h3 class="sidebar-links__title">Más información</h3>
          <ul class="sidebar-links__list">
            <?php foreach ($page->links()->toStructure() as $link): ?>
              <li class="sidebar-links__item">
                <a href="<?= $link->link_url() ?>" class="sidebar-links__link">
                  <?= $link->link_text() ?>
                </a>
              </li>
            <?php endforeach ?>
          </ul>
        </nav>
      <?php endif ?>
    </aside>
  </div>
</div>

<?php snippet('footer') ?>
