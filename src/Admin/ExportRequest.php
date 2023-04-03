<?php declare( strict_types=1 );

namespace CleanWeb\PostExporter\Admin;

use CleanWeb\PostExporter\Export\Exporter;
use WPDesk\WPHook\HookSubscriber\Deferred;
use WPDesk\WPHook\HookSubscriber\HookSubscriber;

/**
 * Handle admin request to export posts.
 */
class ExportRequest implements HookSubscriber, Deferred {
	/** @var Exporter */
	private $exporter;

	public function __construct( Exporter $exporter ) {
		$this->exporter = $exporter;
	}

	public static function register_after() {
		return 'admin_init';
	}

	public static function register(): iterable {
		yield 'admin_post_export_posts' => 'exportPosts';
	}

	public function exportPosts(): void {
		$this->exporter->export();
		die;
	}

}
