<?php declare(strict_types=1);

namespace CleanWeb\PostExporter\Admin;

use CleanWeb\PostExporter\{HookProvider, Renderer};

class AboutPage implements HookProvider {

	public function __construct(
		private readonly Renderer $renderer
	) {}

	public function registerHooks(): void {
		\add_action( 'admin_menu', $this->registerAboutPage(...) );
	}

	private function registerAboutPage(): void {
		\add_submenu_page(
			'exporter',
			\esc_html__( 'About exporter', 'post-exporter' ),
			\esc_html__( 'About exporter', 'post-exporter' ),
			'edit_others_posts',
			'about',
			$this->render(...),
		);
	}

	private function render(): void {
		$this->renderer->render( 'about.php' );
	}

}
