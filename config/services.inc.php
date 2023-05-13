<?php

use function PostExporterVendor\DI\autowire;
use function PostExporterVendor\DI\create;
use function PostExporterVendor\DI\get;

return [
	'templatesDir' => __DIR__ . '/../templates/',

	\PostExporterVendor\League\Csv\Writer::class => static fn () => \PostExporterVendor\League\Csv\Writer::createFromFileObject(new \SplTempFileObject()),

	\CleanWeb\PostExporter\Export\PostExporter::class => autowire()
		->constructorParameter('csvWriter', get(\PostExporterVendor\League\Csv\Writer::class)),

	'exporters' => [
		'posts' => get(\CleanWeb\PostExporter\Export\PostExporter::class)
	],

	'queries' => [
		'posts' => get(\CleanWeb\PostExporter\Export\Query\PostQuery::class)
	],

	\CleanWeb\PostExporter\Export\ExporterFactory::class => autowire()
		->constructor(get('exporters')),

	// For the time being we don't bind any actual logger.
	\PostExporterVendor\Psr\Log\LoggerInterface::class => get(\PostExporterVendor\Psr\Log\NullLogger::class),

	\CleanWeb\PostExporter\Renderer::class => autowire()
		->constructorParameter('templatesDirectory', get('templatesDir')),

];
