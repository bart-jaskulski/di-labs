<?php declare( strict_types=1 );

namespace CleanWeb\PostExporter\Admin;

use CleanWeb\PostExporter\{HookProvider, Renderer};

class ExportPage implements HookProvider {

	public function registerHooks(): void {
		\add_action( 'admin_menu', $this->registerExportPage(...) );
	}

	private function registerExportPage(): void {
		\add_menu_page(
			\esc_html__( 'Exporter', 'post-exporter' ),
			\esc_html__( 'Exporter', 'post-exporter' ),
			'edit_others_posts',
			'exporter',
			$this->render(...),
		);
	}

	private function render(): void {
		// FIXME
		$renderer = new Renderer();
		$renderer->render( 'export_page.php' );
	}

}
