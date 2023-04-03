<?php declare( strict_types=1 );

namespace CleanWeb\PostExporter\Admin;

use CleanWeb\PostExporter\Renderer;
use WPDesk\WPHook\HookSubscriber\HookSubscriber;

class ExportPage implements HookSubscriber {

	/** @var Renderer */
	private $renderer;

	public function __construct( Renderer $renderer ) {
		$this->renderer = $renderer;
	}

	public static function register(): iterable {
		yield 'admin_init' => 'registerExportPage';
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
		$this->renderer->render( 'export_page.php' );
	}
}
