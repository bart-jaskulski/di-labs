<?php declare( strict_types=1 );

namespace CleanWeb\PostExporter\Admin;

use CleanWeb\PostExporter\{HookProvider, Renderer};

class ExportPage implements HookProvider {

	public function registerHooks(): void {
		add_action( 'admin_init', [ $this, 'registerExportPage' ] );
	}

	public function registerExportPage(): void {
		add_menu_page(
			esc_html__( 'Exporter', 'post-exporter' ),
			esc_html__( 'Exporter', 'post-exporter' ),
			'edit_others_posts',
			'exporter',
			[ $this, 'render' ]
		);
	}

	public function render(): void {
		// FIXME
		$renderer = new Renderer();
		$renderer->render( 'export_page.php' );
	}

}
