<?php snippet('header') ?>

<main class="container py-8">
  <header class="mb-12">
    <h1 class="text-4xl font-bold mb-4"><?= $page->headline()->or($page->title()) ?></h1>
    <?php if ($image = $page->cover()->toFile()): ?>
      <figure class="aspect-video w-full max-h-[400px] overflow-hidden rounded-lg shadow-lg">
        <img src="<?= $image->url() ?>" alt="<?= $image->alt() ?>" class="w-full h-full object-cover">
      </figure>
    <?php endif ?>
  </header>

  <!-- Introducción flexible -->
  <?php foreach ($page->layout()->toLayouts() as $layout): ?>
    <section class="mb-12" id="<?= $layout->id() ?>">
      <?php foreach ($layout->columns() as $column): ?>
        <div class="blocks">
          <?= $column->blocks() ?>
        </div>
      <?php endforeach ?>
    </section>
  <?php endforeach ?>

  <!-- Grid de Proyectos -->
  <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    <?php foreach ($page->children()->listed()->template('proyecto') as $project): ?>
      <article class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex flex-col transition-transform hover:-translate-y-1 hover:shadow-md">
        <?php if ($image = $project->cover()->toFile()): ?>
          <a href="<?= $project->url() ?>" class="block aspect-video overflow-hidden">
            <img src="<?= $image->crop(600, 337)->url() ?>" alt="<?= $image->alt() ?>" class="w-full h-full object-cover">
          </a>
        <?php else: ?>
          <div class="aspect-video bg-gray-100 flex items-center justify-center text-gray-400">
            <span class="icon">cube</span>
          </div>
        <?php endif ?>

        <div class="p-6 flex-grow">
          <h2 class="text-xl font-bold mb-2">
            <a href="<?= $project->url() ?>" class="hover:text-blue-600">
              <?= $project->title() ?>
            </a>
          </h2>
          <?php if ($project->resume()->isNotEmpty()): ?>
            <p class="text-gray-600 text-sm line-clamp-3">
              <?= $project->resume() ?>
            </p>
          <?php endif ?>
        </div>
        
        <div class="px-6 pb-6 pt-0">
          <a href="<?= $project->url() ?>" class="text-blue-600 font-semibold text-sm hover:underline">
            Saber más →
          </a>
        </div>
      </article>
    <?php endforeach ?>
  </section>
</main>

<?php snippet('footer') ?>
