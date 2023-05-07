<?php declare( strict_types=1 );

namespace CleanWeb\PostExporter;

/**
 * Render our template files. Helps us to keep HTML away from PHP
 * classes.
 */
class Renderer {

	/**
	 * Absolute path to directory with our templates.
	 */
	private string $templatesDirectory;

	public function __construct() {
		// FIXME: does renderer really need to know explicitly about its own location?
		$this->templatesDirectory = __DIR__ . '/../templates/';
	}

	/**
	 * Render template file for display.
	 */
	public function render( string $template ): void {
		\ob_start();
		include $this->templatesDirectory . \ltrim( $template, '/' );
		echo \ob_get_clean();
	}
}
