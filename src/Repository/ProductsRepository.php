<?php declare( strict_types=1 );

class ProductsRepository {

	/**
	 * @var wpdb
	 */
	private $wpdb;

	public function __construct(\wpdb $wpdb) {
		$this->wpdb = $wpdb;
	}

	public function get_all(): ProductsList {
		$products = [];
		$query_result = $this->wpdb->get_results('SELECT * FROM wp_products', ARRAY_A);
		foreach ( $query_result as $item ) {
			$products[] = new ProductEntity($item);
		}

		return new ProductsList($products);
	}

	public function get_by_id(int $id): ProductEntity {
		return new ProductEntity($this->wpdb->get_col($this->wpdb->prepare("SELECT * FROM wp_products WHERE id = %d", $id)));
	}

}