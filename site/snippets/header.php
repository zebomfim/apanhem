<!DOCTYPE html>
<html lang="<?= kirby()->language() ? kirby()->language()->code() : 'es' ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title><?= $page->title() ?> | <?= $site->title() ?></title>
  
  <?php snippet('seo/head'); // Plugin de SEO ?>

  <?php // El CSS será atómico y puro, sin frameworks pesados ?>
  <?= css('assets/css/index.css') ?>
</head>
<body>
  <header class="header">
    <div class="container">
      <a class="logo" href="<?= $site->url() ?>"><?= $site->title() ?></a>
      
      <nav id="menu" class="menu">
        <?php foreach ($site->children()->listed() as $item): ?>
        <a <?php e($item->isOpen(), 'aria-current="page"') ?> href="<?= $item->url() ?>"><?= $item->title() ?></a>
        <?php endforeach ?>
      </nav>
    </div>
  </header>

  <main class="main">
