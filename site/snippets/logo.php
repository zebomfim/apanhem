<?php if ($logo = $site->logo()->toFile()): ?>
  <img src="<?= $logo->url() ?>" alt="<?= $site->title() ?>" class="header__logo-img">
<?php else: ?>
  <span class="header__logo-text"><?= $site->brand_name()->or($site->title()) ?></span>
<?php endif ?>
