<?php
/** @var \Kirby\Cms\Block $block */
?>
<article class="card">
  <?php if ($image = $block->image()->toFile()): ?>
    <figure class="card-image">
      <?= $image->crop(600, 400) ?>
    </figure>
  <?php endif ?>

  <div class="card-content">
    <?php if ($block->title()->isNotEmpty()): ?>
      <h3 class="card-title"><?= $block->title()->html() ?></h3>
    <?php endif ?>

    <?php if ($block->text()->isNotEmpty()): ?>
      <div class="card-text">
        <?= $block->text()->kt() ?>
      </div>
    <?php endif ?>

    <?php if ($block->link()->isNotEmpty()): ?>
      <a href="<?= $block->link()->toUrl() ?>" class="card-action">Saber más</a>
    <?php endif ?>
  </div>
</article>
