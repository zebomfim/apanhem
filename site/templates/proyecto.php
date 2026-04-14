<?php snippet('header') ?>

<div class="project-page container">
  
  <header class="project-header">
    <h1 class="project-header__title"><?= $page->title() ?></h1>
    <?php if ($page->resume()->isNotEmpty()): ?>
      <p class="project-header__lead"><?= $page->resume() ?></p>
    <?php endif ?>
  </header>

  <div class="project-page__content">
    <?php foreach ($page->layout()->toLayouts() as $layout): ?>
      <section class="layout-row" id="<?= $layout->id() ?>">
        <?php foreach ($layout->columns() as $column): ?>
          <div class="layout-column layout-column--span-<?= $column->span() ?>">
            <?php foreach ($column->blocks() as $block): ?>
              <div class="block block--type-<?= $block->type() ?>">
                <?= $block ?>
              </div>
            <?php endforeach ?>
          </div>
        <?php endforeach ?>
      </section>
    <?php endforeach ?>
  </div>
</div>

<?php snippet('footer') ?>
