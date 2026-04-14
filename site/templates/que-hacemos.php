<?php snippet('header') ?>

<div class="projects-page container">
  
  <header class="page-header">
    <h1 class="page-header__title"><?= $page->headline()->or($page->title()) ?></h1>
    <?php if ($image = $page->cover()->toFile()): ?>
      <figure class="page-header__figure">
        <img src="<?= $image->url() ?>" alt="<?= $image->alt() ?>" class="page-header__image">
      </figure>
    <?php endif ?>
  </header>

  <div class="projects-page__intro">
    <?php foreach ($page->layout()->toLayouts() as $layout): ?>
      <section class="layout-row" id="<?= $layout->id() ?>">
        <?php foreach ($layout->columns() as $column): ?>
          <div class="layout-column layout-column--span-<?= $column->span() ?>">
            <?= $column->blocks() ?>
          </div>
        <?php endforeach ?>
      </section>
    <?php endforeach ?>
  </div>

  <div class="projects-grid">
    <?php foreach ($page->children()->listed()->template('proyecto') as $project): ?>
      <article class="project-card">
        <?php if ($image = $project->cover()->toFile()): ?>
          <a href="<?= $project->url() ?>" class="project-card__figure">
            <img src="<?= $image->crop(600, 337)->url() ?>" alt="<?= $image->alt() ?>" class="project-card__image">
          </a>
        <?php else: ?>
          <div class="project-card__placeholder"></div>
        <?php endif ?>

        <div class="project-card__content">
          <h2 class="project-card__title">
            <a href="<?= $project->url() ?>" class="project-card__link">
              <?= $project->title() ?>
            </a>
          </h2>
          <?php if ($project->resume()->isNotEmpty()): ?>
            <p class="project-card__description">
              <?= $project->resume() ?>
            </p>
          <?php endif ?>
        </div>
        
        <footer class="project-card__footer">
          <a href="<?= $project->url() ?>" class="project-card__more-link">
            Saber más
          </a>
        </footer>
      </article>
    <?php endforeach ?>
  </div>
</div>

<?php snippet('footer') ?>
