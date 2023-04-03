<?php declare( strict_types=1 );

namespace CleanWeb\PostExporter\Admin;

use CleanWeb\PostExporter\Export\PostExporter;
use CleanWeb\PostExporter\HookProvider;

/**
 * Handle admin request to export posts.
 */
class ExportRequest implements HookProvider {

	public function registerHooks(): void {
		add_action( 'admin_post_export_posts', [ $this, 'export_posts' ] );
	}

	public function exportPosts(): void {
		// TODO
		$exporter = new PostExporter();
		$exporter->export();
		die;
	}
}
