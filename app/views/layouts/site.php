<?php
$nav = $nav ?? practices_with_services();
$siteName = setting('site_name', 'b2cloud.io');
$pageTitle = (current_path() === '' ? $siteName . ' | ' . setting('tagline') : ($title ?? '') . ' | ' . $siteName);
$desc = trim((string)($description ?? '')) ?: setting('meta_description');
$canonical = full_url(current_path());
$path = current_path();
$active = fn(string $p) => ($path === $p || ($p !== '' && str_starts_with($path, $p . '/'))) ? ' aria-current="page"' : '';
$loginUrl = setting('client_login_url');
$socials = ['linkedin' => 'LinkedIn', 'x' => 'X', 'facebook' => 'Facebook', 'instagram' => 'Instagram', 'youtube' => 'YouTube'];
?><!doctype html>
<html lang="en" class="<?= setting('animations', '1') === '1' ? 'anim' : 'no-anim' ?>">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title><?= e($pageTitle) ?></title>
<meta name="description" content="<?= e(mb_substr($desc, 0, 300)) ?>">
<link rel="canonical" href="<?= e($canonical) ?>">
<?php if (!empty($noindex)): ?><meta name="robots" content="noindex, follow"><?php endif ?>
<meta name="theme-color" content="#0d2440">
<link rel="icon" href="<?= e(url('favicon.svg')) ?>" type="image/svg+xml">
<meta property="og:type" content="website">
<meta property="og:site_name" content="<?= e($siteName) ?>">
<meta property="og:title" content="<?= e($pageTitle) ?>">
<meta property="og:description" content="<?= e(mb_substr($desc, 0, 300)) ?>">
<meta property="og:url" content="<?= e($canonical) ?>">
<meta name="twitter:card" content="summary">
<link rel="stylesheet" href="<?= e(asset('css/fonts.css')) ?>">
<link rel="stylesheet" href="<?= e(asset('css/site.css')) ?>">
<script type="application/ld+json" nonce="<?= e(CSP_NONCE) ?>"><?= json_encode(array_filter([
    '@context' => 'https://schema.org', '@type' => 'Organization', 'name' => $siteName,
    'url' => setting('site_url', 'https://b2cloud.io'), 'logo' => full_url('assets/img/logo-mark.svg'),
    'email' => setting('email_info'),
    'legalName' => setting('legal_name') ?: null,
    'address' => setting('legal_address') !== '' ? ['@type' => 'PostalAddress', 'streetAddress' => preg_replace('/\s*\R\s*/', ', ', setting('legal_address'))] : null,
    'contactPoint' => [
        ['@type' => 'ContactPoint', 'contactType' => 'sales', 'email' => setting('email_sales')],
        ['@type' => 'ContactPoint', 'contactType' => 'customer support', 'email' => setting('email_support')],
    ],
], fn($v) => $v !== null), JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) ?></script>
<script nonce="<?= e(CSP_NONCE) ?>">document.documentElement.classList.add('js')</script>
</head>
<body>
<a class="skip" href="#main">Skip to content</a>

<?php if (setting('announcement') !== ''): ?>
<div class="announce"><div class="wrap"><?= e(setting('announcement')) ?></div></div>
<?php endif ?>

<header class="site-header" id="top">
  <div class="wrap header-row">
    <a class="brand" href="<?= e(url('/')) ?>" aria-label="<?= e($siteName) ?> home">
      <?= logo_mark() ?><span class="wordmark">b2cloud<span>.io</span></span>
    </a>

    <nav class="main-nav" id="main-nav" aria-label="Main">
      <div class="nav-item has-menu">
        <a href="<?= e(url('services')) ?>"<?= $active('services') ?>>Services <?= icon('chev', 'ico chev') ?></a>
        <div class="mega" role="group" aria-label="Services">
          <?php foreach ($nav as $p): ?>
          <div class="mega-col">
            <a class="mega-head" href="<?= e(url('services#' . $p['slug'])) ?>"><?= practice_icon($p['slug']) ?><span><?= e($p['name']) ?></span></a>
            <?php foreach ($p['services'] as $s): ?>
            <a class="mega-link" href="<?= e(url('services/' . $s['slug'])) ?>"><?= e($s['name']) ?></a>
            <?php endforeach ?>
          </div>
          <?php endforeach ?>
        </div>
      </div>
      <a href="<?= e(url('managed-services')) ?>"<?= $active('managed-services') ?>>Managed services</a>
      <a href="<?= e(url('about')) ?>"<?= $active('about') ?>>About</a>
      <a href="<?= e(url('faq')) ?>"<?= $active('faq') ?>>FAQ</a>
      <a href="<?= e(url('contact')) ?>"<?= $active('contact') ?>>Contact</a>
    </nav>

    <div class="header-actions">
      <button class="icon-btn" type="button" data-search-open aria-label="Search the site" aria-controls="search-panel" aria-expanded="false"><?= icon('search') ?></button>
      <?php if ($loginUrl !== ''): ?>
        <a class="btn btn-ghost btn-sm login-btn" href="<?= e($loginUrl) ?>"><?= icon('user') ?><span>Client login</span></a>
      <?php else: ?>
        <span class="btn btn-ghost btn-sm login-btn is-disabled" role="link" aria-disabled="true" title="Client portal coming soon" data-tip="Coming soon"><?= icon('user') ?><span>Client login</span></span>
      <?php endif ?>
      <a class="btn btn-primary btn-sm cta-btn" href="<?= e(url('contact')) ?>">Let's talk</a>
      <button class="icon-btn menu-btn" type="button" data-menu aria-label="Open menu" aria-controls="main-nav" aria-expanded="false"><?= icon('menu') ?></button>
    </div>
  </div>

  <div class="search-panel" id="search-panel" hidden>
    <form class="wrap search-form" action="<?= e(url('search')) ?>" method="get" role="search">
      <?= icon('search') ?>
      <label class="sr" for="site-search">Search</label>
      <input id="site-search" name="q" type="search" placeholder="Search services, hosting, cloud, FAQs…" autocomplete="off" required minlength="2">
      <button class="btn btn-primary btn-sm" type="submit">Search</button>
      <button class="icon-btn" type="button" data-search-close aria-label="Close search"><?= icon('close') ?></button>
    </form>
  </div>
