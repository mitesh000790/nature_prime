<?php

declare(strict_types=1);

/**
 * Bootstraps the site: checks the PHP version, loads the helpers,
 * applies the configuration and returns the config array.
 *
 * Usage:  $config = require __DIR__ . '/includes/init.php';
 *
 * This file must stay free of PHP 8.1+ syntax so the version check
 * below can run (and show a clear message) on older servers.
 */

if (PHP_VERSION_ID < 80100) {
    http_response_code(500);
    header('Content-Type: text/plain; charset=UTF-8');
    exit("Nature's Prime requires PHP 8.1 or newer (built and tested for PHP 8.5). This server runs PHP " . PHP_VERSION . '.');
}

require __DIR__ . '/functions.php';

/** @var array{site_name: string, timezone: string, phone: string, email: string, brands: list<list<array{file: string, name: string}>>} $config */
$config = require __DIR__ . '/config.php';

date_default_timezone_set($config['timezone']);

return $config;
