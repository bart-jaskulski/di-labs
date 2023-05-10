<?php declare( strict_types=1 );

namespace CleanWeb\PostExporter\Admin;

use CleanWeb\PostExporter\Export\PostExporter;
use CleanWeb\PostExporter\HookProvider;

/**
 * Handle admin request to export posts.
 */
class ExportRequest implements HookProvider {

	public function registerHooks(): void {
		\add_action( 'admin_post_export_posts', $this->exportPosts(...) );
	}

	private function exportPosts(): void {
		// FIXME: How can we parametrize request to export different kind of
		// data? Is it possible to create WooCommerce product exporter
		// without adding new hook callback?
		$exporter = new PostExporter();
		$exporter->export();
		/**
		 * $product_exporter = new ProductExporter(\wc_get_products());
		 * $product_exporter->export();
		 */
		die;
	}
}