</header>

<main id="main">
<?= $content ?>
</main>

<footer class="site-footer">
  <div class="wrap footer-grid">
    <div class="footer-brand">
      <a class="brand brand-light" href="<?= e(url('/')) ?>"><?= logo_mark() ?><span class="wordmark">b2cloud<span>.io</span></span></a>
      <p><?= e(setting('footer_text')) ?></p>
      <div class="socials" aria-label="Social media">
        <?php foreach ($socials as $k => $label): $u = setting('social_' . $k); ?>
          <?php if ($u !== ''): ?>
            <a href="<?= e($u) ?>" target="_blank" rel="noopener" aria-label="<?= e($label) ?>"><?= icon($k) ?></a>
          <?php else: ?>
            <span class="is-disabled" role="link" aria-disabled="true" aria-label="<?= e($label) ?> (coming soon)" title="<?= e($label) ?>: coming soon"><?= icon($k) ?></span>
          <?php endif ?>
        <?php endforeach ?>
      </div>
    </div>
    <?php foreach (array_slice($nav, 0, 3) as $p): ?>
    <div class="footer-col">
      <h3><?= e($p['name']) ?></h3>
      <?php foreach ($p['services'] as $s): ?><a href="<?= e(url('services/' . $s['slug'])) ?>"><?= e($s['name']) ?></a><?php endforeach ?>
    </div>
    <?php endforeach ?>
    <div class="footer-col">
      <h3>Company</h3>
      <a href="<?= e(url('about')) ?>">About us</a>
      <a href="<?= e(url('managed-services')) ?>">Managed services</a>
      <a href="<?= e(url('faq')) ?>">FAQ</a>
      <a href="<?= e(url('security')) ?>">Security</a>
      <a href="<?= e(url('sla')) ?>">Service levels</a>
      <a href="<?= e(url('contact')) ?>">Contact</a>
      <a href="<?= e(setting('tective_url', 'https://tective.cloud')) ?>" target="_blank" rel="noopener" title="Tective is our backup and data protection platform">Tective: our backup platform <?= icon('external', 'ico ico-xs') ?></a>
    </div>
    <div class="footer-col">
      <h3>Get in touch</h3>
      <a href="mailto:<?= e(setting('email_info')) ?>"><?= e(setting('email_info')) ?></a>
      <a href="mailto:<?= e(setting('email_sales')) ?>"><?= e(setting('email_sales')) ?></a>
      <a href="mailto:<?= e(setting('email_support')) ?>"><?= e(setting('email_support')) ?></a>
    </div>
  </div>
  <div class="wrap footer-bottom">
    <span>© <?= date('Y') ?> <?= e(setting('legal_name') ?: $siteName) ?>. All rights reserved.<?php if (setting('parent_company') !== ''): ?> <?= e($siteName) ?> is part of <?= e(setting('parent_company')) ?>.<?php endif ?></span>
    <nav aria-label="Legal"><a href="<?= e(url('privacy')) ?>">Privacy</a><a href="<?= e(url('terms')) ?>">Terms</a><a href="<?= e(url('sitemap.xml')) ?>">Sitemap</a></nav>
  </div>
</footer>

<div class="cookie" id="cookie" hidden>
  <p>We use only essential cookies to keep this site secure and our forms working. <a href="<?= e(url('privacy')) ?>">Privacy policy</a></p>
  <button class="btn btn-primary btn-sm" type="button" data-cookie-ok>OK</button>
</div>
<a class="to-top" href="#top" aria-label="Back to top"><?= icon('up') ?></a>
<div class="toast" id="toast" role="status" aria-live="polite"></div>

<script src="<?= e(asset('js/site.js')) ?>" defer></script>
</body>
</html>
