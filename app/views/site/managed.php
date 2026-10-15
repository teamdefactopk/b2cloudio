<?= view('partials/page-hero', ['crumbs' => ['Managed services' => null], 'eyebrow' => 'Managed services', 'heading' => block('managed_title'), 'lead' => block('managed_intro')]) ?>
<section class="section"><div class="wrap"><?= view('partials/levels', ['levels' => $levels]) ?><p class="fineprint"><?= e(setting('pricing_note')) ?></p></div></section>
<section class="section section-tint"><div class="wrap"><div class="section-head reveal"><p class="eyebrow">Our commitments</p><h2>What every client can count on</h2></div><?= view('partials/commitments', ['commitments' => $commitments]) ?></div></section>
<section class="section"><div class="wrap"><div class="section-head reveal"><p class="eyebrow">How we work</p><h2>From first call to steady state</h2></div><?= view('partials/steps', ['steps' => $steps]) ?></div></section>
<?= view('partials/cta-band') ?>
