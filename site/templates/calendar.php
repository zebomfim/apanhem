<?php snippet('header') ?>

<div class="container">
  <h1><?= $page->title() ?></h1>
  
  <div class="content">
    <?= $page->text()->kt() ?>
  </div>
</div>

<?php snippet('footer') ?>
