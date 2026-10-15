<?php $pillars = array_map(fn($l) => array_map('trim', explode('|', $l, 2)) + [1 => ''], lines(block('about_pillars'))); ?>
<?= view('partials/page-hero', ['crumbs' => ['About' => null], 'eyebrow' => 'About b2cloud.io', 'heading' => block('about_title')]) ?>
<section class="section">
  <div class="wrap about-grid">
    <div class="prose reveal"><?= md(block('about_body')) ?></div>
    <div class="why-grid single"><?php foreach ($pillars as $i => [$t, $b]): ?><div class="why-card reveal" style="--d:<?= $i ?>"><h3><?= e($t) ?></h3><p><?= e($b) ?></p></div><?php endforeach ?></div>
  </div>
</section>
<section class="section section-tint" id="offices">
  <div class="wrap">
    <div class="section-head reveal"><p class="eyebrow">Global presence</p><h2>Offices in five countries</h2></div>
    <?= view('partials/offices', ['offices' => $offices, 'full' => true]) ?>
  </div>
</section>
<section class="section">
  <div class="wrap">
    <div class="section-head reveal"><p class="eyebrow">Platforms</p><h2>Platforms we manage</h2></div>
    <div class="chips reveal"><?php foreach (lines(setting('platforms')) as $pl): ?><span><?= e($pl) ?></span><?php endforeach ?></div>
  </div>
</section>
<?= view('partials/cta-band') ?>
