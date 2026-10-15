<?php
declare(strict_types=1);

function current_path(): string
{
    $path = parse_url((string)($_SERVER['REQUEST_URI'] ?? '/'), PHP_URL_PATH) ?: '/';
    $base = rtrim((string)(APP_CONFIG['base_path'] ?? ''), '/');
    if ($base !== '' && str_starts_with($path, $base)) {
        $path = substr($path, strlen($base));
    }
    return trim(rawurldecode($path), '/');
}

function dispatch(): void
{
    $path = current_path();

    if (!APP_INSTALLED) {
        if ($path !== 'install') {
            redirect('/install');
        }
        require APP_DIR . '/install.php';
        run_installer();
        return;
    }

    if ($path === 'admin' || str_starts_with($path, 'admin/')) {
        require APP_DIR . '/admin.php';
        admin_dispatch(substr($path, 5) === false ? '' : trim(substr($path, 5), '/'));
        return;
    }

    site_dispatch($path);
}

/* ===================== Public site ===================== */

function practices_with_services(): array
{
    $practices = Db::all('SELECT * FROM practices ORDER BY sort, id');
    $services = Db::all('SELECT * FROM services WHERE is_active = 1 ORDER BY sort, id');
    foreach ($practices as &$p) {
        $p['services'] = array_values(array_filter($services, fn($s) => (int)$s['practice_id'] === (int)$p['id']));
    }
    return array_values(array_filter($practices, fn($p) => $p['services']));
}

function site_dispatch(string $path): void
{
    $common = ['nav' => practices_with_services()];

    switch (true) {
        case $path === '':
            render('site', 'site/home', $common + [
                'title' => setting('tagline'),
                'levels' => Db::all('SELECT * FROM levels ORDER BY sort, id'),
                'commitments' => Db::all('SELECT * FROM commitments ORDER BY sort, id'),
                'steps' => Db::all('SELECT * FROM steps ORDER BY sort, id'),
                'offices' => Db::all('SELECT * FROM offices ORDER BY sort, id'),
            ]);

        case $path === 'services':
            render('site', 'site/services', $common + ['title' => 'Services', 'description' => block('services_intro')]);

        case (bool)preg_match('#^services/([a-z0-9-]+)$#', $path, $m):
            $svc = Db::one('SELECT s.*, p.name AS practice_name, p.slug AS practice_slug FROM services s LEFT JOIN practices p ON p.id = s.practice_id WHERE s.slug = ? AND s.is_active = 1', [$m[1]]);
            if (!$svc) {
                not_found();
            }
            $related = Db::all('SELECT * FROM services WHERE practice_id = ? AND id <> ? AND is_active = 1 ORDER BY sort LIMIT 3', [$svc['practice_id'], $svc['id']]);
            render('site', 'site/service', $common + ['title' => $svc['name'], 'description' => $svc['summary'], 'svc' => $svc, 'related' => $related]);

        case $path === 'managed-services':
            render('site', 'site/managed', $common + [
                'title' => 'Managed services',
                'description' => block('managed_intro'),
                'levels' => Db::all('SELECT * FROM levels ORDER BY sort, id'),
                'commitments' => Db::all('SELECT * FROM commitments ORDER BY sort, id'),
                'steps' => Db::all('SELECT * FROM steps ORDER BY sort, id'),
            ]);

        case $path === 'about':
            render('site', 'site/about', $common + [
                'title' => 'About us',
                'offices' => Db::all('SELECT * FROM offices ORDER BY sort, id'),
            ]);

        case $path === 'faq':
            render('site', 'site/faq', $common + ['title' => 'Frequently asked questions', 'faqs' => Db::all('SELECT * FROM faqs WHERE is_active = 1 ORDER BY sort, id')]);

        case $path === 'contact':
            contact_page($common);

        case $path === 'search':
            search_page($common);

        case $path === 'privacy':
            render('site', 'site/legal', $common + ['title' => 'Privacy policy', 'body' => block('privacy_body')]);

        case $path === 'terms':
            render('site', 'site/legal', $common + ['title' => 'Terms of use', 'body' => block('terms_body')]);

        case $path === 'sitemap.xml':
            sitemap();

        case $path === 'robots.txt':
            header('Content-Type: text/plain; charset=utf-8');
            echo "User-agent: *\nDisallow: /admin\nDisallow: /install\nSitemap: " . full_url('sitemap.xml') . "\n";
            exit;
    }

    not_found();
}

