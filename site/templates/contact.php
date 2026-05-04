<?php snippet('header') ?>

<!-- Apertura de página (Hero) -->
<?php snippet('hero') ?>

<main class="contact-page">
  
  <?php if ($page->intro_text()->isNotEmpty()): ?>
  <section class="contact-page__intro">
    <div class="container">
      <div class="contact-intro">
        <?= $page->intro_text()->html() ?>
      </div>
    </div>
  </section>
  <?php endif ?>

  <section class="contact-page__hablemos">
    <div class="container">
      <div class="contact-hablemos">
        
        <?php if ($page->hablemos_title()->isNotEmpty() || $page->hablemos_text()->isNotEmpty()): ?>
        <header class="contact-hablemos__header">
          <?php if ($page->hablemos_title()->isNotEmpty()): ?>
            <h2 class="contact-hablemos__title"><?= $page->hablemos_title()->html() ?></h2>
          <?php endif ?>
          <?php if ($page->hablemos_text()->isNotEmpty()): ?>
            <div class="contact-hablemos__text">
              <?= $page->hablemos_text()->kt() ?>
            </div>
          <?php endif ?>
        </header>
        <?php endif ?>

        <div class="contact-hablemos__content">
          
          <!-- Emails -->
          <?php if ($page->emails()->isNotEmpty()): ?>
          <div class="contact-hablemos__section contact-hablemos__section--emails">
            <ul class="contact-emails">
              <?php foreach ($page->emails()->toStructure() as $email): ?>
              <li class="contact-email">
                <?php if ($email->title()->isNotEmpty()): ?>
                  <span class="contact-email__title"><?= $email->title()->html() ?></span>
                <?php endif ?>
                <a href="mailto:<?= $email->email() ?>" class="contact-email__link">
                  <?= $email->email()->html() ?>
                </a>
              </li>
              <?php endforeach ?>
            </ul>
          </div>
          <?php endif ?>

          <!-- Phone -->
          <?php if ($page->phone()->isNotEmpty()): ?>
          <div class="contact-hablemos__section contact-hablemos__section--phones">
            <?php if ($page->phones_title()->isNotEmpty()): ?>
              <p class="contact-phones__heading"><?= $page->phones_title()->html() ?></p>
            <?php endif ?>
            <div class="contact-phone">
              <a href="tel:<?= $page->phone() ?>" class="contact-phone__link">
                <?= $page->phone()->html() ?>
              </a>
              <?php if ($page->phone_schedule()->isNotEmpty()): ?>
                <span class="contact-phone__schedule"><?= $page->phone_schedule()->nl2br() ?></span>
              <?php endif ?>
            </div>
          </div>
          <?php endif ?>

          <!-- Social -->
          <?php if ($site->social()->isNotEmpty()): ?>
          <div class="contact-hablemos__section contact-hablemos__section--social">
            <?php if ($page->social_intro()->isNotEmpty()): ?>
              <p class="contact-social__intro"><?= $page->social_intro()->html() ?></p>
            <?php endif ?>
            <ul class="contact-social">
              <?php foreach ($site->social()->toStructure() as $social): ?>
              <li class="contact-social__item">
                <a href="<?= $social->url() ?>" class="contact-social__link" target="_blank" rel="noopener noreferrer">
                  <?= $social->platform()->html() ?>
                </a>
              </li>
              <?php endforeach ?>
            </ul>
          </div>
          <?php endif ?>

          <?php if ($image = $page->hablemos_image()->toFile()): ?>
            <figure class="contact-hablemos__figure">
              <img src="<?= $image->url() ?>" alt="<?= $image->alt()->or('Ilustración')->html() ?>" class="contact-hablemos__image">
            </figure>
          <?php endif ?>

        </div>
      </div>
    </div>
  </section>

  <section class="contact-page__installations">
    <div class="container">
      <div class="contact-installations">
        
        <?php if ($page->installations_title()->isNotEmpty()): ?>
          <h2 class="contact-installations__title"><?= $page->installations_title()->html() ?></h2>
        <?php endif ?>

        <?php if ($page->addresses()->isNotEmpty()): ?>
        <div class="contact-installations__list">
          <?php foreach ($page->addresses()->toStructure() as $address): ?>
          <article class="contact-address">
            <?php if ($image = $address->image()->toFile()): ?>
              <figure class="contact-address__figure">
                <img src="<?= $image->url() ?>" alt="<?= $address->title()->html() ?>" class="contact-address__image">
              </figure>
            <?php endif ?>
            
            <div class="contact-address__content">
              <?php if ($address->title()->isNotEmpty()): ?>
                <h3 class="contact-address__title"><?= $address->title()->html() ?></h3>
              <?php endif ?>
              
              <?php if ($address->address()->isNotEmpty()): ?>
                <div class="contact-address__text">
                  <?= $address->address()->kt() ?>
                </div>
              <?php endif ?>
              
              <?php if ($address->schedule()->isNotEmpty()): ?>
                <div class="contact-address__schedule">
                  <?= $address->schedule()->html() ?>
                </div>
              <?php endif ?>
            </div>
          </article>
          <?php endforeach ?>
        </div>
        <?php endif ?>

      </div>
    </div>
  </section>

  <?php if ($page->google_maps()->isNotEmpty()): ?>
  <section class="contact-page__map">
    <div class="contact-map">
      <?= $page->google_maps()->value() ?>
    </div>
  </section>
  <?php endif ?>

</main>

<?php snippet('footer') ?>
