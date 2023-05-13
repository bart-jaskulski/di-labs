<?php

/**
 * Plugin Name: Post Exporter
 * Text Domain: post-exporter
 */

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/vendor_prefixed/php-di/php-di/src/functions.php';

( new \CleanWeb\PostExporter\Plugin() )->init();
