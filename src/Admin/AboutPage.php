<?php declare(strict_types=1);

namespace CleanWeb\PostExporter\Admin;

use CleanWeb\PostExporter\{HookProvider, Renderer};

class AboutPage implements HookProvider {

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
		// FIXME: Even though we are using the same renderer in ExportPage,
		// we create a new instance here. Is it possible to share those
		// instances?
		$renderer = new Renderer();
		$renderer->render( 'about.php' );
	}

}
