<?php declare( strict_types=1 );

class ExportRequest implements \WPDesk\PluginBuilder\Plugin\Hookable {

	public function hooks() {
		add_action('admin_post_export_products', [$this, 'export_products']);
	}

	public function export_products() {
		$exporter = new ProductsExporter();
		$exporter->export();
	}
}