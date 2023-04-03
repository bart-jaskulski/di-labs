<?php

/**
 * Plugin Name: Post Exporter
 * Text Domain: post-exporter
 * Requires PHP: 7.0
 * Requires at least: 5.0
 */

use WPDesk\Init\PluginInit;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/vendor_prefixed/autoload.php';

PluginInit::from_config( 'config/init.php' )->init();
