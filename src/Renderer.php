<?php declare( strict_types=1 );

namespace CleanWeb\PostExporter;

/**
 * Render our template files. Helps us to keep HTML away from PHP
 * classes.
 */
class Renderer {

	/**
	 * Absolute path to directory with our templates.
	 *
	 * @var string
	 */
	private $templatesDirectory;

	public function __construct( string $templatesDirectory ) {
		$this->templatesDirectory = $templatesDirectory;
	}

	/**
	 * Render template file for display.
	 */
	public function render( string $template ): void {
		ob_start();
		include $this->templatesDirectory . ltrim( $template, '/' );
		echo ob_get_clean();
	}
}
