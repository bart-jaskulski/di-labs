<?php declare( strict_types=1 );

class ProductsTable {

	public function install() {
		global $wpdb;

		if ($this->is_installed()) {
			return;
		}

		$table_name = $wpdb->prefix . 'products';
		$result = $wpdb->query("CREATE TABLE ${table_name} (
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