<?php
// Direct entry point for the installer. Works even before .htaccess rewriting is active.
define('B2C_FORCE_ROUTE', 'install');
require __DIR__ . '/index.php';
