<a class="svc-card reveal" href="<?= e(url('services/' . $s['slug'])) ?>">
  <span class="svc-tag"><?= e($s['tag']) ?></span>
  <h3><?= e($s['name']) ?></h3>
  <p><?= e($s['summary']) ?></p>
  <span class="svc-foot"><span class="price"><?= price_html($s) ?></span><span class="go"><?= icon('arrow') ?></span></span>
</a>
