<?php
/**
 * Componente Hero (Reusable)
 * @var Kirby\Cms\Page $page
 */

$title = $page->hero_title()->isNotEmpty() ? $page->hero_title() : $page->title();
$image = $page->hero_image()->toFile();
$bgUrl = $image ? $image->url() : '';
?>

<section class="hero" <?= $bgUrl ? 'style="background-image: url(\'' . $bgUrl . '\');"' : '' ?>>
  <div class="hero__container container">
    <h1 class="hero__title"><?= $title->nl2br() ?></h1>
  </div>
</section>
