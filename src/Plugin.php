<?php declare(strict_types=1);

class Plugin extends \WPDesk\PluginBuilder\Plugin\AbstractPlugin implements \Psr\Log\LoggerAwareInterface {
	use \Psr\Log\LoggerAwareTrait;

    public function __construct($plugin_info) {
        parent::__construct($plugin_info);
		$this->logger = new \Psr\Log\NullLogger();
    }

	public function init() {
		(new ProductsTable())->install();
		parent::init();
	}

	protected function hooks() {
		add_action('plugins_loaded', function () {
			(new ExportRequest())->hooks();
			(new ExportPage())->hooks();
			(new ProductsPage())->hooks();
		});
		parent::hooks();
	}

}