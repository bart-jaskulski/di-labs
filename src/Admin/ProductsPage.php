<?php declare( strict_types=1 );

class ProductsPage implements \WPDesk\PluginBuilder\Plugin\Hookable {

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
		$products_list = new ProductsListTable();
		$products_list->prepare_items();

		$products_list->display();
	}

}