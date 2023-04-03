<?php

use CleanWeb\PostExporter\Export\Exporter;
use CleanWeb\PostExporter\Export\PostExporter;
use CleanWeb\PostExporter\Renderer;
use function PostExporterVendor\DI\autowire;

return [
	Exporter::class => autowire( PostExporter::class ),
	Renderer::class => static function ( \WPDesk\Init\Plugin $plugin ) {
		return new Renderer( $plugin->get_path( 'templates' ) );
	}
];
