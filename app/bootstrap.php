<?php
declare(strict_types=1);

define('APP_DIR', __DIR__);
if (!defined('PUBLIC_DIR')) {
    define('PUBLIC_DIR', dirname(__DIR__) . '/public');
}

$configFile = APP_DIR . '/config.php';
$config = is_file($configFile) ? (require $configFile) : [];
define('APP_CONFIG', is_array($config) ? $config : []);
define('APP_INSTALLED', !empty(APP_CONFIG['db']) && is_file(APP_DIR . '/storage/installed.lock'));

$debug = !empty(APP_CONFIG['debug']);
error_reporting(E_ALL);
ini_set('display_errors', $debug ? '1' : '0');
ini_set('log_errors', '1');
ini_set('error_log', APP_DIR . '/storage/php-error.log');
date_default_timezone_set((string)(APP_CONFIG['timezone'] ?? 'UTC'));

require APP_DIR . '/lib/Db.php';
require APP_DIR . '/lib/helpers.php';
require APP_DIR . '/lib/Auth.php';
require APP_DIR . '/lib/Seed.php';
require APP_DIR . '/lib/Migrate.php';
require APP_DIR . '/lib/Collections.php';
require APP_DIR . '/lib/Mailer.php';
require APP_DIR . '/views/partials/icons.php';

header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');
header('Referrer-Policy: strict-origin-when-cross-origin');
header('Permissions-Policy: camera=(), microphone=(), geolocation=()');

define('CSP_NONCE', base64_encode(random_bytes(16)));
header("Content-Security-Policy: default-src 'self'; script-src 'self' 'nonce-" . CSP_NONCE . "'; style-src 'self' 'unsafe-inline'; img-src 'self' data:; font-src 'self'; connect-src 'self'; form-action 'self'; frame-ancestors 'self'; base-uri 'self'; object-src 'none'");
if ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || (($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '') === 'https')) {
    header('Strict-Transport-Security: max-age=31536000');
}

set_exception_handler(function (Throwable $ex) use ($debug) {
    error_log((string)$ex);
    if (!headers_sent()) {
        http_response_code(500);
    }
    echo $debug
        ? '<pre>' . htmlspecialchars((string)$ex) . '</pre>'
        : '<!doctype html><meta charset="utf-8"><title>Error</title><body style="font-family:sans-serif;padding:40px"><h1>Something went wrong</h1><p>Please try again in a moment.</p></body>';
});

if (APP_INSTALLED) {
    Db::init(APP_CONFIG['db']);
    Migrate::run();
}
