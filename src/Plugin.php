<?php declare( strict_types=1 );

namespace CleanWeb\PostExporter;

use CleanWeb\PostExporter\Admin;

/**
 * Our main bootstrapping class, which is reponsible for registering
 * into main WordPress lifeclycle and register our classes inside
 * top-level hooks.
 */
final class Plugin {

	public function registerHooks(): void {
		\add_action(
			'init',
			static function () {
				( new Admin\ExportPage() )->registerHooks();
				( new Admin\AboutPage() )->registerHooks();
				( new Admin\ExportRequest() )->registerHooks();
			}
		);
	}

}
