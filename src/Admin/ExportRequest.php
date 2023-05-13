<?php declare( strict_types=1 );

namespace CleanWeb\PostExporter\Admin;

use CleanWeb\PostExporter\Export\ExporterFactory;
use CleanWeb\PostExporter\Export\Query\QueryFactory;
use CleanWeb\PostExporter\HookProvider;

/**
 * Handle admin request to export posts.
 */
class ExportRequest implements HookProvider {

	public function __construct(
		private readonly ExporterFactory $exporterFactory,
		private readonly QueryFactory $queryFactory,
	) {}

	public function registerHooks(): void {
		\add_action( 'admin_post_export_posts', $this->exportPosts(...) );
	}

	private function exportPosts(): void {
		try {
			$kind = \sanitize_text_field($_POST['export_type'] ?? 'posts')
			$exporter = $this->exporterFactory->getExporter($kind);
			$exporter->export($this->queryFactory->getQuery($kind);
			die;
		} catch (\RuntimeException) {
			\wp_die(
				\esc_html__('Failed to export requested data.', 'post-exporter')
			);
		}
	}
}
