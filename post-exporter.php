<?php

/**
 * Plugin Name: Post Exporter
 * Text Domain: post-exporter
 */

require __DIR__ . '/vendor/autoload.php';

( new \CleanWeb\PostExporter\Plugin() )->registerHooks();
