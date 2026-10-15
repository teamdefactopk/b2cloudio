<?= view('partials/page-hero', ['crumbs' => ['Services' => 'services', $svc['name'] => null], 'eyebrow' => $svc['practice_name'] . ' · ' . $svc['tag'], 'heading' => $svc['name'], 'lead' => $svc['description']]) ?>

<section class="section">
  <div class="wrap svc-detail">
    <div class="svc-detail-main">
      <div class="detail-lists">
        <div class="detail-card reveal"><h2>What we do</h2><ul class="ticks"><?php foreach (lines($svc['do_items']) as $it): ?><li><?= icon('check') ?><?= e($it) ?></li><?php endforeach ?></ul></div>
        <div class="detail-card reveal" style="--d:1"><h2>What you get</h2><ul class="ticks"><?php foreach (lines($svc['get_items']) as $it): ?><li><?= icon('check') ?><?= e($it) ?></li><?php endforeach ?></ul></div>
      </div>
      <div class="ideal-box reveal"><h2>Ideal for</h2><p><?= e($svc['ideal']) ?></p></div>
    </div>
    <aside class="price-card reveal" aria-label="Pricing">
      <p class="eyebrow">Indicative price</p>
      <p class="price price-xl"><?= price_html($svc) ?></p>
      <p class="fineprint">USD, exclusive of taxes. Confirmed in a written proposal.</p>
      <a class="btn btn-primary btn-block" href="<?= e(url('contact?service=' . rawurlencode($svc['name']))) ?>">Let's talk <?= icon('arrow') ?></a>
      <?php if (!empty($svc['external_url'])): ?><a class="btn btn-ghost btn-block" href="<?= e($svc['external_url']) ?>" target="_blank" rel="noopener">Learn more <?= icon('external') ?></a><?php endif ?>
      <ul class="mini-points"><li><?= icon('check') ?>Free assessment</li><li><?= icon('check') ?>Free migration</li><li><?= icon('check') ?>24/7 monitoring</li></ul>
    </aside>
  </div>
</section>

<?php if ($related): ?>
<section class="section section-tint">
  <div class="wrap">
    <div class="section-head reveal"><p class="eyebrow">Related</p><h2>More in <?= e($svc['practice_name']) ?></h2></div>
    <div class="svc-grid"><?php foreach ($related as $s): ?><?= view('partials/service-card', ['s' => $s]) ?><?php endforeach ?></div>
  </div>
</section>
<?php endif ?>
<?= view('partials/cta-band') ?>
