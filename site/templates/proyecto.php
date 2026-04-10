<?php snippet('header') ?>

<div class="container project-container">
  <div class="project-header">
    <h1><?= $page->title() ?></h1>
    
    <?php if ($page->resume()->isNotEmpty()): ?>
      <p class="lead"><?= $page->resume() ?></p>
    <?php endif ?>
  </div>

  <div class="layouts">
    <?php foreach ($page->layout()->toLayouts() as $layout): ?>
    <section class="layout" id="<?= $layout->id() ?>" style="--columns: <?= $layout->columns()->count() ?>">
      
      <?php foreach ($layout->columns() as $column): ?>
      <div class="layout-column" style="--span: <?= $column->span() ?>">
        
        <?php foreach ($column->blocks() as $block): ?>
        <div class="block block-type-<?= $block->type() ?>">
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
