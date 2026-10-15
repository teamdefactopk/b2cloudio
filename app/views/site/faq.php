<?= view('partials/page-hero', ['crumbs' => ['FAQ' => null], 'eyebrow' => 'FAQ', 'heading' => 'Frequently asked questions', 'lead' => 'Quick answers about our services, regions and billing. Can\'t find yours? Ask us.']) ?>
<section class="section">
  <div class="wrap narrow">
    <div class="faq">
      <?php foreach ($faqs as $i => $f): ?>
      <details class="reveal"<?= $i === 0 ? ' open' : '' ?>><summary><?= e($f['question']) ?><span class="faq-ico"><?= icon('plus') ?></span></summary><div class="faq-a"><?= md($f['answer']) ?></div></details>
      <?php endforeach ?>
    </div>
  </div>
</section>
<script type="application/ld+json" nonce="<?= e(CSP_NONCE) ?>"><?= json_encode(['@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => array_map(fn($f) => ['@type' => 'Question', 'name' => $f['question'], 'acceptedAnswer' => ['@type' => 'Answer', 'text' => strip_tags(md($f['answer']))]], $faqs)], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) ?></script>
<?= view('partials/cta-band') ?>
