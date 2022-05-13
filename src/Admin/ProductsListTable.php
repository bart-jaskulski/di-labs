<?php declare( strict_types=1 );

class ProductsListTable extends \WP_List_Table {

	/**
	 * @var ProductsRepository
	 */
	private $repository;

	public function __construct( $args = array() ) {
		$this->repository = new ProductsRepository();
		parent::__construct( $args );
	}

	public function prepare_items() {
		$this->items = $this->repository->get_all();
	}

	public function get_columns() {
		return [
			'cb' => '<input type="checkbox"/>',
			'id' => 'Product ID',
			'title' => 'Product name',
			'price' => 'Product price'
		];
	}

	protected function column_id(ProductEntity $item) {
		return $item->id;
	}

	protected function column_title(ProductEntity $item) {
		return $item->title;
	}

	protected function column_price(ProductEntity $item) {
		return $item->price;
	}

}