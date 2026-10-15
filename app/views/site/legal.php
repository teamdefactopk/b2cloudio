<?= view('partials/page-hero', ['crumbs' => [$title => null], 'eyebrow' => $eyebrow ?? '', 'heading' => $title]) ?>
<section class="section"><div class="wrap narrow prose"><?= md(fill_tokens((string)$body)) ?></div></section>
