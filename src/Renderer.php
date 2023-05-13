<?php declare( strict_types=1 );

namespace CleanWeb\PostExporter;

/**
 * Render our template files. Helps us to keep HTML away from PHP
 * classes.
 */
class Renderer {

	public function __construct(
		private readonly string $templatesDirectory
	) {
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
