<?php snippet('header') ?>

<div class="page-error container">
  <header class="page-error__header">
    <h1 class="page-error__title"><?= $page->title() ?></h1>
  </header>
  
  <div class="page-error__content">
    <?php if ($page->text()->isNotEmpty()): ?>
      <div class="text">
        <?= $page->text()->kt() ?>
      </div>
    <?php endif ?>
  </div>
</div>

<?php snippet('footer') ?>
