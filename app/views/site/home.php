<?php
$platforms = lines(setting('platforms'));
$pillars = array_map(fn($l) => array_map('trim', explode('|', $l, 2)) + [1 => ''], lines(block('about_pillars')));
$allServices = array_merge(...array_map(fn($p) => $p['services'], $nav ?: [['services' => []]]));
?>
<section class="hero">
  <div class="hero-bg" aria-hidden="true"><span class="blob b1"></span><span class="blob b2"></span><span class="blob b3"></span><span class="grid-lines"></span></div>
  <div class="wrap hero-grid">
    <div class="hero-copy">
      <p class="eyebrow rise"><?= e(block('home_eyebrow')) ?></p>
      <h1 class="rise d1"><?= e(block('home_title')) ?></h1>
      <p class="lead rise d2"><?= e(block('home_intro')) ?></p>
      <div class="hero-ctas rise d3">
        <a class="btn btn-accent" href="<?= e(url('contact')) ?>"><?= e(block('home_cta_primary', "Let's talk")) ?> <?= icon('arrow') ?></a>
        <a class="btn btn-ghost-light" href="<?= e(url('services')) ?>"><?= e(block('home_cta_secondary', 'Explore services')) ?></a>
      </div>
      <ul class="hero-points rise d4">
        <?php foreach (lines(block('home_points')) as $pt): ?><li><?= icon('check') ?><?= e($pt) ?></li><?php endforeach ?>
      </ul>
    </div>

    <div class="hero-visual rise d2" aria-hidden="true">
      <svg class="orbit" viewBox="0 0 480 480">
        <defs>
          <radialGradient id="core" cx="50%" cy="50%" r="50%"><stop offset="0" stop-color="#2fd3a6" stop-opacity=".55"/><stop offset="1" stop-color="#2fd3a6" stop-opacity="0"/></radialGradient>
          <linearGradient id="ring" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#6fb1f2"/><stop offset="1" stop-color="#2fd3a6"/></linearGradient>
        </defs>
        <circle cx="240" cy="240" r="200" class="ring r1"/>
        <circle cx="240" cy="240" r="140" class="ring r2"/>
        <circle cx="240" cy="240" r="80" class="ring r3"/>
        <circle cx="240" cy="240" r="120" fill="url(#core)" class="core-glow"/>
        <g class="links">
          <path d="M240 240 L92 128"/><path d="M240 240 L392 112"/><path d="M240 240 L420 300"/><path d="M240 240 L300 424"/><path d="M240 240 L70 350"/>
        </g>
        <g class="spin-slow"><circle cx="240" cy="40" r="6" class="sat"/><circle cx="440" cy="240" r="4" class="sat"/><circle cx="60" cy="300" r="5" class="sat"/></g>
        <g class="spin-rev"><circle cx="240" cy="100" r="4" class="sat s2"/><circle cx="100" cy="240" r="5" class="sat s2"/></g>
      </svg>
      <div class="core-card"><?= logo_mark('core-logo') ?></div>
      <div class="node n1"><?= icon('globe') ?><span>Domains</span></div>
      <div class="node n2"><?= icon('server') ?><span>Hosting</span></div>
      <div class="node n3"><?= icon('cloud') ?><span>Cloud</span></div>
      <div class="node n4"><?= icon('mail') ?><span>Email</span></div>
      <div class="node n5"><?= icon('support') ?><span>24/7 support</span></div>
    </div>
  </div>
</section>

<?php if ($platforms): ?>
<section class="marquee" aria-label="Platforms we manage">
  <p class="marquee-label">Platforms we manage</p>
  <div class="marquee-track">
    <?php for ($i = 0; $i < 2; $i++): ?>
    <div class="marquee-row"<?= $i ? ' aria-hidden="true"' : '' ?>><?php foreach ($platforms as $pl): ?><span><?= e($pl) ?></span><?php endforeach ?></div>
    <?php endfor ?>
  </div>
</section>
<?php endif ?>

<section class="section">
  <div class="wrap">
    <div class="section-head reveal">
      <p class="eyebrow">What we do</p>
      <h2><?= e(block('services_title')) ?></h2>
      <p class="section-lead"><?= e(block('services_intro')) ?></p>
    </div>
    <div class="practice-grid">
      <?php foreach ($nav as $i => $p): ?>
      <article class="practice-card reveal" style="--d:<?= $i ?>">
        <span class="practice-ico"><?= practice_icon($p['slug']) ?></span>
        <h3><?= e($p['name']) ?></h3>
        <p><?= e($p['intro']) ?></p>
        <ul><?php foreach ($p['services'] as $s): ?><li><a href="<?= e(url('services/' . $s['slug'])) ?>"><?= e($s['name']) ?><?= icon('arrow', 'ico ico-xs') ?></a></li><?php endforeach ?></ul>
      </article>
      <?php endforeach ?>
    </div>
  </div>
</section>

<section class="section section-tint">
  <div class="wrap why">
    <div class="why-copy reveal">
      <p class="eyebrow">Why b2cloud.io</p>
      <h2><?= e(block('home_why_title')) ?></h2>
      <p class="section-lead"><?= e(block('home_why_body')) ?></p>
      <a class="text-link" href="<?= e(url('about')) ?>">About us <?= icon('arrow', 'ico ico-xs') ?></a>
    </div>
    <div class="why-grid">
      <?php foreach ($pillars as $i => [$t, $b]): ?>
      <div class="why-card reveal" style="--d:<?= $i ?>"><h3><?= e($t) ?></h3><p><?= e($b) ?></p></div>
      <?php endforeach ?>
    </div>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <div class="section-head reveal">
      <p class="eyebrow">Services</p>
      <h2>Everything you run online, managed</h2>
    </div>
    <div class="svc-grid">
      <?php foreach ($allServices as $s): ?><?= view('partials/service-card', ['s' => $s]) ?><?php endforeach ?>
    </div>
    <p class="fineprint reveal"><?= e(setting('pricing_note')) ?></p>
  </div>
</section>

<section class="section section-dark">
  <div class="wrap">
    <div class="section-head reveal">
      <p class="eyebrow eyebrow-light">Service levels</p>
      <h2><?= e(block('managed_title')) ?></h2>
      <p class="section-lead"><?= e(block('managed_intro')) ?></p>
    </div>
    <?= view('partials/levels', ['levels' => $levels]) ?>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <div class="section-head reveal"><p class="eyebrow">Our commitments</p><h2>What every client can count on</h2></div>
    <?= view('partials/commitments', ['commitments' => $commitments]) ?>
  </div>
</section>

<section class="section section-tint">
  <div class="wrap">
    <div class="section-head reveal"><p class="eyebrow">How we work</p><h2>From first call to steady state</h2></div>
    <?= view('partials/steps', ['steps' => $steps]) ?>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <div class="section-head reveal"><p class="eyebrow">Global presence</p><h2><?= e(block('presence_title', 'Where we work')) ?></h2><p class="section-lead"><?= e(block('presence_intro')) ?></p></div>
    <?= view('partials/offices', ['offices' => $offices]) ?>
    <div class="tective reveal">
      <div><p class="eyebrow">Backup &amp; data protection</p><h3>Protect your hosting and cloud data with Tective</h3><p>Tective is our own backup and recovery platform: secure sync, backup and restore with built-in anti-malware and anti-ransomware. It has its own website.</p></div>
      <a class="btn btn-ghost" href="<?= e(setting('tective_url', 'https://tective.cloud')) ?>" target="_blank" rel="noopener">Visit tective.cloud <?= icon('external') ?></a>
    </div>
  </div>
</section>

<?= view('partials/cta-band') ?>
