<?= view('partials/page-hero', ['crumbs' => ['Services' => null], 'eyebrow' => 'Services', 'heading' => block('services_title'), 'lead' => block('services_intro')]) ?>

<nav class="practice-tabs wrap" aria-label="Practices">
  <?php foreach ($nav as $p): ?><a href="#<?= e($p['slug']) ?>"><?= practice_icon($p['slug']) ?><?= e($p['name']) ?></a><?php endforeach ?>
</nav>

<?php foreach ($nav as $p): ?>
<section class="section practice-section" id="<?= e($p['slug']) ?>">
  <div class="wrap">
    <div class="practice-head reveal">
      <span class="practice-ico"><?= practice_icon($p['slug']) ?></span>
      <div><h2><?= e($p['name']) ?></h2><p class="section-lead"><?= e($p['intro']) ?></p></div>
    </div>
    <div class="svc-rows">
      <?php foreach ($p['services'] as $s): ?>
      <article class="svc-row reveal">
        <div class="svc-row-main">
          <span class="svc-tag"><?= e($s['tag']) ?></span>
          <h3><a href="<?= e(url('services/' . $s['slug'])) ?>"><?= e($s['name']) ?></a></h3>
          <p><?= e($s['description']) ?></p>
          <p class="ideal"><b>Ideal for:</b> <?= e($s['ideal']) ?></p>
        </div>
        <div class="svc-row-lists">
          <div><h4>What we do</h4><ul class="ticks"><?php foreach (lines($s['do_items']) as $it): ?><li><?= icon('check') ?><?= e($it) ?></li><?php endforeach ?></ul></div>
          <div><h4>What you get</h4><ul class="ticks"><?php foreach (lines($s['get_items']) as $it): ?><li><?= icon('check') ?><?= e($it) ?></li><?php endforeach ?></ul></div>
        </div>
        <div class="svc-row-foot">
          <span class="price"><?= price_html($s) ?></span>
          <span class="row-actions">
            <a class="btn btn-ghost btn-sm" href="<?= e(url('services/' . $s['slug'])) ?>">Details</a>
            <a class="btn btn-primary btn-sm" href="<?= e(url('contact?service=' . rawurlencode($s['name']))) ?>">Let's talk</a>
          </span>
        </div>
      </article>
      <?php endforeach ?>
    </div>
  </div>
</section>
<?php endforeach ?>

<div class="wrap"><p class="fineprint"><?= e(setting('pricing_note')) ?></p></div>
<?= view('partials/cta-band') ?>
