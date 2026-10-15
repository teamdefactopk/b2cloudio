<section class="page-hero">
  <div class="hero-bg" aria-hidden="true"><span class="blob b1"></span><span class="blob b2"></span><span class="grid-lines"></span></div>
  <div class="wrap">
    <?php if (!empty($crumbs)): ?>
    <nav class="crumbs" aria-label="Breadcrumb"><a href="<?= e(url('/')) ?>">Home</a><?php foreach ($crumbs as $label => $href): ?><span>/</span><?php if ($href): ?><a href="<?= e(url($href)) ?>"><?= e($label) ?></a><?php else: ?><span aria-current="page"><?= e($label) ?></span><?php endif ?><?php endforeach ?></nav>
    <?php endif ?>
    <?php if (!empty($eyebrow)): ?><p class="eyebrow"><?= e($eyebrow) ?></p><?php endif ?>
    <h1 class="rise"><?= e($heading) ?></h1>
    <?php if (!empty($lead)): ?><p class="lead rise d1"><?= e($lead) ?></p><?php endif ?>
  </div>
</section>
