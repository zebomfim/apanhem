<?php snippet('header') ?>

<main class="container py-8">
  <article>
    <header class="mb-12">
      <h1 class="text-4xl font-bold mb-4"><?= $page->title() ?></h1>
      <?php if ($image = $page->cover()->toFile()): ?>
        <figure class="aspect-video w-full overflow-hidden rounded-lg shadow-lg mb-8">
          <img src="<?= $image->url() ?>" alt="<?= $image->alt() ?>" class="w-full h-full object-cover">
        </figure>
      <?php endif ?>
    </header>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
      <div class="lg:col-span-2">
        
        <?php if ($page->mision()->isNotEmpty() || $page->vision()->isNotEmpty()): ?>
          <section class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12 bg-gray-50 p-8 rounded-xl border border-gray-100 italic">
            <?php if ($page->mision()->isNotEmpty()): ?>
              <div>
                <h2 class="text-xl font-semibold mb-2 not-italic">Nuestra Misión</h2>
                <?= $page->mision()->kt() ?>
              </div>
            <?php endif ?>
            <?php if ($page->vision()->isNotEmpty()): ?>
              <div>
                <h2 class="text-xl font-semibold mb-2 not-italic">Nuestra Visión</h2>
                <?= $page->vision()->kt() ?>
              </div>
            <?php endif ?>
          </section>
        <?php endif ?>

        <!-- Renderizado de Layouts flexible -->
        <?php foreach ($page->layout()->toLayouts() as $layout): ?>
          <section class="grid grid-cols-12 gap-6 mb-8" id="<?= $layout->id() ?>">
            <?php foreach ($layout->columns() as $column): ?>
              <div class="col-span-12 md:col-span-<?= $column->span() ?>">
                <div class="blocks">
                  <?= $column->blocks() ?>
                </div>
              </div>
            <?php endforeach ?>
          </section>
        <?php endforeach ?>
      </div>

      <aside class="sidebar">
        <?php if ($page->links()->isNotEmpty()): ?>
          <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm mb-6">
            <h3 class="text-lg font-bold mb-4 border-b pb-2">Más información</h3>
            <ul class="space-y-3">
              <?php foreach ($page->links()->toStructure() as $link): ?>
                <li>
                  <a href="<?= $link->link_url() ?>" class="text-blue-600 hover:underline flex items-center">
                    <span class="mr-2">→</span>
                    <?= $link->link_text() ?>
                  </a>
                </li>
              <?php endforeach ?>
            </ul>
          </div>
        <?php endif ?>
      </aside>
    </div>
  </article>
</main>

<?php snippet('footer') ?>
