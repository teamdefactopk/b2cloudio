<section class="section">
  <div class="wrap">
    <div class="cta-band reveal">
      <div class="cta-glow" aria-hidden="true"></div>
      <div>
        <p class="eyebrow eyebrow-light">Let's talk</p>
        <h2><?= e(block('home_cta_band_title', 'Start with a free assessment')) ?></h2>
        <p><?= e(block('home_cta_band_body')) ?></p>
      </div>
      <div class="cta-actions">
        <a class="btn btn-accent" href="<?= e(url('contact')) ?>">Book a free assessment <?= icon('arrow') ?></a>
        <a class="cta-mail" href="mailto:<?= e(setting('email_sales')) ?>"><?= icon('mail') ?><?= e(setting('email_sales')) ?></a>
      </div>
    </div>
  </div>
</section>
