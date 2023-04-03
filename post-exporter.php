<?php

/**
 * Plugin Name: Post Exporter
 * Text Domain: post-exporter
 */

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/vendor_prefixed/autoload.php';

( new \CleanWeb\PostExporter\Plugin() )->registerHooks();
