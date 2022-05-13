<?php declare( strict_types=1 );

class ExportRequest implements \WPDesk\PluginBuilder\Plugin\Hookable {

	/**
	 * @var Exporter
	 */
	private $exporter;

	public function __construct(Exporter $exporter) {
		$this->exporter = $exporter;
	}

	public function hooks() {
		add_action('admin_post_export_products', [$this, 'export_products']);
	}

	public function export_products() {
		$this->exporter->export();
	}
}