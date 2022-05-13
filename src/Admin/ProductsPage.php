<?php declare( strict_types=1 );

class ProductsPage implements \WPDesk\PluginBuilder\Plugin\Hookable {

	/**
	 * @var ProductsListTable
	 */
	private $list_table;

	public function __construct(ProductsListTable $list_table) {
		$this->list_table = $list_table;
	}

	public function hooks(): void {
		add_action('admin_init', [$this, 'register_export_page']);
	}

	public function register_export_page(): void {
		add_menu_page(
			'Products',
			'Products',
			'edit_others_posts',
			'products',
			[ $this, 'render' ]
		);
	}

	public function render(): void {
		$this->list_table->prepare_items();

		$this->list_table->display();
	}

}