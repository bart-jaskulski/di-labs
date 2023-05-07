<?php declare(strict_types=1);

namespace CleanWeb\PostExporter;

/**
 * Class that needs to integrate with WordPress hook system should be
 * able to register hook callbacks.
 */
interface HookProvider {

	/**
	 * Register callbacks for WordPress hooks.
	 */
	public function registerHooks(): void;

}
