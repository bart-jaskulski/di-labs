<?php declare(strict_types=1);

class Plugin extends \WPDesk\PluginBuilder\Plugin\AbstractPlugin implements \Psr\Log\LoggerAwareInterface {
	use \Psr\Log\LoggerAwareTrait;

	/**
	 * @var \Psr\Container\ContainerInterface
	 */
	private $container;

	public function __construct($plugin_info) {
		parent::__construct($plugin_info);
	}

	public function init() {
		$builder = new \DI\ContainerBuilder();
		$builder->addDefinitions(
			[
				'plugin.debug' => $this->is_debug_enabled()
			],
			$this->plugin_info->get_plugin_dir() . '/services.inc.php'
		);
		$this->container = $builder->build();

		$this->container->get(ProductsTable::class)->install();
		parent::init();
	}

	protected function hooks() {
		foreach ( $this->container->get( 'hookable.plugins_loaded' ) as $hookable ) {
			if (! $hookable instanceof \WPDesk\PluginBuilder\Plugin\Hookable) {
				continue;
			}
			if ($hookable instanceof \WPDesk\PluginBuilder\Plugin\Conditional && ! $hookable::is_needed()) {
				continue;
			}
			$hookable->hooks();
		}
		parent::hooks();
	}

	private function is_debug_enabled(): bool {
		return '1' === get_option('custom_plugin_debug', '0');
	}

}