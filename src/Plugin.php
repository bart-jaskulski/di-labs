<?php declare( strict_types=1 );

namespace CleanWeb\PostExporter;

use CleanWeb\PostExporter\Admin;
use PostExporterVendor\DI\ContainerBuilder;

/**
 * Our main bootstrapping class, which is reponsible for registering
 * into main WordPress lifeclycle and register our classes inside
 * top-level hooks.
 */
final class Plugin {

	public function init(): void {
		$builder = new ContainerBuilder();

		if (\wp_get_environment_type() !== 'development') {
			$builder->enableCompilation(
				__DIR__ . '/../generated/',
				'PostExporterContainer'
			);
		}

		$builder->addDefinitions(__DIR__ . '/../config/services.inc.php');
		$container = $builder->build();

		\add_action(
			'init',
			static function () use ($container) {
				$hookProviders = require __DIR__ . '/../config/hook_providers.php';

				foreach ($hookProviders as $hookProvider) {
					$container->get($hookProvider)->registerHooks();
				}
			}
		);
	}

}