function contact_page(array $common): never
{
    $errors = [];
    $old = ['name' => '', 'email' => '', 'company' => '', 'phone' => '', 'service' => post('service', (string)($_GET['service'] ?? '')), 'body' => ''];
    $sent = isset($_GET['sent']);

    if (is_post()) {
        foreach ($old as $k => $_) {
            $old[$k] = post($k);
        }
        $started = (int)post('_t');
        if (!csrf_check()) {
            $errors['form'] = 'Your session expired. Please submit the form again.';
        } elseif (post('website') !== '' || ($started > 0 && time() - $started < 3)) {
            redirect('/contact?sent=1'); // likely a bot: pretend success
        } else {
            if (mb_strlen($old['name']) < 2) $errors['name'] = 'Please enter your name.';
            if (!filter_var($old['email'], FILTER_VALIDATE_EMAIL)) $errors['email'] = 'Please enter a valid email address.';
            if (mb_strlen($old['body']) < 10) $errors['body'] = 'Please tell us a little more (at least 10 characters).';
            if (!isset($_POST['consent'])) $errors['consent'] = 'Please confirm we may contact you.';
            $recent = (int)Db::value('SELECT COUNT(*) FROM messages WHERE ip = ? AND created_at > ?', [client_ip(), date('Y-m-d H:i:s', time() - 3600)]);
            if ($recent >= 5) $errors['form'] = 'Too many messages from your connection. Please email us directly.';
        }
        if (!$errors) {
            Db::insert('messages', [
                'name' => mb_substr($old['name'], 0, 150), 'email' => mb_substr($old['email'], 0, 190),
                'company' => mb_substr($old['company'], 0, 190), 'phone' => mb_substr($old['phone'], 0, 60),
                'service' => mb_substr($old['service'], 0, 150), 'body' => mb_substr($old['body'], 0, 5000),
                'ip' => client_ip(), 'user_agent' => mb_substr((string)($_SERVER['HTTP_USER_AGENT'] ?? ''), 0, 255),
                'status' => 'new', 'created_at' => now(),
            ]);
            if (setting('notify_enabled') === '1' && setting('notify_email') !== '') {
                Mailer::send(
                    setting('notify_email'),
                    'New enquiry from ' . $old['name'] . ($old['service'] ? ' – ' . $old['service'] : ''),
                    "Name: {$old['name']}\nEmail: {$old['email']}\nCompany: {$old['company']}\nPhone: {$old['phone']}\nService: {$old['service']}\n\n{$old['body']}\n\n— Sent from the contact form at " . full_url('contact'),
                    $old['email']
                );
            }
            redirect('/contact?sent=1');
        }
    }

    render('site', 'site/contact', $common + [
        'title' => 'Contact us',
        'description' => block('contact_intro'),
        'errors' => $errors, 'old' => $old, 'sent' => $sent,
        'offices' => Db::all('SELECT * FROM offices ORDER BY sort, id'),
        'serviceNames' => array_column(Db::all('SELECT name FROM services WHERE is_active = 1 ORDER BY sort'), 'name'),
    ]);
}

function search_page(array $common): never
{
    $q = trim(mb_substr((string)($_GET['q'] ?? ''), 0, 100));
    $results = [];
    if (mb_strlen($q) >= 2) {
        $like = '%' . str_replace(['\\', '%', '_'], ['\\\\', '\\%', '\\_'], $q) . '%';
        foreach (Db::all('SELECT slug, name, summary FROM services WHERE is_active = 1 AND (name LIKE ? OR summary LIKE ? OR description LIKE ? OR do_items LIKE ? OR get_items LIKE ? OR tag LIKE ?) ORDER BY sort', array_fill(0, 6, $like)) as $s) {
            $results[] = ['type' => 'Service', 'title' => $s['name'], 'text' => $s['summary'], 'url' => url('services/' . $s['slug'])];
        }
        foreach (Db::all('SELECT question, answer FROM faqs WHERE is_active = 1 AND (question LIKE ? OR answer LIKE ?) ORDER BY sort', [$like, $like]) as $f) {
            $results[] = ['type' => 'FAQ', 'title' => $f['question'], 'text' => $f['answer'], 'url' => url('faq')];
        }
        foreach (Db::all('SELECT name, audience FROM levels WHERE name LIKE ? OR audience LIKE ? OR items LIKE ?', [$like, $like, $like]) as $l) {
            $results[] = ['type' => 'Managed services', 'title' => $l['name'] . ' service level', 'text' => (string)$l['audience'], 'url' => url('managed-services')];
        }
        $pages = ['about' => ['About us', block('about_body')], 'contact' => ['Contact us', block('contact_intro')], 'managed-services' => ['Managed services', block('managed_intro')]];
        foreach ($pages as $slug => [$t, $body]) {
            if (mb_stripos($t . ' ' . $body, $q) !== false) {
                $results[] = ['type' => 'Page', 'title' => $t, 'text' => mb_substr(strip_tags(md($body)), 0, 180), 'url' => url($slug)];
            }
        }
        foreach (Db::all('SELECT country, region FROM offices WHERE country LIKE ? OR region LIKE ?', [$like, $like]) as $o) {
            $results[] = ['type' => 'Office', 'title' => $o['country'], 'text' => (string)$o['region'], 'url' => url('about#offices')];
        }
    }
    render('site', 'site/search', $common + ['title' => $q ? 'Search: ' . $q : 'Search', 'q' => $q, 'results' => $results]);
}

function sitemap(): never
{
    header('Content-Type: application/xml; charset=utf-8');
    $paths = ['', 'services', 'managed-services', 'about', 'faq', 'contact', 'privacy', 'terms'];
    foreach (Db::all('SELECT slug FROM services WHERE is_active = 1') as $s) {
        $paths[] = 'services/' . $s['slug'];
    }
    echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n" . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
    foreach ($paths as $p) {
        echo '<url><loc>' . e(full_url($p)) . '</loc></url>';
    }
    echo '</urlset>';
    exit;
}
