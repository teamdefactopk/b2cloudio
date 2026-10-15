<div class="offices">
  <?php foreach ($offices as $i => $o): ?>
  <div class="office reveal" style="--d:<?= $i ?>">
    <span class="office-dot" aria-hidden="true"></span>
    <h3><?= e($o['country']) ?></h3>
    <p class="office-region"><?= e($o['region']) ?></p>
    <?php if (!empty($full)): ?><p><?= e($o['description']) ?></p><?php endif ?>
    <p class="office-addr"><?= icon('pin', 'ico ico-xs') ?><?= trim((string)$o['address']) !== '' ? nl2br(e($o['address'])) : '<em>Address coming soon</em>' ?></p>
    <?php if (trim((string)$o['phone']) !== ''): ?><p class="office-addr"><?= icon('phone', 'ico ico-xs') ?><?= e($o['phone']) ?></p><?php endif ?>
  </div>
  <?php endforeach ?>
</div>
