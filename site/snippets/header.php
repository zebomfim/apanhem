<!DOCTYPE html>
<html lang="<?= kirby()->language() ? kirby()->language()->code() : 'es' ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title><?= $page->title() ?> | <?= $site->title() ?></title>
  
  <?php snippet('seo/head') ?>

  <?= css('assets/css/global.css') ?>
</head>
<body class="<?= $page->template() ?>-page">

  <header class="header">
    <div class="header__container container">
      <a class="header__logo" href="<?= $site->url() ?>">
        <?= $site->title() ?>
      </a>
      
      <nav class="menu">
        <ul class="menu__list">
          <?php foreach ($site->children()->listed() as $item): ?>
          <li class="menu__item">
            <a class="menu__link <?php e($item->isOpen(), 'menu__link--active') ?>" href="<?= $item->url() ?>">
              <?= $item->title() ?>
            </a>
          </li>
          <?php endforeach ?>
        </ul>
      </nav>
    </div>
  </header>

  <main class="main">
