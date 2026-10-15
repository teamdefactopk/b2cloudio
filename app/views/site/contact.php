<?= view('partials/page-hero', ['crumbs' => ['Contact' => null], 'eyebrow' => 'Contact', 'heading' => block('contact_title', "Let's talk"), 'lead' => block('contact_intro')]) ?>

<section class="section">
  <div class="wrap contact-grid">
    <div class="form-card reveal">
      <?php if ($sent): ?>
        <div class="success-box" role="status">
          <span class="success-ico"><?= icon('check') ?></span>
          <h2>Message sent</h2>
          <p><?= e(block('contact_success')) ?></p>
          <a class="btn btn-ghost" href="<?= e(url('/')) ?>">Back to homepage</a>
        </div>
      <?php else: ?>
        <h2>Send us a message</h2>
        <?php if (!empty($errors['form'])): ?><p class="alert" role="alert"><?= e($errors['form']) ?></p><?php endif ?>
        <form method="post" action="<?= e(url('contact')) ?>" novalidate data-validate>
          <?= csrf_field() ?>
          <input type="hidden" name="_t" value="<?= time() ?>">
          <div class="hp" aria-hidden="true"><label for="website">Website</label><input id="website" name="website" tabindex="-1" autocomplete="off"></div>
          <div class="field-row">
            <div class="field<?= isset($errors['name']) ? ' has-error' : '' ?>">
              <label for="name">Your name <span aria-hidden="true">*</span></label>
              <input id="name" name="name" value="<?= e($old['name']) ?>" required autocomplete="name"<?= isset($errors['name']) ? ' aria-invalid="true" aria-describedby="name-err"' : '' ?>>
              <?php if (isset($errors['name'])): ?><p class="err" id="name-err"><?= e($errors['name']) ?></p><?php endif ?>
            </div>
            <div class="field<?= isset($errors['email']) ? ' has-error' : '' ?>">
              <label for="email">Work email <span aria-hidden="true">*</span></label>
              <input id="email" name="email" type="email" value="<?= e($old['email']) ?>" required autocomplete="email"<?= isset($errors['email']) ? ' aria-invalid="true" aria-describedby="email-err"' : '' ?>>
              <?php if (isset($errors['email'])): ?><p class="err" id="email-err"><?= e($errors['email']) ?></p><?php endif ?>
            </div>
          </div>
          <div class="field-row">
            <div class="field"><label for="company">Company</label><input id="company" name="company" value="<?= e($old['company']) ?>" autocomplete="organization"></div>
            <div class="field"><label for="phone">Phone</label><input id="phone" name="phone" type="tel" value="<?= e($old['phone']) ?>" autocomplete="tel"></div>
          </div>
          <div class="field">
            <label for="service">I'm interested in</label>
            <select id="service" name="service">
              <option value="">Choose a service (optional)</option>
              <?php $opts = array_merge($serviceNames, ['Managed services', 'Something else']); if ($old['service'] !== '' && !in_array($old['service'], $opts, true)) array_unshift($opts, $old['service']); ?>
              <?php foreach ($opts as $n): ?><option<?= $old['service'] === $n ? ' selected' : '' ?>><?= e($n) ?></option><?php endforeach ?>
            </select>
          </div>
          <div class="field<?= isset($errors['body']) ? ' has-error' : '' ?>">
            <label for="body">How can we help? <span aria-hidden="true">*</span></label>
            <textarea id="body" name="body" rows="6" required minlength="10"<?= isset($errors['body']) ? ' aria-invalid="true" aria-describedby="body-err"' : '' ?>><?= e($old['body']) ?></textarea>
            <?php if (isset($errors['body'])): ?><p class="err" id="body-err"><?= e($errors['body']) ?></p><?php endif ?>
          </div>
          <div class="field check<?= isset($errors['consent']) ? ' has-error' : '' ?>">
            <label><input type="checkbox" name="consent" value="1"<?= isset($_POST['consent']) ? ' checked' : '' ?> required> I agree that b2cloud.io may contact me about this enquiry, as described in the <a href="<?= e(url('privacy')) ?>">privacy policy</a>.</label>
            <?php if (isset($errors['consent'])): ?><p class="err"><?= e($errors['consent']) ?></p><?php endif ?>
          </div>
          <button class="btn btn-primary" type="submit">Send message <?= icon('arrow') ?></button>
        </form>
      <?php endif ?>
    </div>

    <aside class="contact-side">
      <div class="contact-card reveal">
        <h2>Email us</h2>
        <dl class="emails">
          <div><dt>General</dt><dd><a href="mailto:<?= e(setting('email_info')) ?>"><?= e(setting('email_info')) ?></a></dd></div>
          <div><dt>Sales</dt><dd><a href="mailto:<?= e(setting('email_sales')) ?>"><?= e(setting('email_sales')) ?></a></dd></div>
          <div><dt>Support</dt><dd><a href="mailto:<?= e(setting('email_support')) ?>"><?= e(setting('email_support')) ?></a></dd></div>
        </dl>
      </div>
      <div class="contact-card reveal" style="--d:1">
        <h2><?= e(block('presence_title', 'Where we work')) ?></h2>
        <ul class="office-list">
          <?php foreach ($offices as $o): ?>
          <li><b><?= e($o['country']) ?></b><span><?= e($o['region']) ?></span><?php if (trim((string)$o['address']) !== ''): ?><span class="addr"><?= nl2br(e($o['address'])) ?></span><?php endif ?><?php if (trim((string)$o['phone']) !== ''): ?><span class="addr"><?= e($o['phone']) ?></span><?php endif ?></li>
          <?php endforeach ?>
        </ul>
      </div>
    </aside>
  </div>
</section>
