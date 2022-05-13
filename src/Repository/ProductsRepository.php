<?php declare( strict_types=1 );

class ProductsRepository {

	public function get_all(): ProductsList {
		global $wpdb;

		$products = [];
		$query_result = $wpdb->get_results('SELECT * FROM wp_products', ARRAY_A);
		foreach ( $query_result as $item ) {
			$products[] = new ProductEntity($item);
		}

		return new ProductsList($products);
	}

	public function get_by_id(int $id): ProductEntity {
		global $wpdb;

		return new ProductEntity($wpdb->get_col($wpdb->prepare("SELECT * FROM wp_products WHERE id = %d", $id)));
	}

}