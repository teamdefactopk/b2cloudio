<div class="commit-grid">
  <?php foreach ($commitments as $i => $c): ?>
  <div class="commit reveal" style="--d:<?= $i % 3 ?>"><span class="commit-ico"><?= icon('check') ?></span><h3><?= e($c['title']) ?></h3><p><?= e($c['body']) ?></p></div>
  <?php endforeach ?>
</div>
