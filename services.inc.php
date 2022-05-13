<?php

use function DI\autowire;
use function DI\factory;
use function DI\get;

return [

	'hookable.plugins_loaded' => [
		autowire(ExportPage::class),
		autowire(ProductsPage::class),
		autowire(ExportRequest::class),
	],
	\Psr\Log\LoggerInterface::class => factory(function(\DI\Container $c) {
		if ($c->get('plugin.debug')) {
			return (new \WPDesk\Logger\SimpleLoggerFactory('custom_plugin'))->getLogger();
		}
		return new \Psr\Log\NullLogger();
	}),
	wpdb::class => factory(static function () {
		global $wpdb;
		return $wpdb;
	}),
	Exporter::class => autowire(ProductsExporter::class),
	ProductsExporter::class => autowire()
		->methodParameter('setLogger', 'logger', get(\Psr\Log\LoggerInterface::class))

];