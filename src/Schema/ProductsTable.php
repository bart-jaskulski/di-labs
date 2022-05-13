<?php declare( strict_types=1 );

class ProductsTable {

	/**
	 * @var wpdb
	 */
	private $wpdb;

	public function __construct(\wpdb $wpdb) {
		$this->wpdb = $wpdb;
	}

	public function install() {
		if ($this->is_installed()) {
			return;
		}

		$table_name = $this->wpdb->prefix . 'products';
		$result = $this->wpdb->query("CREATE TABLE ${table_name} (
			id bigint unsigned not null auto_increment,
			title varchar(255) not null,
			price decimal(26, 8) unsigned not null,
			PRIMARY KEY (id)
		)");

		if ($result) {
			update_option('custom_table_installed', '1');
		}
	}

	public function is_installed(): bool {
		return get_option('custom_table_installed', '0') === '1';
	}

}