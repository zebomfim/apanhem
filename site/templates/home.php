<?php snippet('header') ?>

<div class="layouts">
  <?php foreach ($page->layout()->toLayouts() as $layout): ?>
  <section class="layout" id="<?= $layout->id() ?>" style="--columns: <?= $layout->columns()->count() ?>">
    
    <?php foreach ($layout->columns() as $column): ?>
    <div class="layout-column" style="--span: <?= $column->span() ?>">
      
      <?php foreach ($column->blocks() as $block): ?>
      <div class="block block-type-<?= $block->type() ?>">
        <?php
        // Try to load custom block snippet from `site/snippets/blocks/{type}.php`
        // If not found, Kirby handles native blocks implicitly
        echo $block; 
        ?>
      </div>
      <?php endforeach ?>
      
    </div>
    <?php endforeach ?>
    
  </section>
  <?php endforeach ?>
</div>

<?php snippet('footer') ?>
