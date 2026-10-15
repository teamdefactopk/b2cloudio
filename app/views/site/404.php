<section class="page-hero not-found">
  <div class="hero-bg" aria-hidden="true"><span class="blob b1"></span><span class="blob b2"></span></div>
  <div class="wrap">
    <p class="eyebrow">Error 404</p>
    <h1>This page has moved to another cloud</h1>
    <p class="lead">The page you're looking for doesn't exist. Try searching, or head back home.</p>
    <form class="inline-search" action="<?= e(url('search')) ?>" method="get" role="search"><label class="sr" for="q404">Search</label><input id="q404" name="q" type="search" placeholder="Search the site" minlength="2" required><button class="btn btn-accent" type="submit">Search</button></form>
    <p><a class="text-link light" href="<?= e(url('/')) ?>">Back to homepage <?= icon('arrow', 'ico ico-xs') ?></a></p>
  </div>
</section>
