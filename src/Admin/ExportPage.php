<?php declare( strict_types=1 );

class ExportPage implements \WPDesk\PluginBuilder\Plugin\Hookable {

	public function hooks(): void {
		add_action('admin_init', [$this, 'register_export_page']);
	}

	public function register_export_page(): void {
		add_menu_page(
			'Exporter',
			'Exporter',
			'edit_others_posts',
			'exporter',
			[ $this, 'render' ]
		);
	}

	public function render(): void {
		?>
		<form action="/wp-admin/admin-post.php">
			<input type="hidden" name="action" value="export_products"/>
			<button>Export</button>
		</form>
<?php
	}

}