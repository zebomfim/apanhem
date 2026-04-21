<?php snippet('header') ?>

<div class="page-legal container">
  <header class="page-legal__header">
    <h1 class="page-legal__title"><?= $page->hero_title()->or($page->title()) ?></h1>
    <?php if ($page->hero_subtitle()->isNotEmpty()): ?>
      <p class="page-legal__subtitle"><?= $page->hero_subtitle() ?></p>
    <?php endif ?>
  </header>
  
  <div class="page-legal__content">
    <?php if ($page->text()->isNotEmpty()): ?>
      <div class="text">
        <?= $page->text()->kt() ?>
      </div>
    <?php endif ?>
  </div>
</div>

<?php snippet('footer') ?>
