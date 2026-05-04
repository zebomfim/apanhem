<!DOCTYPE html>
<html lang="<?= kirby()->language() ? kirby()->language()->code() : 'es' ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title><?= $page->title() ?> | <?= $site->title() ?></title>
  
  <?php snippet('seo/head') ?>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

  <?= css('assets/css/global.css') ?>
</head>
<body class="<?= $page->template() ?>-page">

  <header class="header">
    <div class="header__container container">
      
      <!-- Logo -->
      <a href="<?= $site->url() ?>" class="header__brand" aria-label="Volver al inicio">
        <?php snippet('logo') ?>
      </a>

      <!-- Botón Menú Móvil (Hamburger) -->
      <button type="button" class="header__toggle" aria-expanded="false" aria-controls="main-menu" aria-label="Abrir menú principal">
        <span class="header__toggle-icon"></span>
      </button>

      <!-- Navegación Principal -->
      <nav id="main-menu" class="header__nav menu">
        <ul class="menu__list">
          <?php 
          $menuItems = $site->children()->listed()->filterBy('num', '<', 90);
          foreach ($menuItems as $item): 
          ?>
          <li class="menu__item">
            <a class="menu__link <?php e($item->isOpen(), 'menu__link--active') ?>" href="<?= $item->url() ?>">
              <?= $item->title() ?>
            </a>
          </li>
          <?php endforeach ?>
        </ul>
        
        <!-- CTA del menú -->
        <div class="menu__actions">
          <a href="<?= url('contact') ?>" class="menu__cta btn btn--primary">Contacto</a>
        </div>
      </nav>

    </div>
  </header>

  <main class="main">
